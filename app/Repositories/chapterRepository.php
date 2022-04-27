<?php

namespace App\Repositories;

use App\Models\chapter;
use App\Repositories\BaseRepository;

/**
 * Class chapterRepository
 * @package App\Repositories
 * @version April 27, 2022, 1:02 am UTC
*/

class chapterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'title',
        'cover',
        'staffs',
        'media',
        'cats',
        'tags',
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
        return chapter::class;
    }
}
