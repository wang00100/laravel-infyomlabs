<?php

namespace App\DataTables;

use App\Models\staff;

/**
 * Class staffDataTable
 */
class staffDataTable
{
    /**
     * @return staff
     */
    public function get()
    {
        /** @var staff $query */
        $query = staff::query()->select('staff.*');

        return $query;
    }
}
