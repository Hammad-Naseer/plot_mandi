<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\StandardsImport;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use StoredProcedureHelper;
// Excel Load 
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Requests
// use App\Http\Requests\RoleRequest;

// Resources
// use App\Http\Resources\GetRolesResource;

class StandardController extends Controller
{
    public function addStandard(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);

            // File Uploading Attributes 
            $file = request()->file('standard_file');
            $destinationPath = 'standards';
            $allowedExtensions = ['xlsx', 'csv'];
            $filePath = uploadFile($file,$destinationPath,$allowedExtensions);
            
            $spreadsheet = IOFactory::load($file);
            $worksheet = $spreadsheet->getActiveSheet();
            $worksheet_arr = $worksheet->toArray();

            

            // Standard SP 
            $standard_data = [
                $request->standard_name,
                $filePath,
                1,
                $userId,
            ];
            // $insertStandard = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertroles]", $standard_data,1);
            
            // $getRequirementName = $worksheet_arr[2][0];
            // Requirement SP Here Execute

            foreach ($worksheet_arr as $index => $row) :
                if($index > 1):
                    $clouse =  $row[0];
                    $needle = "Requirement";
                    if (Str::startsWith($clouse, $needle)) :
                        $getRequirementName = $clouse;
                        $afterSubstring = Str::after($getRequirementName, $needle);
                        $firstLetter = Str::substr(ltrim($afterSubstring), 0, 1);
                        echo "<h3>".$getRequirementName."</h3>";
                        // Standard Requirment SP
                        $standard_req_data = [
                            $request->standard_name,
                            $filePath,
                            1,
                            $userId,
                        ];
                        // $insertStandardReq = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertroles]", $standard_req_data,1);
                    endif;
                    // Clouse Insertion 
                    $milestone =  ($row[1] != "") ? $row[1] : 0;
                    if($clouse != ""):
                        $standardArray = [
                            $clouse,
                            $milestone
                        ];
                        // SP Here Execute
                        print_r($standardArray);
                        echo "<br>";
                      
                    endif;
                    
                endif;
            endforeach;
            // foreach ($data as $row) {
            //     foreach ($row as $cellValue) {
            //         echo $cellValue;
            //     }
            //     echo PHP_EOL;
            // }

            dd("Stop");
            
            if ($insertStandard > 0) :
                $standard_clouse_data = [
                    $insertStandard[0]->inserted_id,
                    $request->clouse_title,
                    $request->clouse_number,
                    $request->clouse_hierarchy,
                    $request->clouse_parent,
                    $request->is_mandatory,
                    $request->milestone,
                    1,
                    $userId,
                ];
                StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertRoleCompany]", $standard_clouse_data);
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "insert", 'action_id' => "", 'log_type' => "4", "message" => "Role Inserted Successfully", "table" => Route::currentRouteName()));
                return successResponse(array("message" => "Role Inserted Successfully","role_id" => $insert),200,"success");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }
}
