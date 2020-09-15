<?php

namespace App\Repositories\Models;

use App\Models\Models\Vacation;
use InfyOm\Generator\Common\BaseRepository;

class VacationRepository extends BaseRepository
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
        return Vacation::class;
    }
}
