<?php
declare(strict_types=1);


namespace App\Repository;


use App\Exceptions\DuplicadeCodeException;
use App\Models\Code;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


// classic repository class to deal with Code model
class CodeRepositoryImpl implements CodeRepository
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

        try {
            Code::Insert($codesToInsert);
        } catch (QueryException $exception) {
            if ($exception->getCode() === "23000") throw new DuplicadeCodeException("Codes was not generated try again later");
            else throw $exception;
        }

    }

    public function removeOrFail(array $codes): array
    {
        $codesFromDb = Code::select("code")->whereIn("code", $codes)->get()->toArray();

        if (count($codes) === count($codesFromDb)) {
            $this->remove($codes);
            return [];
        } else {
            $flattenArray = array_map(function ($code) {
                return $code["code"];
            }, $codesFromDb);

            // return duplicate codes
            return array_diff($codes, $flattenArray);
        }
    }


    private function remove(array $codes): void
    {
        Code::whereIn("code", $codes)->delete();
    }


    public function getAll(): LengthAwarePaginator
    {
        return Code::with("user")->paginate(10);
    }
}
