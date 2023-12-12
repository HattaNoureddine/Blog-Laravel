<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Reglement;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
      $categories = Categorie::all();
      $posts = Post::all();
      $reviews = Review::where('etat',true)->get();
      $users = User::where('role','user')->get();
      $admins = User::where('role','admin')->get();
      return view('admin.dashboard')->with('categories',$categories)
                                    ->with('posts',$posts)
                                    ->with('reviews',$reviews)
                                    ->with('users',$users)
                                    ->with('admins',$admins);
    }

    public function users(){
        $users = User::where('role','user')->get();
        return view('admin.users.index')->with('users',$users);
    } 

    public function BloquerUser($iduser)
    {
        $user = User::find($iduser);
        $user->is_active = false;
        $user->update();
        return redirect()->back();
    }

    public function ActiverUser($iduser)
    {
        $user = User::find($iduser);
        $user->is_active = true;
        $user->update();
        return redirect()->back();
    }


    public function listeadmin(){
        $admins = User::where('role','admin')->get();
        return view('admin.admins.index')->with('admins',$admins);
    }



    public function store(Request $request){

      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'image' => 'required|image',
      ]);

      $admin = new User();
      $admin->name = $request->name;
      $admin->email = $request->email;
      $admin->role = 'admin';
      $admin->password = Hash::make($request->password); 

      //upload image
      $newName = uniqid();
      $image = $request->file('image');
      $newName.=".".$image->getClientOriginalExtension();
      $destinationPath = 'upload';
      $image->move($destinationPath,$newName);

      $admin->image=$newName;

      if($admin->save()){
        return redirect()->back();
      }

    }

    public function destroy($idadmin){
        $admin = User::find($idadmin);
        $file_path = public_path().'/upload/'.$admin->image;
        unlink($file_path);
        if($admin->delete()){
            return redirect()->back();
        }
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image',
          ]);

       $admin = User::find($request->id_admin);
       $admin->name = $request->name;
       $admin->email = $request->email;
       $admin->role = 'admin';
       $admin->password = Hash::make($request->password); 
       
      if($request->file('image')){
        $destination = 'upload/'.$admin->image;
        if(File::exists($destination)){
            File::delete($destination);
        }

      //upload image
      $newName = uniqid();
      $image = $request->file('image');
      $newName.=".".$image->getClientOriginalExtension();
      $destinationPath = 'upload';
      $image->move($destinationPath,$newName);

      $admin->image=$newName;

      }
      if($admin->update()){
        return redirect()->back();
      }
    }

    public function searchAdmin(Request $request){
      if($request->admin_name){
        $admins = User::where('name','LIKE','%'.$request->admin_name.'%')->where('role','admin')->get();
    }
    return view('admin.admins.index')->with('admins',$admins);
    }


    public function contact(){
      $contacts = Contact::all();
      return view('admin.contacts.index')->with('contacts',$contacts);
    }

    public function delete($id){
      $contact = Contact::find($id);
      if($contact->delete()){
        return redirect('/admin/contacts');
      }
    }


    public function reglements(){
      $reglements = Reglement::all();
      return view('admin.reglements.index')->with('reglements',$reglements);
    }

    public function storeReglement(Request $request){
      $reglement = new Reglement();
      $reglement->titre = $request->titre;
      $reglement->description = $request->description;

      if($reglement->save()){
        return redirect('/admin/reglements');
      }
    }

    public function updateReglement(Request $request){
      $reglement = Reglement::find($request->id_reglement);
      $reglement->titre = $request->titre;
      $reglement->description = $request->description;

      if($reglement->save()){
        return redirect('/admin/reglements');
      }
    }

    public function deleteReglement($id){
      $reglement = Reglement::find($id);
      if($reglement->delete()){
        return redirect('/admin/reglements');
      }
    }
}
