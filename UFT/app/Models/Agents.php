<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agents
 * @package App\Models
 * @version June 27, 2019, 8:47 am UTC
 *
 * @property string name
 * @property string district
 * @property string admin
 * @property string signature
 */
class Agents extends Model
{
    use SoftDeletes;

    public $table = 'agent';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'district',
        'admin',
        'signature'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'district' => 'string',
        'admin' => 'string',
        'signature' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'district' => 'required',
        'admin' => 'required',
        'signature' => 'required'
    ];

    
}