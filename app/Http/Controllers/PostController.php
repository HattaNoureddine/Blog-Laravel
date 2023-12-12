<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        $categories = Categorie::all();
        return view('admin.posts.index')->with('posts',$posts)->with('categories',$categories);
    }

  



    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'categorie' => 'required',
            'image' => 'required|image',
        ]);
        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->categorie_id = $request->categorie;
        $post->user_id = Auth::user()->id;
        //upload image
        $newName = uniqid();
        $image = $request->file('image');
        $newName.=".".$image->getClientOriginalExtension();
        $destinationPath = 'upload';
        $image->move($destinationPath,$newName);

        $post->image = $newName;

        if($post->save())
        {
            return redirect()->back();
        }else
        {
            echo "error";
        }
    }




    public function update(Request $request)
    {
        
         $post = Post::find($request->id_post);
         $post->name = $request->name;
         $post->description = $request->description;
         $post->categorie_id = $request->categorie;
         $post->user_id = Auth::user()->id;
        if($request->file('image')){

            $destination = 'upload/'.$post->image;

            if(File::exists($destination))
            {
                File::delete($destination);
            }

            //upload nv photo
            $newname = uniqid();
            $image = $request->file('image');
            $newname.= ".".$image->getClientOriginalExtension();
            $destinationPath = 'upload';
            $image->move($destinationPath,$newname);

            $post->image = $newname;
        }
       
        if($post->update())
        {
            return redirect()->back();
        }else{
            echo "error";
        }
    }






    

    public function destroy($id){
        $post = Post::find($id);
        $file_path = public_path().'/upload/'.$post->image;
        unlink($file_path);
        if($post->delete()){
            return redirect()->back();
        }else{
            echo "error";
        }


    }
































    

    public function searchPost(Request $request){
        if($request->post_name){
            $posts = Post::where('name','LIKE','%'.$request->post_name.'%')->get();
        }
        $categories = Categorie::all();
        return view('admin.posts.index')->with('posts',$posts)->with('categories',$categories);
    }







    public function status(){
        $posts = Post::all();
        $categories = Post::all();
        return view('admin.posts.status_posts')->with('posts',$posts)->with('categories',$categories);
    }

    public function BloquerPost($id){
        $post = Post::find($id);
        $post->status = 'false';
        $post->update();
        return redirect()->back();
    }

    public function ActiverPost($id){
        $post = Post::find($id);
        $post->status = 'true';
        $post->update();
        return redirect()->back();
    }
}

