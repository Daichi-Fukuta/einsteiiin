<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
      'user_id' => 'required',
      'content' => 'required'
    );

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
