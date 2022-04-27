<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="chapter",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cover",
 *          description="cover",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="public_time",
 *          description="public_time",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="staffs",
 *          description="staffs",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="media",
 *          description="media",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cats",
 *          description="cats",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tags",
 *          description="tags",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="content",
 *          description="content",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class chapter extends Model
{
    use SoftDeletes;


    public $table = 'chapters';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'cover',
        'staffs',
        'media',
        'cats',
        'tags',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'cover' => 'string',
        'staffs' => 'string',
        'media' => 'string',
        'cats' => 'string',
        'tags' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
