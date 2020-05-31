<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Plant extends Model
{
    protected $fillable = ['name','scientific_name','min_grow_temp','opt_grow_temp','tips'];

    const SIZE_FORMAT_PRECISION = 0;
    const THUMBNAIL_SUFFIX = '&&tnail-plant';
    const THUMBNAIL_WIDTH = 250;


    public function createThumbnail()
    {
        $thumbnailImage = Image::make(storage_path('app/' . $this->image));
        $thumbnailImage->resize(Plant::THUMBNAIL_WIDTH, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $thumbnailImage->save(storage_path('app/' . $this->thumbnail));
    }
    public function getThumbnailUrlAttribute()
    {
        if (empty($this->thumbnail)) {
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
        if (empty($this->image)) {
            return null;
        }
        $ext = pathinfo($this->image, PATHINFO_EXTENSION);
        return substr($this->image, 0, strlen($ext) * -1 - 1) . Plant::THUMBNAIL_SUFFIX . '.' . $ext;
    }
}
