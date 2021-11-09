<?php

namespace App\Database\Migrations\Submigrations;

use App\Database\BaseMigration;

class TableMigration extends BaseMigration {

    protected const TABLE = 'tables';
    protected $dataSchema = [
         'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
         'column'  =>  'VARCHAR(150) NOT NULL',
         'created_at' => 'DATETIME DEFAULT CURRENT_TIMESTAMP',
         'updated_at' => 'DATETIME'
    ];
    protected static $columns = [
         'id',
         'column',
         'created_at',
         'updated_at',
    ];

    protected static $validation = [
         'column'  =>  [
         'datatype' => 'STRING',
         'nullable' => 'false',
         'unique' => 'false'
         ]
   ];

}