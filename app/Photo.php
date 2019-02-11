<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'path'
    ];

    protected $uploads = 'images/';

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function post()
    {
        return $this->hasOne('App\Post');
    }

    public function getPathAttribute($value)
    {
        return $this->uploads . $value;
    }

    public static function hasPhoto($input, $request)
    {
        if ($request->hasFile('photo_id')) {
            $file = $request->file('photo_id');
            $path = time() . $file->getClientOriginalName();
            $file->move('images', $path);
            $photo = Photo::create(['path' => $path]);
            $input['photo_id'] = $photo->id;
            return $input;
        }
        return $input;
    }

}
