<?php
declare(strict_types=1);

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CodeRepositoryInterface
{
    public function insert(array $codes): void;

    public function removeOrFail(array $codes): array;

    public function getAll(): LengthAwarePaginator;
}
