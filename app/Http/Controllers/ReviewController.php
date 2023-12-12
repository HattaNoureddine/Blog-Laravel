<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::where('etat',true)->get();
        return view('admin.reviews.index')->with('reviews',$reviews);
    }

    public function vu($id){
        $review = Review::find($id);
        $review->etat = false;
        
        if($review->save()){
            return redirect()->back();
        }
    }
}
