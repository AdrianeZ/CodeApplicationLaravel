<?php
declare(strict_types=1);

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;


//Generic interface to deal with Code model
interface CodeRepository
{
    public function insert(array $codes): void;

    public function removeOrFail(array $codes): array;

    public function getAll(): LengthAwarePaginator;
}
