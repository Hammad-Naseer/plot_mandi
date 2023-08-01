<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use StoredProcedureHelper;

// Requests
use App\Http\Requests\RoleRequest;

// Resources
use App\Http\Resources\GetRolesResource;

class RolesController extends Controller
{
    public function roleInsert(RoleRequest $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $roles_data = [
                $request->role_title,
                $userId,
            ];
            $insert = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertroles]", $roles_data,1);
            if ($insert > 0) :
                $roles_company_data = [
                    $insert[0]->inserted_id,
                    $request->company_id,
                    $request->location_id,
                    $userId,
                ];
                StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertRoleCompany]", $roles_company_data);
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "insert", 'action_id' => "", 'log_type' => "4", "message" => "Role Inserted Successfully", "table" => Route::currentRouteName()));
                return successResponse(array("message" => "Role Inserted Successfully","role_id" => $insert),200,"success");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function roleUpdate(RoleRequest $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $roles_update_data = array(
                $request->role_id,
                $request->role_title,
                $userId,
            );
            $update = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspUpdateAndDeleteRoles]", $roles_update_data); 
            if ($update > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "update", 'action_id' => "", 'log_type' => "4", "message" => "Role Updated Successfully", "table" => Route::currentRouteName()));
                return successResponse(array("message" => "Role Updated Successfully"),200,"success");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function roleDelete(Request $request)
    {
        try {
            if($request->role_id != ""):
                $userId = userIdDecrypt($request->user_id);
                $roles_delete_data = array(
                    $request->role_id,
                    "",
                    "",
                    1,
                    $userId,
                );
                $delete = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspUpdateAndDeleteRoles]", $roles_delete_data); 
                if ($delete) :
                    appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "delete", 'action_id' => "", 'log_type' => "4", "message" => "Role Deleted Successfully", "table" => Route::currentRouteName()));
                    return successResponse(array("message" => "Role Deleted Successfully"),200,"success");
                else :
                    return successResponse(array("message" => "Data Not Found"),404,"error");
                endif;
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }
}
