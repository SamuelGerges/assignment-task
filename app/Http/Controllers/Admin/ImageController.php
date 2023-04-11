<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImagesRequest;
use App\Models\Album;
use App\Models\Image;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    use Upload;
    public function showImages($album_id)
    {
        $images = Image::selection()->where('album_id',$album_id)->get();
        return view('admin.images.index',compact('images'));
    }

    public function AddImages($id)
    {
        return view('admin.images.create',compact('id'));
    }

    public function saveImages(Request $request)
    {
        $file = $request->file('images');
        $filename = $this->uploadImage($file,'albums');
        return [
            'path'  => $filename,
            'title' => explode('.', $file->getClientOriginalName())[0],
        ];
    }

    public function storeImages(ImagesRequest $request, $id)
    {
        if(!$request->has('images'))
        {
            return;
        }

        $image =$this->saveImages($request);
        $imageObj = Image::create([
            'album_id'    => $id,
            'image_title' => $image["title"],
            'image_path'  => $image["path"],
        ]);

        return $imageObj->id;

    }

    public function editImage($id)
    {
        $image = Image::find($id);
        if (! $image){
            session()->flash('success' , 'Image not existed');
            return redirect()->route('admin.images.showImages');
        }
        return view('admin.images.edit',compact('image'));
    }


    public function updateImage(ImagesRequest $request,$id)
    {
        $image = Image::find($id);
        if (!$image){
            session()->flash('success' , 'Image not existed');
            return redirect()->back();
        }
        $image->update($request->except('_token','_method'));
        session()->flash('success' , 'Updated successfully');
        return redirect()->route('admin.albums.showAlbum');
    }

    public function deleteImage($id)
    {
        $image = Image::find($id);
        if (!$image){
            session()->flash('success' , 'Image not existed');
            return redirect()->back();
        }
        unlink($image->image_path);
        $image->delete();
        session()->flash('success' , 'deleted successfully');
        return redirect()->back();
    }

    public function moveImage($id)
    {
        $data = [];
        $data['image'] = Image::find($id);
        if (! $data['image']){
            session()->flash('success' , 'Image not existed');
            return redirect()->route('admin.images.showImages');
        }
        $data['albums'] = Album::selection()->get();
        return view('admin.images.move',$data);
    }

    public function updateMoveImage(ImagesRequest $request,$id)
    {
        $image = Image::find($id);
        if (!$image){
            session()->flash('success' , 'Image not existed');
            return redirect()->back();
        }
        $image->update($request->except('_token','_method'));
        session()->flash('success' , 'moved successfully');
        return redirect()->route('admin.albums.showAlbum');
    }
}
