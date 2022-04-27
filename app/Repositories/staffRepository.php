<?php

namespace App\Repositories;

use App\Models\staff;
use App\Repositories\BaseRepository;

/**
 * Class staffRepository
 * @package App\Repositories
 * @version April 26, 2022, 8:13 am UTC
*/

class staffRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'avatar',
        'name',
        'tags',
        'brief',
        'intro',
        'photos'
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
        return staff::class;
    }
}
