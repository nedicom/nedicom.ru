<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Article;
use App\Models\Image;


class ImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {                
        $imgModel = new Image;

            if($req->file()) {
                $pagetype = $req->pagetype;
                $id = $req->id;
                $fileName = time().'_'.$req->file->getClientOriginalName();
                if($pagetype == 'profile'){
                    $filePath = 'usr/'.Auth::user()->id.'/images';
                    $fileName = $req->file->getClientOriginalName();
                }
                elseif($pagetype ==  'profileavatar'){
                    $fileName = $req->file->getClientOriginalName();
                    $filePath = 'usr/'.Auth::user()->id.'/avatar';
                }
                    elseif($pagetype ==  'article'){
                        $fileName = time().'_'.$req->file->getClientOriginalName();
                        $filePath = 'usr/'.Auth::user()->id.'/articleimages/'.$id;
                    }
                        else{
                            return back();
                        }
               
                $req->file('file')->storeAs($filePath, $fileName, 'public'); 
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                //dd (finfo_file($finfo, 'storage/'.$filePath."/".$fileName));
                $mime = finfo_file($finfo, 'storage/'.$filePath."/".$fileName);
                finfo_close($finfo);

                if($mime == "image/png"){
                    $im = imagecreatefrompng('storage/'.$filePath.'/'.$fileName);
                }
                    else if($mime == "image/jpeg"){
                        $im = imagecreatefromjpeg('storage/'.$filePath.'/'.$fileName);
                    }
                        else{
                            return back();
                        }
                
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

                //if(str_contains($req->header('referer'), 'profile')){
                if($pagetype ==  'profile'){    
                    $user = User::find(Auth::user()->id);
                    $user->file_path = $newfilepath;
                    $user->save();
                }
                    elseif($pagetype ==  'profileavatar'){
                        $user = User::find(Auth::user()->id);
                        $user->avatar_path = $newfilepath;
                        $user->save();
                    }
                        elseif(str_contains($req->header('referer'), 'articles')){
                            $article = Article::find($id);
                            $article->practice_file_path = $newfilepath;
                            $article->save();  
                        }
                            else{
                                return back();
                            }
                 

                
            }

            else {
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
