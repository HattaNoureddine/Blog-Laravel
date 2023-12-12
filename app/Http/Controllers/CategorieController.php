<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategorieController extends Controller
{
    public function index(){

        $categories = Categorie::all();
        return view('admin.categories.index')->with('categories',$categories);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);
        
        $categorie = new Categorie();
        $categorie->name = $request->name;
        $categorie->description = $request->description;
        //upload image
        $newName = uniqid();
        $image = $request->file('image');
        $newName.=".".$image->getClientOriginalExtension();
        $destinationPath = 'upload';
        $image->move($destinationPath,$newName);

        $categorie->image = $newName;

        if($categorie->save())
        {
            return redirect()->back();
        }else
        {
            echo "error";
        }
    }







    
    public function destroy($id){
        $categorie = Categorie::find($id);  
        $file_path = public_path().'/upload/'.$categorie->image;
        unlink($file_path);
        if($categorie->delete()){
            return redirect()->back();
        }else{
            echo "error";
        }
    }





    


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $categorie = Categorie::find($request->id_categorie);
        $categorie->name = $request->name;
        $categorie->description = $request->description;

        if($request->file('image')){
            $destination = 'upload/'.$categorie->image;

            if(File::exists($destination)){
                File::delete($destination);
            }
            //upload nv image
            $newName = uniqid();
            $image = $request->file('image');
            $newName.=".".$image->getClientOriginalExtension();
            $destinationPath = 'upload';
            $image->move($destinationPath,$newName);

            $categorie->image = $newName;
        }
        if($categorie->update())
        {
            return redirect()->back();
        }else{
            echo "error";
        }
    }

    public function searchCategorie(Request $request){
        if($request->categorie_name){
            $categories = Categorie::where('name','LIKE','%'.$request->categorie_name.'%')->get();
        }
        return  view('admin.categories.index')->with('categories',$categories);
    }
}
