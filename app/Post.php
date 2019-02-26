<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Photo;
use Illuminate\Support\Facades\Auth;
class Post extends Model
{
    //
    use Sluggable;
    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function placeHolder(){
        return "http://placehold.it/400x400";
    }
    public static function newPost($request){
        $user = Auth::user();
        $input = $request->all();
        $input = Photo::hasPhoto($input,$request);
        $user->posts()->create($input);
        $request->session()->flash('created_post', 'The post has been created');
    }
}
