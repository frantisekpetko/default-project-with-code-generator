<?php
        
namespace App\Entities;
        
use \Illuminate\Database\Eloquent\Model as Entity;
        
class Cat extends Entity {
        
    protected $table = 'cats';
    protected $fillable = [
         'id',
         'name',
         'age',
         'created_at',
         'updated_at'
    ];

}