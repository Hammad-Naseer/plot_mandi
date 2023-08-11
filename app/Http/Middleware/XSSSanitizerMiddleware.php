<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use HTMLPurifier;
use HTMLPurifier_Config;
use DB;

class XSSSanitizerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    /*
     public function handle(Request $request, Closure $next)
    {
        $input = $request->all();

        array_walk_recursive($input, function (&$input) {
            $input = strip_tags($input);
            $input = str_replace("<?php","",$input);
            $input = str_replace("?>","",$input);
            $input = str_replace("eval(","",$input);
            $input = str_replace("alert(","",$input);
        });

        $request->merge($input);

        return $next($request);
    }
    */

    public function handle($request, Closure $next)
    {
        $input = $request->all();
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
    
        $sanitizedInput = $this->purifyInput($input, $purifier);
    
        // Custom XSS Types
        /*
        $find = array("<?php", "?>", "exec(");
        $replace = array("php start", "php end", "exec command");
        $sanitizedInput = str_replace($find, $replace, $input);
    
        $replacements = array_diff($input, $sanitizedInput);
    
        if (count($replacements) > 0) {
            // SQL SP Required
        }
        */
    
        $request->replace($sanitizedInput);
    
        return $next($request);
    }
    
    protected function purifyInput($input, $purifier)
    {
        foreach ($input as $key => $value) {
            if (is_array($value)) {
                $input[$key] = $this->purifyInput($value, $purifier);
            } else {
                $input[$key] = $purifier->purify($value);
            }
        }
    
        return $input;
    }
    
}
