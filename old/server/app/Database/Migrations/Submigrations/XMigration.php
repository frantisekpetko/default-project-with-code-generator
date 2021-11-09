<?php

namespace App\Database\Migrations\Submigrations;

use App\Database\BaseMigration;

class XMigration extends BaseMigration {

    protected const TABLE = 'xs';
    protected $dataSchema = [
         'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
         'xxx'  =>  'VARCHAR(150) NOT NULL',
         'created_at' => 'DATETIME DEFAULT CURRENT_TIMESTAMP',
         'updated_at' => 'DATETIME'
    ];
    protected static $columns = [
         'id',
         'xxx',
         'created_at',
         'updated_at',
    ];

    protected static $validation = [
         'xxx'  =>  [
         'datatype' => 'STRING',
         'nullable' => 'false',
         'unique' => 'false'
         ]
   ];

}