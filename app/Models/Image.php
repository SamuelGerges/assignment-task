<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Image extends Model
{
    use HasFactory;

    protected $fillable = ['album_id', 'image_path','image_title','crated_at','updated_at'];




    public function scopeSelection($query)
    {
        return $query->select('id','album_id', 'image_path','image_title');
    }
    public function getImagePathAttribute($image_path)
    {
        return 'uploads/albums/' . $image_path;
    }
    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }

    public function getImage($id)
    {
        $image = DB::table('images')
            ->select('image_path')
            ->where('id', '=', $id)->first();
        return 'albums/' . $image->image_path;
    }

}//end of model
