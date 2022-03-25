<?php
declare(strict_types=1);


namespace App\Repository;


use App\Models\Code;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CodeRepository implements CodeRepositoryInterface
{
    public function insert(array $codes): void
    {
        $userId = Auth::id();
        $codesToInsert = [];
        for ($i = 0; $i < count($codes); $i++) {
            $codesToInsert[] = [
                "code" => $codes[$i],
                "created_at" => Carbon::now(),
                "user_id" => $userId
            ];
        }
        Code::Insert($codesToInsert);
    }

    public function removeOrFail(array $codes): array
    {
        $codesFromDb = Code::select("code")->whereIn("code", $codes)->get()->toArray();

        if (count($codes) === count($codesFromDb)) {
            $this->remove($codes);
            return [];
        } else {
            $c = array_map(function ($code) {
                return $code["code"];
            }, $codesFromDb);

            return array_diff($codes, $c);
        }
    }


    private function remove(array $codes): void
    {
        Code::whereIn("code", $codes)->delete();
    }
}
