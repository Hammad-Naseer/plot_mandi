<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Str;

// Requests 
// use App\Http\Requests\RegisterRequest;


// Models 
use App\Models\User;
use App\Models\Property;
use App\Models\PropertyMedia;
use App\Models\DealarMedia;
use App\Models\Plot_Pedia;

// Jobs
// use App\Jobs\SendUserVerificationEmailJob;

// Resource 
use App\Http\Resources\GetPlotPedia;

class Home extends Controller
{
    protected $completeRoutePath;

    public function __construct(Request $request)
    {
        $this->completeRoutePath = $request->url();
    }

    public function homePage(Request $request)
    {
        $getPlotPediaAPI = $this->getPlotPedia();
        $getPropertyAPI = $this->getProperty();
        return view('homePage')
                ->with('pediaList', $getPlotPediaAPI)
                ->with('propertyList', $getPropertyAPI);
    }

    public function getPlotPedia(int $id = 0)
    {
        if($id > 0):
            $viewAPI = Plot_Pedia::where('status',1)
            ->orderBy('plot_pedias_id', 'desc')
            ->limit(4)
            ->where("plot_pedias_id",$id)
            ->first();
        else:
            $viewAPI = Plot_Pedia::where('status',1)
            ->orderBy('plot_pedias_id', 'desc')
            ->get();
            // ->limit(4)
        endif;
        
        if (strpos($this->completeRoutePath, '/api/') !== false) {
            return successResponse(new GetPlotPedia($viewAPI),200,"success");
        }else{
            return $viewAPI;
        }
    }

    public function plotPediaDetail(string $id)
    {
        $pediaId = base64_decode($id);
        $pedia = Plot_Pedia::where('plot_pedias_id',base64_decode($pediaId));
        if ($pedia) {
            $pediaDetail = $this->getPlotPedia($pediaId);
            if (strpos($this->completeRoutePath, '/api/') !== false) {
                return successResponse(new GetPlotPedia($pediaDetail),200,"success");
            }else{
                $recentPlotPedia = Plot_Pedia::whereNot('plot_pedias_id ',base64_decode($pediaId))->orderBy('plot_pedias_id', 'desc')->limit(10)->get();
                return view('pages.web.plot_pedia_detail')->with('plotPediaDetail',$pediaDetail)->with('recentPlotPedia',$recentPlotPedia);
            }
        }else{
            if (strpos($this->completeRoutePath, '/api/') !== false) {
                return successResponse(array("message" => "Plot Pedia Id Not Found"),404,"error");
            }else{
                Session::flash('error', 'Plot Pedia Id Not Found, error'); 
                return redirect()->route('homepage');
            }
        }
    }

    public function getProperty(int $id = 0,int $type = 0)
    {
        $propertyType = "";
        if($type > 0):
            $propertyType = "";
        endif;

        if($id > 0):
            $viewAPI = DB::table("property")
            ->join("property_media", "property.property_id", "=", "property_media.property_id")
            ->where("property.is_active", 1)
            ->select("property.*", "property_media.*")
            ->where("property.property_id",$id)
            ->first();
        else:
            $viewAPI = DB::table("property")
            ->join("property_media", "property.property_id", "=", "property_media.property_id")
            ->where("property.is_active", 1)
            ->select("property.*", "property_media.*")
            ->when($propertyType, function ($query, $propertyType) {
                return $query->where("property.property_type", $propertyType);
            })
            ->orderBy('property.property_id', 'desc')
            ->limit(8)
            ->get();
        endif;
        
        if (strpos($this->completeRoutePath, '/api/') !== false) {
            return successResponse(new GetPlotPedia($viewAPI),200,"success");
        }else{
            return $viewAPI;
        }
    }

    public function showPropertyImages()
    {
        $arg = array();
        $arg["id"] = request()->input('id');
        return view('pages.modals.show_property_images')->with("arguments",$arg);
    }

    public function showPropertyVideos()
    {
        $arg = array();
        $arg["id"] = request()->input('id');
        return view('pages.modals.show_property_videos')->with("arguments",$arg);
    }

    public function singleProperty($property_id)
    {
        $singleProperty = $this->getProperty(base64_decode($property_id));
        if (strpos($this->completeRoutePath, '/api/') !== false) {
            return successResponse(new GetPlotPedia($viewAPI),200,"success");
        }else{
            return view('pages.web.single_property')->with("peoperty_detail",$singleProperty);
        }
    }

    public function plotPediaPage()
    {
        $getPlotPediaAPI = $this->getPlotPedia();
        return view('pages.web.plot_pedia')
                ->with('pediaList', $getPlotPediaAPI);
    }

    
}
