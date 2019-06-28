<?php

namespace App\Repositories;

use App\Models\Agents;
use App\Repositories\BaseRepository;

/**
 * Class AgentsRepository
 * @package App\Repositories
 * @version June 27, 2019, 8:47 am UTC
*/

class AgentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'district',
        'admin',
        'signature'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Agents::class;
    }
}
