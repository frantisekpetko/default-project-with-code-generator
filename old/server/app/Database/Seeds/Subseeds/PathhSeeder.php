<?php

namespace App\Database\Seeds\Subseeds;

use App\Database\IBaseSeeder;
use App\Models\Pathh;
use App\Database\Connection;

class PathhSeeder implements IBaseSeeder {

    /**
     * @throws \App\Errors\DatabaseException
     */
    public function run()
    {
        $pathh = new Pathh(new Connection());
        $pathh->create([ ])->finish();
    }

}