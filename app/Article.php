<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";

    protected $fillable = [
    	"title","content"
    ];

    public function comments() {
    	return $this->hasMany('\App\Comments', 'id_article','id');
    }

}
