<?php

namespace Elephant\Contacts\Repository;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as rawQuery;
use Illuminate\Database\Eloquent\Model;

interface Queryable
{
    public function query(): rawQuery;

    public function builder(): Builder;

    public function table(): string;

    public function model(): Model;
}