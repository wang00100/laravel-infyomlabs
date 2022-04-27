<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="staff",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="avatar",
 *          description="avatar",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tags",
 *          description="tags",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="brief",
 *          description="brief",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="intro",
 *          description="intro",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="photos",
 *          description="photos",
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
class staff extends Model
{
    use SoftDeletes;


    public $table = 'staff';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'avatar',
        'name',
        'intro'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'avatar' => 'string',
        'name' => 'string',
        'tags' => 'string',
        'brief' => 'string',
        'intro' => 'string',
        'photos' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
