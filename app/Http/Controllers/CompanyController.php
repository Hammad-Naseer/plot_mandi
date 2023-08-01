<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use StoredProcedureHelper;

// Requests
use App\Http\Requests\CompanyOnBoardRequest;

// Resources
use App\Http\Resources\GetAuditeeListResource;
use App\Http\Resources\GetAuditorListResource;


// Jobs
use App\Jobs\SendUserVerificationEmailJob;

// Another Controller 
use App\Http\Controllers\RolesController;

class CompanyController extends Controller
{
    public function __construct(RolesController $rolesController)
    {
        $this->rolesController = $rolesController;
    }

    public function companyOnBorading(CompanyOnBoardRequest $request)
    {
        try {
            // Start the transaction
            DB::transaction(function () use ($request) {
                // Company Registration
                $companyType = $request->company_account_type;
                $superAdminID = userIdDecrypt($request->user_id); // Add Super Admin ID When React JS Request Sent
                
                $companyArray = [
                    $request->company_name,
                    $request->company_website,
                    $request->company_phone,
                    $request->company_email,
                    $request->company_address,
                    $request->company_type,
                    $request->company_abbreviation,
                    $request->location_code,
                    $request->location_type,
                    $request->secret_key,
                    $request->country,
                    $request->city,
                    $request->postal_code,
                    $request->address,
                    $request->company_logo,
                    $request->company_fevicon,
                    $request->company_letterhead_header,
                    $request->company_letterhead_footer,
                    $request->company_account_type,
                    $request->auth_type,
                    $request->is_active,
                    $superAdminID,
                ];
                $companyInsert = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspInsertCompany]", $companyArray,1);
                $companyInsertedID = $companyInsert[0]->inserted_id;
                // Company Folder Creation 
                $companyFolderName = $companyInsertedID.'_'.$request->company_name;
                $companyFolderCreation = createCompanyFolder($companyFolderName);
                if(!$companyFolderCreation) :
                    // throw new \Exception("Company Directory Creation Failed");
                    // DB::rollBack();
                    return errorResponse("Company Directory Creation Failed", 400);
                    exit();
                endif;

                $adminType = 0;
                if($companyType == 1):
                    // Auditee Details Insertion 
                    $adminType = 1;
                    $audieeDetailsArray = [$companyInsertedID];
                    $auditeeDetailsInsert = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertAuditee_Details]", $audieeDetailsArray);
                elseif($companyType == 2):
                    // Auditor Details Insertion
                    $adminType = 2; 
                    $audiorDetailsArray = [
                        $companyInsertedID,
                    ];
                    // $request->services,
                    // $request->efforts
                    $auditorDetailsInsert = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertAuditor_Details]", $audiorDetailsArray);
                endif;
                // User Registration
                $currentDateTime = date('Y-m-d H:i:s');
                $linkExpireDateTime = date('Y-m-d H:i:s', strtotime($currentDateTime . '+60 minutes'));
                
                $userArray = [
                    $request->focal_name,
                    $request->company_email,
                    "",
                    app('hash')->make("GRCPassword@123"),
                    $request->auth_type,
                    "",
                    "",
                    $adminType,
                    $request->is_active,
                    $linkExpireDateTime,
                    $superAdminID,
                ];
                $userInsert = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertUsers]", $userArray,1);
                $userInsertedID = $userInsert[0]->inserted_id;
                
                // User Managment Insertion
                $userManagementArray = [
                    $userInsertedID,
                    $request->company_phone,
                    $request->address,
                    $companyInsertedID,
                    0,
                    0,
                    0,
                    0,
                    $request->profile_image
                ];
                $userManagementInsert = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspInsertUser_Management]", $userManagementArray);
                
                // Insert Default Location 
                $locationTitle = "Head Office";
                $locationArray = [
                    $companyInsertedID,
                    $locationTitle,
                    $request->company_phone,
                    $request->company_address,
                    1,
                    $superAdminID
                ];
                $locationInsert = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertLocations]", $locationArray,1);
                $locationInsertedID = $locationInsert[0]->inserted_id;
                
                // Location Folder Creation 
                $locationFolderName = $locationInsertedID.'_'.$locationTitle;
                $getCompanyFolderName = getDirectoryName($companyFolderName);
                $locationFolderCreation = createLocationFolder($locationFolderName,$getCompanyFolderName);
                if(!$locationFolderCreation) :
                    return errorResponse("Location Directory Creation Failed", 400);
                    exit();
                endif;

                // Company Roles Creation & Assign To Company
                $defaultRolesArray = array("Location Admin","Employee"); // Default Roles 
                foreach($defaultRolesArray as $defaultRole):
                    // Role Insert
                    $roleInsert = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertroles]", [$defaultRole,$superAdminID],1);
                    $roleInsertedID = $roleInsert[0]->inserted_id;
                    if($roleInsert > 0):
                        // Insert Role Companies
                        StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertRoleCompany]", [
                            $roleInsertedID,
                            $companyInsertedID,
                            $locationInsertedID,
                            $superAdminID
                        ]);
                    endif;
                    // $this->rolesController->roleInsert($roleInsertionData);
                endforeach;

                // Assign Permossion To Role 
                $permissionGet = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspgetdatafrompermissions_by_type]", [$companyType],1);
                foreach($permissionGet as $permission):
                    $insertRolePermission = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertRole_permissions]", [
                        $userInsertedID,
                        $permission->permission_id,
                        $superAdminID
                    ]);
                endforeach;

                // Email Send For Verification
                $user = array(
                    'name' =>   $request->focul_name,
                    'email' =>   $request->company_email,
                );
                SendUserVerificationEmailJob::dispatch((object) $user)->delay(now()->addSeconds(5));

            }); // End DB Transaction
            appActivityLogs(array('id' => userIdDecrypt($request->user_id), 'ip' => $request->ip(), 'action' => "insert", 'action_id' => "", 'log_type' => "2", "message" => "Company On Boarding Successfully", "table" => Route::currentRouteName()));
            return successResponse(array(), 200, "Company On Boarding Successfully");
        } catch (ValidationException $exception) {
            deleteDirectory($request->company_name);
            appActivityLogs(array('id' => userIdDecrypt($request->user_id), 'ip' => $request->ip(), 'action' => "error", 'action_id' => "", 'log_type' => "2", "message" => "Company On Boarding Error", "table" => Route::currentRouteName()));
            return errorResponse("An error occurred", 400);
        }
    }

    public function getAuditeeList(Request $request)
    {
        // Filters Vars 
        $auditeeArray = array();
        $auditeeArray[0] = 1;
        $companyId = Str::of($request->company_id)->trim()->isNotEmpty();
        if($companyId):        
            $auditeeArray[1] = $request->company_id;
        endif;
        $paymentCycle = Str::of($request->payment_cycle)->trim()->isNotEmpty();
        if($paymentCycle):        
            $auditeeArray[2] = $request->payment_cycle;
        endif;
        $startDate = Str::of($request->start_date)->trim()->isNotEmpty();
        if($startDate):        
            $auditeeArray[3] = $request->start_date;
        endif;
        $endDate = Str::of($request->end_date)->trim()->isNotEmpty();
        if($endDate):        
            $auditeeArray[4] = $request->end_date;
        endif;
        $userId = userIdDecrypt($request->user_id);
        $listGet = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspGetCompaniesList]", $auditeeArray,1);
        if (count($listGet) > 0) :
            appActivityLogs(
                array(
                    'id' => $userId, 
                    'ip' => $request->ip(), 
                    'action' => "fetch", 
                    'action_id' => "", 
                    'log_type' => "2", 
                    "message" => "Fetch & Filter Auditee List", 
                    "table" => Route::currentRouteName()
                )
            );
            return successResponse(new GetAuditeeListResource($listGet),200,"success");
        else :
            return successResponse(array("message" => "Data Not Found"),404,"error");
        endif;
    }

    public function getAuditorList(Request $request)
    {
        // Filters Vars 
        $auditorArray = array();
        $auditorArray[0] = 2;
        $companyId = Str::of($request->company_id)->trim()->isNotEmpty();
        if($companyId):        
            $auditorArray[1] = $request->company_id;
        endif;
        $paymentCycle = Str::of($request->payment_cycle)->trim()->isNotEmpty();
        if($paymentCycle):        
            $auditorArray[2] = $request->payment_cycle;
        endif;
        $startDate = Str::of($request->start_date)->trim()->isNotEmpty();
        if($startDate):        
            $auditorArray[3] = $request->start_date;
        endif;
        $endDate = Str::of($request->end_date)->trim()->isNotEmpty();
        if($endDate):        
            $auditorArray[4] = $request->end_date;
        endif;
        $userId = userIdDecrypt($request->user_id);
        $listGet = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspGetCompaniesList]", $auditorArray,1);
        if (count($listGet) > 0) :
            appActivityLogs(
                array(
                    'id' => $userId, 
                    'ip' => $request->ip(), 
                    'action' => "fetch", 
                    'action_id' => "", 
                    'log_type' => "2", 
                    "message" => "Fetch & Filter Auditee List", 
                    "table" => Route::currentRouteName()
                )
            );
            return successResponse(new GetAuditorListResource($listGet),200,"success");
        else :
            return successResponse(array("message" => "Data Not Found"),404,"error");
        endif;
    }
}
