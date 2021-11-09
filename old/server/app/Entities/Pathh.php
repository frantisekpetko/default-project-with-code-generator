<?php
        
namespace App\Entities;
        
use \Illuminate\Database\Eloquent\Model as Entity;
        
class Pathh extends Entity {
        
    protected $table = 'pathhs';
    protected $fillable = [
         'id',
         'column',
         'created_at',
         'updated_at'
    ];

}