<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Vacation extends Model
{
    use SoftDeletes;

    public $table = 'vacations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'item',
        'x'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
