<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    use HasFactory;

    protected $table = 'statu';
    public $timestamps = false; 
    /**

    * The attributes that are mass assignable.

    *

    * @var array

    */

    protected $fillable = [
        'name'
    ];
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'id'
    ];
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
    ];

    public function Statu(){
        return $this->hasMany( 'App\Statu', 'statu_id', 'id' );
    }
}
