<?php

namespace App\Database\Seeds\Subseeds;

use App\Database\IBaseSeeder;
use App\Models\XXX;
use App\Database\Connection;

class XXXSeeder implements IBaseSeeder {

    /**
     * @throws \App\Errors\DatabaseException
     */
    public function run()
    {
        $xx_x = new XXX(new Connection());
        $xx_x->create([ ])->finish();
    }

}