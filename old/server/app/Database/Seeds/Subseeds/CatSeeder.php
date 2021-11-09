<?php

namespace App\Database\Seeds\Subseeds;

use App\Database\IBaseSeeder;
use App\Models\Cat;
use App\Database\Connection;

class CatSeeder implements IBaseSeeder {

    /**
     * @throws \App\Errors\DatabaseException
     */
    public function run()
    {
        $cat = new Cat(new Connection());
        $cat->create([ ])->finish();
    }

}