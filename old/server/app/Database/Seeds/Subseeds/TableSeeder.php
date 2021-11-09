<?php

namespace App\Database\Seeds\Subseeds;

use App\Database\IBaseSeeder;
use App\Models\Table;
use App\Database\Connection;

class TableSeeder implements IBaseSeeder {

    /**
     * @throws \App\Errors\DatabaseException
     */
    public function run()
    {
        $table = new Table(new Connection());
        $table->create([ ])->finish();
    }

}