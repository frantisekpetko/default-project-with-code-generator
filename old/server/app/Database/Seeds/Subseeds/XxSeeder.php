<?php

namespace App\Database\Seeds\Subseeds;

use App\Database\IBaseSeeder;
use App\Models\Xx;
use App\Database\Connection;

class XxSeeder implements IBaseSeeder {

    /**
     * @throws \App\Errors\DatabaseException
     */
    public function run()
    {
        $xx = new Xx(new Connection());
        $xx->create([ ])->finish();
    }

}