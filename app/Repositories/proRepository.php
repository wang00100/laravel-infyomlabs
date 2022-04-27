<?php

namespace App\Repositories;

use App\Models\pro;
use App\Repositories\BaseRepository;

/**
 * Class proRepository
 * @package App\Repositories
 * @version April 27, 2022, 3:41 am UTC
*/

class proRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'title',
        'price',
        'cover',
        'chapters',
        'content'
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
        return pro::class;
    }
}
