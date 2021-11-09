<?php

namespace App\Database\Seeds\Subseeds;

use App\Database\IBaseSeeder;
use App\Models\X;
use App\Database\Connection;

class XSeeder implements IBaseSeeder {

    /**
     * @throws \App\Errors\DatabaseException
     */
    public function run()
    {
        $x = new X(new Connection());
        $x->create([ ])->finish();
    }

}