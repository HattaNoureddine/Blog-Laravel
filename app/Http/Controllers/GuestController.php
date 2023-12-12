<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Post;
use App\Models\Social;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {
        $popular = Categorie::take(5)->get();
        $categories = Categorie::all();
        $posts = Post::where('status','true')->get();
        $socials = Social::all();
        return view('guest.home')->with('categories',$categories)->with('posts',$posts)->with('popular',$popular)->with('socials',$socials);
    }

    public function postDetails($id){
        $popular = Categorie::take(5)->get();
        $post = Post::find($id);
        $posts = Post::where('status','true')->get();
        $categories = Categorie::all();
        $socials = Social::all();
        return view('guest.detailspost')->with('post',$post)->with('categories',$categories)->with('posts',$posts)->with('popular',$popular)->with('socials',$socials);
    }

    public function categoryliste($idcategory){
        $popular = Categorie::take(5)->get();
        $categorie = Categorie::find($idcategory);
        $posts = $categorie->posts;
        $categories = Categorie::all();
        $socials = Social::all();
        return view('guest.categorie')->with('posts',$posts)->with('categories',$categories)->with('categorie',$categorie)->with('popular',$popular)->with('socials',$socials);
    }

    public function search(Request $request){
        $popular = Categorie::take(5)->get();
        $categories = Categorie::all();
        $posts = Post::where('name','LIKE','%'.$request->keywords.'%')->get();
        $socials = Social::all();
        return view('guest.search')->with('categories',$categories)->with('posts',$posts)->with('popular',$popular)->with('socials',$socials);
    }

   
}
