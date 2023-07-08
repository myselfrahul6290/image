<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{

public function index(){
    return view('index');
}

    public function store(Request $request){
  
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);
           //fetch image from blade file
           $image = $request->file('image');
           $size=$image->getSize();
           $size=$size/1000000;

           // create image name and give dirctory in compress folder 
          $name='compress/'.time().'.'.$request->image->extension();
          //open image file
       $img=Image::make($image->getRealPath());
       // resize image file
       $img->resize(600,650);
       // compress and save
       $img->save($name,60);

       return back()->with('success', 'Image compress Successfully!'.$size.'mb')
       ->with('image', $name);
    }

    // public function show($size){
        

    //     return response()->json([
    //         'name' => $size,
    //         'state' => 'CA',
    //     ]);
    // }
}

