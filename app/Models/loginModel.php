<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginModel extends Model
{
    use HasFactory;

     protected $table = 'login';
    public $timestamps = true;
    
    protected $fillable = [
    	
    	'id',
        'name',
    	'email',
    	'password'
    	
    ];

}
