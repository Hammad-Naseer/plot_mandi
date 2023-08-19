<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// Models 
use App\Models\Plot_Pedia;

// Resource 
// use App\Http\Resources\LoginResource;

class PlotPediaController extends Controller
{
    public function addPedia()
    {
        if(Auth::user()->acount_type == 1):
            // $userList = DB::table("users")->where("acount_type",3)->get();
            return view('pages.admin.plot_pedia.add');
        else:
            return redirect()->route('admin_login');
        endif;
    }

    public function pediaList()
    {
        if(Auth::user()->acount_type == 1):
            $pediaList = Plot_Pedia::where('created_by', Auth::user()->user_id)->get();
            return view('pages.admin.plot_pedia.view')->with('pediaList', $pediaList);
        else:
            return redirect()->route('admin_login');
        endif;
    }

    public function submitPlotPedia(Request $request)
    {
        if(Auth::user()->acount_type == 1):

            $this->validate($request, [
                'title' => 'required|string||max:255',
                'description' => 'required|string',
                'blog_image' => 'required',
                'status' => 'required',
            ]);
            $plotpedia = new Plot_Pedia();
            $plotpedia->title = $request->input('title');
            $plotpedia->description = $request->input('description');
            if ($request->hasFile('blog_image')) {
                $filePath = uploadFile($request->file('blog_image'), 'uploads/admin/plot_pedia/', array('jpg','png','gif'));                    
            }
            $plotpedia->image = $filePath;
            $plotpedia->status = $request->input('status');
            $plotpedia->created_by = auth()->user()->user_id;

            if ($plotpedia->save()) :
                Session::flash('success', 'Plot Pedia Added Successfully'); 
            else:
                Session::flash('error', 'Plot Pedia Not Addedd, error'); 
            endif;

            return redirect()->route('add_plot_pedia');
        else:
            return redirect()->route('admin_login');
        endif;
    }
    
    public function editPediaRecord($plot_pedia_id)
    {
        if(Auth::user()->acount_type == 1):
            if($plot_pedia_id > 0):
                $plot_pedia = Plot_Pedia::find(base64_decode($plot_pedia_id));
                if ($plot_pedia) {
                    $plot_pedia->get();
                    return view('pages.admin.plot_pedia.edit')->with('editPedia',$plot_pedia);
                }else{
                    Session::flash('error', 'Plot Pedia Edit Id Not Found, error'); 
                    return redirect()->route('plot_pedia_list');
                }
            endif;
            
        else:
            return redirect()->route('admin_login');
        endif;
    }

    public function updatePlotPedia(Request $request)
    {
        if(Auth::user()->acount_type == 1):

            $this->validate($request, [
                'title' => 'required|string||max:255',
                'description' => 'required|string',
                'status' => 'required',
            ]);
            $id = $request->id;
            $plotpedia = Plot_Pedia::findOrFail($id);
            $data = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ];

            if ($request->hasFile('blog_image')) {
                $filePath = uploadFile($request->file('blog_image'), 'uploads/admin/plot_pedia/', array('jpg','png','gif'));
                $data['image'] = $filePath;                    
            }

            if ($plotpedia->update($data)) :
                Session::flash('success', 'Plot Pedia Updated Successfully'); 
            else:
                Session::flash('error', 'Plot Pedia Not Updated, error'); 
            endif;

            return redirect()->route('edit_plot_pedia',base64_encode($id));
        else:
            return redirect()->route('admin_login');
        endif;
    }

    public function deletePediaRecord($plot_pedia_id)
    {
        if(Auth::user()->acount_type == 1):
            if(base64_decode($plot_pedia_id) > 0):
                $plot_pedia = Plot_Pedia::find(base64_decode($plot_pedia_id));
                if ($plot_pedia) {
                    $plot_pedia->delete();
                    Session::flash('success', 'Plot Pedia Deleted Successfully'); 
                }else{
                    Session::flash('error', 'Plot Pedia Not Delete, error'); 
                }
            endif;
            return redirect()->route('plot_pedia_list');
        else:
            return redirect()->route('admin_login');
        endif;
    }

    // public function plorPediaViewAPI(Request $request)
    // {
    //     $userAgent = $request->header('User-Agent');
    //     $viewAPI = Plot_Pedia::where('status',1)->get();
    //     if (strpos($this->completeRoutePath, '/api/') !== false) {
    //         return successResponse($viewAPI,200,"success");
    //     }else{
    //         return view('pages.user.view_property_list')->with('pediaList', $viewAPI);
    //     }
    // }
    
}
