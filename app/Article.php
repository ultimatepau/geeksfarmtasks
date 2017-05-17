<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	public $primaryKey = 'id';

    protected $table = 'articles';

    protected $fillable = [
    	'path','author','title'
    ];
}
