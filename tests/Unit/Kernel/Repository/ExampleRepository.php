<?php

namespace Tests\Unit\Kernel\Repository;

use Elephant\Query\Contacts\Queryable;
use Elephant\Repositories\Repository;

readonly class ExampleRepository extends Repository
{
    public function getQuery():Queryable
    {
        return $this->queryable;
    }
}