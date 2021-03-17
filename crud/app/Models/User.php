<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $table = 'user';
    public $timestamps = false; 
    /**

    * The attributes that are mass assignable.

    *

    * @var array

    */

    protected $fillable = [
        'first_name', 'last_name', 'email','n_document','phone_number', 'statu_id'
    ];
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'statu_id', 'id'
    ];
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
    ];

    public function Statu(){
        return $this->belongsTo( 'App\Statu', 'statu_id', 'id' );
    }
}
