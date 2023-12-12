<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Review;
use App\Models\Social;
use App\Models\Contact;
use App\Models\Categorie;
use App\Models\Reglement;
use App\Models\Emailenvoyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function dashboard(){
        return view('client.dashboard');
    }

    public function addReview(Request $request){
        $review = new Review();
        $review->post_id = $request->post_id;
        $review->content = $request->content;
        $review->user_id = Auth::user()->id;

        $review->save();

        return redirect()->back();

    }

    public function profile(){
        $popular = Categorie::take(5)->get();
        $categories = Categorie::all();
        $posts = Post::where('status','true')->get();
        $socials = Social::all();
        return view('client.profile')->with('categories',$categories)->with('posts',$posts)->with('popular',$popular)->with('socials',$socials);
    }

    public function updateProfile(Request $request){
        Auth::user()->name = $request->name;
        Auth::user()->email = $request->email;

        if($request->password){
            Auth::user()->password = Hash::make($request->email);
        }
        if($request->file('image')){
            $destination = 'upload/'.Auth::user()->image;

            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $newname = uniqid();
            $image = $request->file('image');
            $newname.= ".".$image->getClientOriginalExtension();
            $destinationPath = 'upload';
            $image->move($destinationPath,$newname);

            Auth::user()->image = $newname;
        }
        Auth::user()->update();
        return redirect()->back();
    }

    public function emailenvoyer(Request $request){
        $email = new Emailenvoyer();
        $email->content = $request->email;

        $email->save();
        return redirect()->back();
    }

    public function afficherMessageBloquer(){
        $popular = Categorie::take(5)->get();
        $categories = Categorie::all();
        $posts = Post::where('status','true')->get();
        $socials = Social::all();
        return view('client.bloquer')->with('popular',$popular)->with('categories',$categories)->with('posts',$posts)->with('socials',$socials);
    }

    public function searchUser(Request $request){
        if($request->user_name){
            $users = User::where('name','LIKE','%'.$request->user_name.'%')->where('role','user')->get();
        }
        return view('admin.users.index')->with('users',$users);
    }

    public function addArticle(){
        $popular = Categorie::take(5)->get();
        $categories = Categorie::all();
        $socials = Social::all();
        $posts = Post::where('status','true')->get();
        return view('client.dashboard')->with('popular',$popular)->with('categories',$categories)->with('socials',$socials)->with('posts',$posts);
    }

    public function storeArticle(Request $request){
        $request->validate([
            'name' => 'required',
            'categorie' => 'required',
            'image' => 'required|image',
            'description' => 'required',
        ]);

        $post = new Post();
        $post->name = $request->name;
        $post->categorie_id  = $request->categorie;
        $post->description = $request->description;
        $post->user_id = Auth::user()->id;
       //upload image
       $newName = uniqid();
       $image = $request->file('image');
       $newName.=".".$image->getClientOriginalExtension();
       $destinationPath = 'upload';
       $image->move($destinationPath,$newName);

       $post->image = $newName;

       if($post->save()){
        session()->flash('success', 'L\'article a été ajouté avec succès!');
        return redirect()->back();
    }
    }

    public function reglements(){
        $popular = Categorie::take(5)->get();
        $categories = Categorie::all();
        $socials = Social::all();
        $posts = Post::where('status','true')->get();
        $reglements = Reglement::all();
        return view('guest.reglements')->with('popular',$popular)
                                       ->with('categories',$categories)
                                       ->with('socials',$socials)
                                       ->with('posts',$posts)
                                       ->with('reglements',$reglements);
    }


    public function contact(){
        $popular = Categorie::take(5)->get();
        $categories = Categorie::all();
        $socials = Social::all();
        $posts = Post::where('status','true')->get();
        return view('guest.contact')->with('popular',$popular)
                                    ->with('categories',$categories)
                                    ->with('socials',$socials)
                                    ->with('posts',$posts);
    }

    public function storeContact(Request $request){
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->user_id = Auth::user()->id;

       
        if($contact->save()){
            session()->flash('success', 'L\'message a été envoyer avec succès!');
            return redirect()->back();
        }
    }
}
