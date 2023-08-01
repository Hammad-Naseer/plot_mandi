<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use StoredProcedureHelper;

// Requests
use App\Http\Requests\PermissionRequest;
use App\Http\Requests\RolePermissionRequest;

// Resource
use App\Http\Resources\GetPermissionResource;

class PermissionsController extends Controller
{
    public function permissionInsert(PermissionRequest $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $permission_data = array(
                $request->title,
                $request->code,
                $request->type,
                $userId,
            );
            $insert = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertpermissions]", $permission_data);
            if ($insert > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => $request->ip(), 'action' => "insert", 'action_id' => "", 'log_type' => "4", "message" => "Permission Inserted Successfully", "table" => Route::currentRouteName()));
                return successResponse(array(),200," Inserted Successfully");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function getPermissions($permissionId = 0,$userId)
    {
        try {
            $userId = userIdDecrypt($userId);
            $results = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspgetdatafrompermissions]", [$permissionId],1);          
            if (count($results) > 0) :
                appActivityLogs(array('id' => $userId, 'ip' => getClientIp(), 'action' => "fetch", 'action_id' => "", 'log_type' => "4", "message" => "Fetch Permission Data", "table" => Route::currentRouteName()));
                return successResponse(new GetPermissionResource($results),200,"success");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function permissionAssignToRole(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $permission_data = [
                $request->role_id,
                $request->permission_id,
                $userId,
            ];

            if (!isIndexedArrayEmpty($permission_data)) :
                $insertRolePermission = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspinsertRole_permissions]", $permission_data); 
                if ($insertRolePermission > 0) :
                    appActivityLogs(array('id' => $userId, 'ip' => getClientIp(), 'action' => "insert", 'action_id' => "", 'log_type' => "4", "message" => "Permission Assigned To Role Successfully", "table" => Route::currentRouteName()));
                    return successResponse(array(),200,"Permission Assigned To Role Successfully");
                else :
                    return successResponse(array(),404,"Data Not Found");
                endif;
            else:
                return successResponse(array(),404,"Fields are required");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function rolePermissionUpdate(RolePermissionRequest $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $permission_update_data = array(
                $request->role_permission_id,
                $request->role_id,
                $request->permission_id,
                $userId,
                $request->is_active
            );
            $permisssion = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspupdateRole_permissions]", $permission_update_data); 
            if ($permisssion) :
                appActivityLogs(array('id' => $userId, 'ip' => getClientIp(), 'action' => "update", 'action_id' => "", 'log_type' => "4", "message" => "Role Permission Updated Successfully", "table" => Route::currentRouteName()));
                return successResponse(array(),200,"Role Permission Updated Successfully");
            else :
                return successResponse(array("message" => "Data Not Found"),404,"error");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }

    public function rolePermissionDelete(Request $request)
    {
        try {
            $userId = userIdDecrypt($request->user_id);
            $permission_delete_data = array(
                $request->role_permission_id,
                $userId,
            );
            if (!isIndexedArrayEmpty($permission_delete_data)) :
                $permisssion = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspdeleteRole_Permissions]", $permission_delete_data);
                if ($permisssion) :
                    appActivityLogs(array('id' => $userId, 'ip' => getClientIp(), 'action' => "delete", 'action_id' => "", 'log_type' => "4", "message" => "Role Permission Deleted Successfully", "table" => Route::currentRouteName()));
                    return successResponse(array(),200,"Role Permission Deleted Successfully");
                else :
                    return successResponse(array("message" => "Data Not Found"),404,"error");
                endif;
            else:
                return successResponse(array(),404,"Fields are required");
            endif;
        } catch (ValidationException $exception) {
            return errorResponse("An error occurred", 400);
        }
    }
}
