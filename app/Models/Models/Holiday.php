<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;



class Holiday extends Model
{

    public $table = 'Holidays';
    


    public $fillable = [
        'date',
        'name',
        'email',
        'fieild',
        'select'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'fieild' => 'integer',
        'select' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required|date',
        'name' => 'required',
        'email' => 'required|email',
        'fieild' => 'required|integer',
        'select' => 'required'
    ];
}
