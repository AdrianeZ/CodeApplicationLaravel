<?php
declare(strict_types=1);


namespace App\Services;


interface CodeService
{
    public function generate(int $quantity): array;
    public function parse(string $input): array;
}
