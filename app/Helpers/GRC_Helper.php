<?php

/*
IMPORTANT: 
YOU ARE NOT ALLOWED TO REMOVE THIS COMMENT AND NO MODIFICATION TO THE CODE SHOULD BE MADE WITHOUT THE CONSENT OF THE AUTHORS
 
DISCLAIMER:
This code is provided 'as is' after proper verifications and reviews to the Development Team. 
he author to this file shall not be held liable for any damages, including any lost profits 
or other incidental or consequential damages arising out of or in connection with the use or inability to use this code.
 
[Details]
[Date: 2023-06-26]
[© Copyright Hammad Ali,Zeeshan Arain & Naseem]
[File: GRC_Helper]
*/
use App\Facades\StoredProcedureHelper;
use Karmendra\LaravelAgentDetector\AgentDetector;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nnjeim\World\World;
use Nnjeim\World\WorldHelper;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;


if (!function_exists('executeStoredProcedure')) {
    function executeStoredProcedure(string $procedureName,$parameters)
    {
        $placeholders = implode(',', array_fill(0, count($parameters), '?'));
        $procedureSyntax = 'EXEC '.$procedureName. ' ' .$placeholders.' ';
        $results = DB::select($procedureSyntax, $parameters);
        return $results;
    }
}

if (!function_exists('successResponse')) {
    function successResponse($data = [], $status = 200, $message = "")
    {
        return response()->json([
            'success' => true,
            'code' => $status,
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}

if (!function_exists('errorResponse')) {
    function errorResponse($message = 'An error occurred', $status = 400)
    {
        return response()->json([
            'success' => false,
            'code' => $status,
            'message' => $message,
        ], $status);
    }
}

if (!function_exists('appActivityLogs')) {
    function appActivityLogs($data = [])
    {
        $user = DB::table("users")->where("id", $data['id'])->first();
        $user_json = array(
            'user_id' => $user->user_id,
            'user_name' => $user->first_name,
            'user_email' => $user->email,
            'user_role' => "",
        );
        $user_agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_6_8) AppleWebKit/537.13+ (KHTML, like Gecko) Version/5.1.7 Safari/534.57.2';
        $ad = new AgentDetector($user_agent);
        $ip = $data['ip'];
        $agent_json = array(
            'Platform'  =>  $ad->platform(),
            'IP'        =>  $ip,
            'Device type'  =>  $ad->device(),
            'Device brand name'  =>  $ad->deviceBrand(),
            'Device model'  =>  $ad->deviceModel(),
            'Platform version'  =>  $ad->platformVersion(),
            'Browser name'  =>  $ad->browser(),
            'Browser version'  =>  $ad->browserVersion(),
            'Robot detection'  =>  $ad->isBot(),
        );
        $activity_time = date("Y-m-d- h:i:sa");
        $table = $data['table'];
        $action = $data['action'];
        $message = $data['message'];
        $action_id = $data['action_id'];
        $log_type = $data['log_type'];

        // Insert Logs 
        $data1 = [
            'user_id' => $data['id'],
            'activity_json_data' => json_encode($agent_json),
            'user_agent_json' => json_encode($user_json),
            'table' => $table,
            'action' => $action,
            'message' => $message,
            'action_id' => $action_id,
            'log_type' => $log_type,
        ];

        // $res = DB::statement('EXECUTE dbo.uspuseractivityinsert ?, ?, ?, ?, ?, ?, ?', array_values($data1));
        // $res = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspuseractivityinsert]", array_values($data1));
        // return json_encode($res);
    }
}

if (!function_exists('isIndexedArrayEmpty')) {
    function isIndexedArrayEmpty(array $array)
    {
        $hasEmptyValue = false;
        foreach ($array as $value) {
            if (empty($value)) {
                $hasEmptyValue = true;
                break;
            }
        }
        return $hasEmptyValue;
        // if ($hasEmptyValue) {
        //     return 1;
        // } else {
        //     return 0;
        // }
    }
}

if (!function_exists('createCompanyFolder')) {
    function createCompanyFolder(string $folderName)
    {
        // Make Folder Name 
        $strToLower =Str::lower($folderName);
        // $removeDash = Str::remove('-', $strToLower);
        $replaceSpaceToUnderscore = Str::replace(' ','_', $strToLower);
        $finalFolderName = $replaceSpaceToUnderscore;

        $folderExists = Storage::disk('local')->exists($finalFolderName); //we can use here s3
        if ($folderExists) :
            return false;
        else:
            // Create Folder 
            Storage::makeDirectory($finalFolderName);
            return true;
        endif;
        
        // dd(Storage::disk('local')->path($folderName));
        // if (Storage::disk('s3')->missing('file.jpg'))
        // $path = Storage::putFile('f3/photos',$folderName);
    }
}

if (!function_exists('createLocationFolder')) {
    function createLocationFolder(string $folderName, string $companyFolder = "")
    {
        // Make Folder Name 
        $strToLower =Str::lower($folderName);
        // $removeDash = Str::remove('-', $strToLower);
        $replaceSpaceToUnderscore = Str::replace(' ','_', $strToLower);
        $finalFolderName = $replaceSpaceToUnderscore;

        $folderExists = Storage::disk('local')->exists($companyFolder.'/'.$finalFolderName); //we can use here s3
        if ($folderExists) :
            return false;
        else:
            // Create Folder             
            Storage::makeDirectory($companyFolder."/".$finalFolderName);
            
            return true;
        endif;
    }
}

if (!function_exists('getDirectoryName')) {
    function getDirectoryName(string $folderName, string $dirType = "parent")
    {
        // Make Folder Name 
        $strToLower =Str::lower($folderName);
        // $removeDash = Str::remove('-', $strToLower);
        $replaceSpaceToUnderscore = Str::replace(' ','_', $strToLower);
        $finalFolderName = $replaceSpaceToUnderscore;

        if($dirType == "location"):
            $folderExists = Storage::disk('local')->exists($parentFolder.'/'.$finalFolderName);
        else:
            $folderExists = Storage::disk('local')->exists($finalFolderName);
        endif;
    
        if ($folderExists) :
            return $finalFolderName;
        endif;
    }
}

if (!function_exists('deleteDirectory')) {
    function deleteDirectory(string $folderName, string $dirType = "parent")
    {
        // Make Folder Name 
        $directory = getDirectoryName($folderName,$dirType);
        dd($directory);
        if($directory != ""):
            if($dirType == "location"):
                Storage::deleteDirectory($parentFolder.'/'.$directory);
                return "Directory deleted successfully.";
            else:
                Storage::deleteDirectory($directory);
                return "Directory deleted successfully.";
            endif;
        else:
            return "Directory does not exist.";
        endif;
    }
}


if (!function_exists('packageCurrency')) {
    function packageCurrency(int $cur_id)
    {
        $currencyArr = array(
            '1' => array(
                'symbol' => '$',
                'name' => 'USD',
                'id' => 1,
            ),
            '2' => array(
                'symbol' => '€',
                'name' => 'EUR',
                'id' => 2,
            ),
            '3' => array(
                'symbol' => '£',
                'name' => 'GBP',
                'id' => 3,
            ),
        );
    
        return $currencyArr[$cur_id] ?? null;
    }
}

if (!function_exists('getCountries')) {
    function getCountries(int $country_id = 0)
    {
        $action =  World::countries();

        if ($action->success) {
            $countries = $action->data;
            return $countries;
        }
    }
}

if (!function_exists('citiesByCountryID')) {
    function citiesByCountryID()
    {
        $worldHelper = app(WorldHelper::class);
        $action = $worldHelper->cities([
            'filters' => [
                'country_id' => 167,
            ],
        ]);
        
        if ($action->success) {
            return $action->data;
        }

        return null;
    }
}

if (!function_exists('userIdEncrypt')) {
    function userIdEncrypt(int $userID)
    {
        $returnId = "";
        if($userID > 0 && $userID != ""):
            $returnId = Crypt::encrypt($userID);
            return $returnId;
        endif;
    }
}


if (!function_exists('userIdDecrypt')) {
    function userIdDecrypt(string $userID)
    {
        $returnId = "";
        if($userID > 0 && $userID != ""):
            $returnId = Crypt::decrypt($userID);
            return $returnId;
        endif;
    }
}

if (!function_exists('activityLogStatus')) {
    function activityLogStatus(int $status_id)
    {
        $statusArr = array(
            '1' => "User",
            '2' => "Company",
            '3' => "Packages",
            '4' => "Roles/Permission",
        );
    
        return $statusArr[$status_id] ?? null;
    }
}

if (!function_exists('getClientIp')) {
    function getClientIp()
    {
        if (isset($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }

        return null; // Return null if the IP address is not available
    }
}

if (!function_exists('callCurl')) {
    function callCurl($endpoint,$apiType = "GET",$data = array())
    {
        $apiURL = "http://127.0.0.1:8000/api/v1/";
        $api = $apiURL.$endpoint;
        if($apiType == "POST"):
            // withToken('token')
            $response = Http::post($api, $data);
        elseif($apiType == "GET"):
            $response = Http::get($api);
        endif;    

        return $response;
    }

    if (!function_exists('getAccountStatus')) {
        function getAccountStatus($status = 0)
        {
            if($status == 0):
                $response = "Inactive";
            else:
                $response = "Active";
            endif;
            return $response;
        }
    }

    if (!function_exists('PlotDateFormater')) {
        function PlotDateFormater($date = "",$format = "Y-m-d")
        {
            if($date != ""):
                $response = date($format,strtotime($date));
            endif;
            return $response;
        }
    }

    if (!function_exists('uploadFile')) {
        function uploadFile($file, $destinationPath, $allowedExtensions = [])
        {
            // Validate the file size (e.g., limit to 5MB)
            $maxFileSize = 100 * 5e+6; // 5MB in kilobytes
            if ($file->getSize() > $maxFileSize) {
                throw new \Exception('File size exceeds the maximum limit.');
            }
    
            // Validate the file extension (if allowed extensions are provided)
            $extension = $file->getClientOriginalExtension();
            if (!empty($allowedExtensions) && !in_array($extension, $allowedExtensions)) {
                throw new \Exception('Invalid file extension. Allowed extensions: ' . implode(', ', $allowedExtensions));
            }
    
            // Sanitize the file name before storing it
            $uniqueFileName = time() . '_' . Str::random(10) . '.' . $extension;
            // Store the file in the specified destination path
            Storage::disk('public')->putFileAs($destinationPath, $file, $uniqueFileName);
            // Return the file path to be saved in the database or used in your application
            return $destinationPath . '/' . $uniqueFileName;
        }
    }
    
}