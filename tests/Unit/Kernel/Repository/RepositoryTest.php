<?php

namespace Tests\Unit\Kernel\Repository;

use Elephant\Boundary\Particular\SpecialModel;
use Elephant\Query\Contacts\Queryable;
use Elephant\Repositories\Repository;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Kernel\BootStrap;

final class RepositoryTest extends TestCase
{

    #[DataProvider('getExampleRepository')]
    public function testRepositoryQueryableModelMethodReturnSpecialModelInstance(ExampleRepository $repository): void
    {
        $this->assertInstanceOf(SpecialModel::class,$repository->getQuery()->model());
    }

    #[DataProvider('getExampleRepository')]
    public function testQueryInstanceOfQueryable(ExampleRepository $repository): void
    {
        $this->assertInstanceOf(Queryable::class, $repository->getQuery(), get_parent_class($repository->getQuery()));
    }

    #[DataProvider('getExampleRepository')]
    public function testExampleInstanceOfAbstractRepository(ExampleRepository $repository): void
    {
        $this->assertInstanceOf(Repository::class, $repository, get_parent_class($repository));
    }

    public static function getExampleRepository(): array
    {
        BootStrap::boot();
        return [
            [BootStrap::app()->make(ExampleRepository::class)],
        ];
    }
}