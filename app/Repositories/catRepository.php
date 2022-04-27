<?php

namespace App\Repositories;

use App\Models\cat;
use App\Repositories\BaseRepository;

/**
 * Class catRepository
 * @package App\Repositories
 * @version April 26, 2022, 5:25 am UTC
*/

class catRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return cat::class;
    }
}
