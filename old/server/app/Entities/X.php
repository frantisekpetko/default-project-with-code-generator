<?php
        
namespace App\Entities;
        
use \Illuminate\Database\Eloquent\Model as Entity;
        
class X extends Entity {
        
    protected $table = 'xs';
    protected $fillable = [
         'id',
         'xxx',
         'created_at',
         'updated_at'
    ];

}