<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Image;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {                
            $imgModel = new Image;
            if($req->file()) {
               
                $fileName = time().'_'.$req->file->getClientOriginalName();
                $filePath = 'usr/'.Auth::user()->id.'/images';



                $fullPath = '/storage/' . $filePath.'/'.$fileName;

                

                $req->file('file')->storeAs($filePath, $fileName, 'public');

                $im = imagecreatefrompng('storage/'.$filePath.'/'.$fileName);
                
                $files = Storage::allFiles('/public/'.$filePath);
                Storage::delete($files);

                $newfilepath = 'storage/'.$filePath.'/'.$fileName.'.webp';

                imagewebp($im, $newfilepath , 80);
                imagedestroy($im);

                $imgModel->user_id = Auth::user()->id;
                $imgModel->name = $fileName;
                $imgModel->file_path = $newfilepath;
                $imgModel->ext = $req->file->getClientMimeType();
                $imgModel->size = $req->file->getSize();
                $imgModel->save();

                $user = User::find(Auth::user()->id);
                $user->image_url = $newfilepath;
                $user->save();
                //  'storage/'.$filePath.'/'.$fileName
                //  '/public/'.$filePath.'/'.$fileName
                //$file = Storage::get('/public/'.$filePath.'/'.$fileName);  

                return back();
            }
            else{
                return back();
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageRequest  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
