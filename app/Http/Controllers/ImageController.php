<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\compressionModel;

class ImageController extends Controller
{

public function index(){
    $pathStore=compressionModel::all();
    $data=compact('pathStore');
    return view('index')->with($data);
}

    public function store(Request $request){
  
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            
        ]);
        
        
           //fetch image from blade file
           $image = $request->file('image');
           $size1=$image->getSize();
           $size1=$size1/1000000;

           // create image name and give dirctory in compress folder 
          $name1='compress/'.time().'upload.'.$request->image->extension();
          
          
          // upload
          $img1=Image::make($image->getRealPath());
        //   $img1->resize(600,650);
          $img1->save($name1);
          
          //compress
          $name2='compress/'.time().'.'.$request->image->extension();
          $img2=Image::make($image->getRealPath());
          // $img2->resize(600,650);
          
          $img2->save($name2,60);
          
          //get size after comprssion
          $size2=$img2->filesize();
          $size2=$size2/1000000;
   
  
       return back()->with(['success1'=>'Image uploaded Successfully! and size=>'.$size1.'mb',
       'success2'=>'Image compresed Successfully!and size=>'.$size2.'mb',
       ])
       ->with(['image1'=>$name1, 'image2'=>$name2]);
    }

}

