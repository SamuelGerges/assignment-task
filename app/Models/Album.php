<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['id','album_name'];
    public function scopeSelection($query)
    {
        return $query->select('id', 'album_name');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'album_id', 'id');
    }




}//end of model
