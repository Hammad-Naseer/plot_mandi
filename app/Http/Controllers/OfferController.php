<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

// Models 
use App\Models\Offer;
// use App\Models\PostMedia;

// Requests 
use App\Http\Requests\OfferRequest;

// Resource 
use App\Http\Resources\GetPosts;

class OfferController extends Controller
{
    protected $completeRoutePath;

    public function __construct(Request $request)
    {
        $this->completeRoutePath = $request->url();
    }

    public function addOffer()
    {
        if(Auth::user()->acount_type == 1):
            return view('pages.admin.offer.add');
        else:
            return redirect()->route('user_login');
        endif;
    }

    public function offerList()
    {
        $offerList = Offer::where('created_by', Auth::user()->user_id)->get();
        if (strpos($this->completeRoutePath, '/api/') !== false) {
            return successResponse(new GetPosts($offerList),200,"success");
        }else{
            return view('pages.admin.offer.view')->with('offerList', $offerList);
        }
    }

    public function submitOffer(OfferRequest $request)
    {
        if(Auth::user()->acount_type == 1):
            $offer = new Offer();
            $offer->title = $request->input('title');
            $offer->description = $request->input('description');
            if ($request->hasFile('offer_image')) {
                $filePath = uploadFile($request->file('offer_image'), 'uploads/offers/', array('jpg','png','gif'));                    
                $offer->image = $filePath;
            }
            $offer->status = $request->input('status');
            $offer->created_by = auth()->user()->user_id;

            if ($offer->save()) :
                if (strpos($this->completeRoutePath, '/api/') !== false) {
                    return successResponse(array("message" => "Offer Added Successfully"),200,"success");
                } else {
                    Session::flash('success', 'Offer Added Successfully'); 
                    return redirect()->route('add_offer');
                }
            else:
                if (strpos($this->completeRoutePath, '/api/') !== false) {
                    return successResponse(array("message" => "Offer Not Added, error"),404,"error");
                } else {
                    Session::flash('error', 'Offer Not Addedd, error'); 
                    return redirect()->route('add_offer');
                }
            endif;
        else:
            return redirect()->route('admin_login');
        endif;
    }
    
    public function editOfferRecord($post_id)
    {
        if(Auth::user()->acount_type == 1):
            if($post_id > 0):
                if (strpos($this->completeRoutePath, '/api/') !== false) {
                    $edit_post_id = $post_id;
                }else{
                    $edit_post_id = base64_decode($post_id);
                }
                $edit_post = Offer::find($edit_post_id);
                if ($edit_post) {

                    $edit_post->get();
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(new EditPost($edit_post),200,"success");
                    }else{
                        return view('pages.admin.offer.edit')->with('editOffer',$edit_post);
                    }
                }else{
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(array("message" => "Offer Edit Id Not Found"),404,"error");
                    }else{
                        Session::flash('error', 'Offer Edit Id Not Found, error'); 
                        return redirect()->route('offer_list');
                    }
                }
            endif;
        else:
            return redirect()->route('user_login');
        endif;
    }

    public function updateOffer(OfferRequest $request)
    {
        if(Auth::user()->acount_type == 1):
            $id = $request->id;
            $offerUpdate = Offer::where('offer_id',$id);
            $data = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ];
            if ($request->hasFile('offer_image')) {
                $filePath = uploadFile($request->file('offer_image'), 'uploads/offers/', array('jpg','png','gif'));                    
                $data['image'] = $filePath;
            }
            if ($offerUpdate->update($data)) :
                if (strpos($this->completeRoutePath, '/api/') !== false) {
                    return successResponse(array("message" => "Offer Updated Successfully"),200,"success");
                }else{
                    Session::flash('success', 'Offer Updated Successfully'); 
                    return redirect()->route('edit_offer',base64_encode($id));
                }
            else:
                if (strpos($this->completeRoutePath, '/api/') !== false) {
                    return successResponse(array("message" => "Offer Edit Id Not Found"),404,"error");
                }else{
                    Session::flash('error', 'Offer Not Updated, error'); 
                    return redirect()->route('edit_offer',base64_encode($id));
                }
            endif;
        else:
            return redirect()->route('admin_login');
        endif;
    }

    public function deleteOfferRecord($post_id)
    {
        if(Auth::user()->acount_type == 1):
            if(base64_decode($post_id) > 0):
                $post = Offer::find(base64_decode($post_id));
                if ($post) {
                    $post->delete();
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(array("message" => "Offer Deleted Successfully"),200,"success");
                    }else{
                        Session::flash('success', 'Offer Deleted Successfully'); 
                        return redirect()->route('offer_list');
                    }
                }else{
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(array("message" => "Offer Not Delete, error"),404,"error");
                    }else{
                        Session::flash('error', 'Offer Not Delete, error'); 
                        return redirect()->route('offer_list');
                    }
                }
            endif;
        else:
            return redirect()->route('admin_login');
        endif;
    }

    public function deleteOfferFile($id, $post_id)
    {
        if(Auth::user()->acount_type == 2 || Auth::user()->acount_type == 3):
            if(base64_decode($id) > 0):
                $post = PostMedia::find(base64_decode($id));
                if ($post) {
                    // Unlink 
                    $imagePath = "";
                    if($post->office_picture !== ""):
                        $imagePath = $post->office_picture;
                    elseif($post->office_video !== ""):
                        $imagePath = $post->office_video;
                    elseif($post->office_document !== ""):
                        $imagePath = $post->office_document;
                    endif;
                    unLinkFile($imagePath);
                    // Delete Record From DB 
                    $post->delete();
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(array("message" => "Dealer File Deleted Successfully"),200,"success");
                    }else{
                        Session::flash('success', 'Dealer File Deleted Successfully'); 
                        return redirect()->route('edit_dealer', $post_id);
                    }
                }else{
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(array("message" => "Dealer File Not Delete, error"),404,"error");
                    }else{
                        Session::flash('error', 'Dealer File Not Delete, error'); 
                        return redirect()->route('edit_dealer', $post_id);
                    }
                }
            endif;
        else:
            return redirect()->route('admin_login');
        endif;
    }
}
