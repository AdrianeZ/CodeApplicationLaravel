<?php
declare(strict_types=1);


namespace App\Repository;


interface CodeRepositoryInterface
{
    public function insert(array $codes):void;
    public function removeOrFail(array $codes): array;
}
