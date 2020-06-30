<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'content'
    ];

    public static $rules = array(
      'user_id' => 'required',
      'post_id' => 'required',
      'content' => 'required|max:200',
    );
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
