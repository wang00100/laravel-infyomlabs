<?php

namespace App\Repositories;

use App\Models\tag;
use App\Repositories\BaseRepository;

/**
 * Class tagRepository
 * @package App\Repositories
 * @version April 26, 2022, 5:41 am UTC
*/

class tagRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
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
        return tag::class;
    }
}
