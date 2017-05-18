<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = "comments";

    protected $fillable = [
    	"comments","id_article","id_users"
    ];

    public function article() 
    {
    	return $this->belongsTo('\App\Article','id');
    }

    public function user() {
    	return $this->belongsTo('\App\User','id');
    }
    
}
