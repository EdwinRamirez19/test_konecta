<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $table = 'clients';
    



    public $fillable = [
        'name',
        'identification',
        'mail',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'identification' => 'string',
        'mail' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string',
        'identification' => 'required|numeric',
        'mail' => 'required|email|unique:clients',
        'address' => 'required'
    ];

}
