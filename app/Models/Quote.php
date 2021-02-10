<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quotes';
    protected $fillable = ['content', 'author'];

    public function tags()
    {
    	return $this->belongsToMany(
    		Tag::class,
    		'quotes_tags',
    		'quote_id',
    		'tag_id'
    	);
    }
}
