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
 * @property string well_wisher
 * @property string received_on
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
        'well_wisher',
        'received_on'
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
        'well_wisher' => 'required',
        'received_on' => 'required'
    ];

    
}
