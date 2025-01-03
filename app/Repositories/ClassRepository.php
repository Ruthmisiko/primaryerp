<?php

namespace App\Repositories;

use App\Models\Class;
use App\Repositories\BaseRepository;

class ClassRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Classs::class;
    }
}
