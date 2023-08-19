<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

// Models 
use App\Models\Posts;
use App\Models\PostMedia;

// Requests 
use App\Http\Requests\PostRequest;

// Resource 
use App\Http\Resources\GetPosts;

class PostsController extends Controller
{
    protected $completeRoutePath;

    public function __construct(Request $request)
    {
        $this->completeRoutePath = $request->url();
    }

    public function addPost()
    {
        if(Auth::user()->acount_type == 2 || Auth::user()->acount_type == 3):
            return view('pages.user.posts.add');
        else:
            return redirect()->route('user_login');
        endif;
    }

    public function postList()
    {
        $postList = Posts::where('created_by', Auth::user()->user_id)->get();
        if (strpos($this->completeRoutePath, '/api/') !== false) {
            return successResponse(new GetPosts($postList),200,"success");
        }else{
            return view('pages.user.posts.view')->with('postList', $postList);
        }
    }

    public function submitPost(PostRequest $request)
    {
        if(Auth::user()->acount_type == 2 || Auth::user()->acount_type == 3):
            $posts = new Posts();
            $posts->title = $request->input('title');
            $posts->type = $request->input('type');
            $posts->created_by = auth()->user()->user_id;

            if ($posts->save()) :

                $insertedId = $posts->post_id;
                // Upload Post Image Media 
                if ($request->hasFile('office_picture')) {
                    foreach ($request->file('office_picture') as $image) {
                        $filePath = uploadFile($image, 'uploads/posts/'.$insertedId, array('jpg','png','gif'));                    
                        PostMedia::create([
                            'post_id' => $insertedId,
                            'office_picture' => $filePath,
                            'file_type' => "image",
                        ]);
                    }
                }
    
                // Upload Post Video Media 
                if ($request->hasFile('office_video')) {
                    foreach ($request->file('office_video') as $video) {
                        $filePath = uploadFile($video, 'uploads/posts/'.$insertedId, array('mp4'));                    
                        PostMedia::create([
                            'post_id' => $insertedId,
                            'office_video' => $filePath,
                            'file_type' => "video",
                        ]);
                    }
                }

                // Upload Post Document Media 
                if ($request->hasFile('office_document')) {
                    foreach ($request->file('office_document') as $video) {
                        $filePath = uploadFile($video, 'uploads/posts/'.$insertedId, array('docx','xlsx','pdf','jpg','png'));                    
                        PostMedia::create([
                            'post_id' => $insertedId,
                            'office_document' => $filePath,
                            'file_type' => "document",
                        ]);
                    }
                }

                if (strpos($this->completeRoutePath, '/api/') !== false) {
                    return successResponse(array("message" => "Post Added Successfully"),200,"success");
                } else {
                    Session::flash('success', 'Post Added Successfully'); 
                    return redirect()->route('add_post');
                }
            else:
                if (strpos($this->completeRoutePath, '/api/') !== false) {
                    return successResponse(array("message" => "Post Not Added, error"),404,"error");
                } else {
                    Session::flash('error', 'Post Not Addedd, error'); 
                    return redirect()->route('add_post');
                }
            endif;
        else:
            return redirect()->route('user_login');
        endif;
    }
    
    public function editPostRecord($post_id)
    {
        if(Auth::user()->acount_type == 2 || Auth::user()->acount_type == 3):
            if($post_id > 0):
                if (strpos($this->completeRoutePath, '/api/') !== false) {
                    $edit_post_id = $post_id;
                }else{
                    $edit_post_id = base64_decode($post_id);
                }
                $edit_post = Posts::find($edit_post_id);
                if ($edit_post) {

                    $edit_post->get();
                    $postMedia = DB::table('post_media')->where("post_id",$edit_post_id)->get();
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(new EditPost($edit_post),200,"success");
                    }else{
                        return view('pages.user.posts.edit')->with('editPost',$edit_post)->with('postMedia',$postMedia);
                    }
                }else{
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(array("message" => "Post Edit Id Not Found"),404,"error");
                    }else{
                        Session::flash('error', 'Post Edit Id Not Found, error'); 
                        return redirect()->route('plot_pedia_list');
                    }
                }
            endif;
        else:
            return redirect()->route('user_login');
        endif;
    }

    public function updatePost(PostRequest $request)
    {
        if(Auth::user()->acount_type == 2 || Auth::user()->acount_type == 3):
            $id = $request->id;
            $postUpdate = Posts::where('post_id',$id);
            $data = [
                'title' => $request->input('title'),
                'type' => $request->input('type'),
            ];
            if ($postUpdate->update($data)) :

                $insertedId = $id;
                // Upload Post Image Media 
                if ($request->hasFile('office_picture')) {
                    foreach ($request->file('office_picture') as $image) {
                        $filePath = uploadFile($image, 'uploads/posts/'.$insertedId, array('jpg','png','gif'));                    
                        PostMedia::create([
                            'post_id' => $insertedId,
                            'office_picture' => $filePath,
                            'file_type' => "image",
                        ]);
                    }
                }
    
                // Upload Post Video Media 
                if ($request->hasFile('office_video')) {
                    foreach ($request->file('office_video') as $video) {
                        $filePath = uploadFile($video, 'uploads/posts/'.$insertedId, array('mp4'));                    
                        PostMedia::create([
                            'post_id' => $insertedId,
                            'office_video' => $filePath,
                            'file_type' => "video",
                        ]);
                    }
                }

                // Upload Post Document Media 
                if ($request->hasFile('office_document')) {
                    foreach ($request->file('office_document') as $video) {
                        $filePath = uploadFile($video, 'uploads/posts/'.$insertedId, array('docx','xlsx','pdf','jpg','png'));                    
                        PostMedia::create([
                            'post_id' => $insertedId,
                            'office_document' => $filePath,
                            'file_type' => "document",
                        ]);
                    }
                }

                if (strpos($this->completeRoutePath, '/api/') !== false) {
                    return successResponse(array("message" => "Post Updated Successfully"),200,"success");
                }else{
                    Session::flash('success', 'Post Updated Successfully'); 
                    return redirect()->route('edit_post',base64_encode($id));
                }
            else:
                if (strpos($this->completeRoutePath, '/api/') !== false) {
                    return successResponse(array("message" => "Post Edit Id Not Found"),404,"error");
                }else{
                    Session::flash('error', 'Post Not Updated, error'); 
                    return redirect()->route('edit_post',base64_encode($id));
                }
            endif;
        else:
            return redirect()->route('admin_login');
        endif;
    }

    public function deletePostRecord($post_id)
    {
        if(Auth::user()->acount_type == 2 || Auth::user()->acount_type == 3):
            if(base64_decode($post_id) > 0):
                $post = Plot_Pedia::find(base64_decode($post_id));
                if ($post) {
                    $post->delete();
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(array("message" => "Post Deleted Successfully"),200,"success");
                    }else{
                        Session::flash('success', 'Post Deleted Successfully'); 
                        return redirect()->route('post_list');
                    }
                }else{
                    if (strpos($this->completeRoutePath, '/api/') !== false) {
                        return successResponse(array("message" => "Post Not Delete, error"),404,"error");
                    }else{
                        Session::flash('error', 'Post Not Delete, error'); 
                        return redirect()->route('plot_pedia_list');
                    }
                }
            endif;
        else:
            return redirect()->route('admin_login');
        endif;
    }

    public function deletePostFile($id, $post_id)
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
