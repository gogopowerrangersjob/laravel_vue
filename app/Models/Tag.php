<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['title'];

    public function quotes( )
    {
    	return $this->belongsToMany(
    		Quote::class,
    		'quotes_tags',
    		'tag_id',
    		'quote_id'

    	);
    }
}
