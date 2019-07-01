<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Treasury
 * @package App\Models
 * @version June 27, 2019, 10:29 am UTC
 *
 * @property float amount
 * @property string well-wisher
 * @property string received-on
 */
class Treasury extends Model
{
    use SoftDeletes;

    public $table = 'treasury';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'amount',
        'well-wisher',
        'received-on'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'amount' => 'float',
        'well-wisher' => 'string',
        'received-on' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'amount' => 'required',
        'well-wisher' => 'required',
        'received-on' => 'required'
    ];

    
}
