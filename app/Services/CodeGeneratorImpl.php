<?php
declare(strict_types=1);

namespace App\Services;

class CodeGeneratorImpl implements CodeGenerator
{
    public function generate(int $quantity): array
    {
        $codes = [];
        for ($i = 0; $i < $quantity; $i++) {
            $code = "";
            for ($j = 0; $j < 10; $j++) {
                $random = (string)rand(0, 9);
                $code .= $random;
            }
            if (!in_array($code, $codes)) {
                $codes[] = $code;
            }
        }
        return $codes;
    }

    public function parse(string $input): array
    {
        $codes = preg_split("/(,|,\n|,\r\n|\n|\r\n)/", $input);
        for ($i = 0; $i < count($codes); $i++) {
            if ($codes[$i] === "") unset($codes[$i]);
        }
        return $codes;
    }
}
