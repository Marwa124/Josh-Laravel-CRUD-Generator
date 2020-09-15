<?php

namespace App\Repositories\Models;

use App\Models\Models\Holiday;
use InfyOm\Generator\Common\BaseRepository;

class HolidayRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Holiday::class;
    }
}
