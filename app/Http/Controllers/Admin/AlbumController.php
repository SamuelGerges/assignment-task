<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest;
use App\Models\Album;


class AlbumController extends Controller
{
    public function showAlbum()
    {
        $albums = Album::selection()->get();
        return view('admin.albums.index',compact('albums'));

    }

    public function createAlbum()
    {
        return view('admin.albums.create');

    }
    public function storeAlbum(AlbumRequest $request)
    {
            Album::create($request->except('_token','_method'));
            session()->flash('success' , 'Created successfully');
            return redirect()->route('admin.albums.showAlbum');
    }

    public function editAlbum($id)
    {
        $album = Album::find($id);
        if (!$album){
            session()->flash('success' , 'Album not existed');
            return redirect()->route('admin.albums.showAlbum');
        }
        return view('admin.albums.edit',compact('album'));
    }
    public function updateAlbum(AlbumRequest $request,$id)
    {
        $album = Album::find($id);
        if (!$album){
            session()->flash('success' , 'Album not existed');
            return redirect()->back('admin.albums.showAlbum');
        }
        $album->update($request->all());
        session()->flash('success' , 'Updated successfully');
        return redirect()->route('admin.albums.showAlbum');
    }

    public function deleteAlbumOnly($id)
    {
        $album = Album::find($id);
        if (!$album){
            session()->flash('success' , 'Album not existed');
            return redirect()->back('admin.albums.showAlbum');
        }
        $album->delete();
        session()->flash('success' , 'deleted successfully');
        return redirect()->route('admin.albums.showAlbum');
    }

    public function deleteAlbumWithAllImages($id)
    {
        $album = Album::find($id);
        if (!$album){
            session()->flash('success' , 'Album not existed');
            return redirect()->back('admin.albums.showAlbum');
        }
        foreach ($album->images as $image){
            unlink($image->image_path);
        }
//        $album->images()->delete();
        $album->delete();
        session()->flash('success' , 'deleted successfully');
        return redirect()->route('admin.albums.showAlbum');
    }

}
