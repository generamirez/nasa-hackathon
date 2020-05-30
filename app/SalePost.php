<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use Storage;

class SalePost extends Model
{
    const SIZE_FORMAT_PRECISION = 0;
    const THUMBNAIL_SUFFIX = '&&tnail';
    const THUMBNAIL_WIDTH = 250;
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function createThumbnail()
    {
        $thumbnailImage = Image::make(storage_path('app/' . $this->image));
        $thumbnailImage->resize(SalePost::THUMBNAIL_WIDTH, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $thumbnailImage->save(storage_path('app/' . $this->thumbnail));
    }
    public function getThumbnailUrlAttribute()
    {
        if (empty($this->thumbnail)) {
            // dd('er');
            return null;
        }
        $qs = null;
        if (!empty($this->updated_at)) {
            $qs = '?v=' . $this->updated_at->format('YmdHis');
        }
        return Storage::url($this->thumbnail) . $qs;
    }
    public function getThumbnailAttribute()
    {
        // dd($this);
        if (empty($this->image)) {
            return null;
        }
        $ext = pathinfo($this->image, PATHINFO_EXTENSION);
        return substr($this->image, 0, strlen($ext) * -1 - 1) . SalePost::THUMBNAIL_SUFFIX . '.' . $ext;
    }
}
