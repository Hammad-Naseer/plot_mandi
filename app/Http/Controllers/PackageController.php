<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use StoredProcedureHelper;

// Requests
// use App\Http\Requests\PackageFeatureRequest;
// use App\Http\Requests\PackagesRequest;

// Resource
use App\Http\Resources\GetPackageFeatureResource;
use App\Http\Resources\GetPackageResource;
use App\Http\Resources\GetPackageAssignedToCompanyResource;

class PackageController extends Controller
{
    /***************
    Packages Features
    ***************/

    public function insertPackageFeature(Request $request)
    {
       
        try {
            $userId = userIdDecrypt($request->user_id);
            $package_feature_data = array(
                $request->title,
                $request->icon,
                $request->description,
                1,
                $userId,
            );
            $insertFeature = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspInsertPackage_Features]", $package_feature_data);
            if ($insertFeature > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "insert", 'action_id' => "", 'log_type' => "3", "message" => "Package Feature Inserted", "table" => Route::currentRouteName()));
                return successResponse(array(),200,"Package Feature Inserted Successfully");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function getPackageFeature(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $packageFeatureID = $request->package_feature_id;
            $getFeature = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspgetdatafromPackage_Features]", [$packageFeatureID],1);
            if ($getFeature > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "fetch", 'action_id' => "", 'log_type' => "3", "message" => "Fetch Package Feature Data", "table" => Route::currentRouteName()));
                return successResponse(new GetPackageFeatureResource($getFeature),200,"success");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function updatePackageFeature(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $package_feature_update_data = array(
                $request->package_feature_id ,
                $request->title,
                $request->icon,
                $request->description,
                $request->is_active,
                $userId
            );
            $insertFeature = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspUpdatePackage_Features]", $package_feature_update_data);
            if ($insertFeature > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "update", 'action_id' => "", 'log_type' => "3", "message" => "Package Feature Updated Successfully", "table" => Route::currentRouteName()));
                return successResponse(array(),200,"Package Feature Updated Successfully");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function deletePackageFeature(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $package_feature_delete_data = array(
                $request->package_feature_id,
                $userId
            );
            $deleteFeature = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspdeletePackage_Features]", $package_feature_delete_data);
            if ($deleteFeature > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "delete", 'action_id' => "", 'log_type' => "3", "message" => "Package Feature Deleted Successfully", "table" => Route::currentRouteName()));
                return successResponse(array(),200,"Package Feature Deleted Successfully");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    /***************
        Packages
    ***************/

    public function insertPackage(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $package_data = array(
                $request->package_title,
                $request->package_description,
                $request->package_for,
                $request->currency,
                $request->plan_price,
                $request->max_locations,
                $request->max_users,
                $request->max_users_per_location,
                $request->maximum_standards,
                $request->on_board_auditors,
                $request->data_retention_period,
                $request->storage,
                $request->features,
                1,
                $userId,
            );
            $insertPackage = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspInsertPackages]", $package_data);
            if ($insertPackage > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "insert", 'action_id' => "", 'log_type' => "3", "message" => "Package Inserted Successfully", "table" => Route::currentRouteName()));
                return successResponse(array(),200,"Package Created Successfully");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function getPackages(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $packageID = $request->package_id;
            $getPackage = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspgetdatafromPackages]", [$packageID],1);
            if ($getPackage > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "fetch", 'action_id' => "", 'log_type' => "3", "message" => "Fetch Package Data", "table" => Route::currentRouteName()));
                return successResponse(new GetPackageResource($getPackage),200,"success");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function updatePackage(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $package_update_data = array(
                $request->package_id ,
                $request->package_title,
                $request->package_description,
                $request->package_for,
                $request->currency,
                $request->plan_price,
                $request->max_locations,
                $request->max_users,
                $request->max_users_per_location,
                $request->maximum_standards,
                $request->on_board_auditors,
                $request->data_retention_period,
                $request->storage,
                $request->features,
                $userId,
            );
            $updatePackage = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspUpdatePackages]", $package_update_data);
            if ($updatePackage > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "update", 'action_id' => $request->package_id, 'log_type' => "3", "message" => "Package Updated Successfully", "table" => Route::currentRouteName()));
                return successResponse(array(),200,"Package Updated Successfully");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function deletePackage(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $package_delete_data = array(
                $request->package_id,
                $userId
            );
            $deletePackage = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspdeletePackages]", $package_delete_data);
            if ($deletePackage > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "delete", 'action_id' => $request->package_id, 'log_type' => "3", "message" => "Package Deleted Successfully", "table" => Route::currentRouteName()));
                return successResponse(array(),200,"Package Deleted Successfully");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    /*************************
    Packages Assign To Company
    *************************/

    public function packageAssignCompany(Request $request)
    {
        try {
            DB::transaction(function () use ($request) { //Start DB Trans
                $userId = userIdDecrypt($request->user_id);
                $package_data = array(
                    $request->package_id,
                    $request->company_id,
                    $request->payment_cycle,
                    $request->total_amount,
                    $request->discount_value,
                    $request->grand_amount,
                    $request->assigned_at,
                    $request->expiration_at,
                    $request->package_activated,
                    $request->carry_forward,
                    1,
                    $userId,
                );
                $insertPackage = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspInsertPackage_Assign_Company]", $package_data,1);
                if ($insertPackage > 0) :
                    $insertPaymentDetailArray = [
                        $insertPackage[0]->inserted_id,
                        $request->grand_amount,
                        0.00,
                        0,
                        'Amount Not Paid Yet',
                        '',
                        '',
                        1,
                        $userId

                    ];
                    $insertPaymentDetail = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspInsertPackage_Payment_Details]", $insertPaymentDetailArray);
                    appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "insert", 'action_id' => $insertPackage[0]->inserted_id, 'log_type' => "3", "message" => "Package Assigned To Company Successfully", "table" => Route::currentRouteName()));
                endif;
            }); // End DB Transaction

            return successResponse(array(),200,"Package Assigned To Company Successfully");
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function updatePackageAssignCompany(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $package_assign_update_data = array(
                $request->package_assign_company_id,
                $request->package_id,
                $request->company_id,
                $request->payment_cycle,
                $request->total_amount,
                $request->discount_value,
                $request->grand_amount,
                $request->assigned_at,
                $request->expiration_at,
                $request->package_activated,
                $request->carry_forward,
                $userId,
            );
            $updateAssignPackage = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspupdatePackage_Assign_Company]", $package_assign_update_data);
            if ($updateAssignPackage > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "update", 'action_id' => $request->package_assign_company_id, 'log_type' => "3", "message" => "Package Assigned To Company Updated Successfully", "table" => Route::currentRouteName()));
                return successResponse(array(),200,"Package Assigned To Company Updated Successfully");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }
    
    public function deletePackageAssignCompany(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $package_assign_delete = array(
                $request->package_assign_company_id,
                $userId
            );
            $deletePackageAssign = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspdeletePackage_Assign_Company]", $package_assign_delete);
            if ($deletePackageAssign > 0) :
                $payment_detail_delete = array(
                    $request->package_assign_company_id,
                    $userId
                );
                $deletePaymentDetail = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspdeletePackage_Payment_Details]", $payment_detail_delete);
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "delete", 'action_id' => $request->package_assign_company_id, 'log_type' => "3", "message" => "Package Assigned To Company Deleted Successfully", "table" => Route::currentRouteName()));
                return successResponse(array(),200,"Package Assigned To Company Deleted Successfully");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function getPackageAssignCompany(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $packageAssignID = $request->package_assign_company_id;
            $getPackageAssignCompany = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspgetdatafromPackage_Assign_Company]", [$packageAssignID],1);
            if ($getPackageAssignCompany > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "fetch", 'action_id' => "", 'log_type' => "3", "message" => "Fetch Package AssignTo Company Data", "table" => Route::currentRouteName()));
                return successResponse(new GetPackageAssignedToCompanyResource($getPackageAssignCompany),200,"success");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }
}
