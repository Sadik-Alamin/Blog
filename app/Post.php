<?php

namespace App;



class Post extends Model
{
    public function comments(){
    	return $this->hasMany(Comment::class);
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public static function archives(){
    	return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) publushed')
            ->groupBy('year','month')
            ->get()
            ->toArray();
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
