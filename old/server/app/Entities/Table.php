<?php
        
namespace App\Entities;
        
use \Illuminate\Database\Eloquent\Model as Entity;
        
class Table extends Entity {
        
    protected $table = 'tables';
    protected $fillable = [
         'id',
         'column',
         'created_at',
         'updated_at'
    ];

}