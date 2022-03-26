<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\DuplicadeCodeException;
use App\Repository\CodeRepository;
use App\Repository\CodeRepositoryImpl;
use App\Rules\CodeQuantity;
use App\Rules\CodesRegExp;
use App\Services\CodeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CodesController extends Controller
{

    private CodeService $codeGenerator;
    private CodeRepository $codeRepository;

    // dependency injection from service container
    public function __construct(CodeService $codeGenerator, CodeRepositoryImpl $codeRepository)
    {
        $this->codeGenerator = $codeGenerator;
        $this->codeRepository = $codeRepository;
    }

    public function list(): View
    {
        $codes = $this->codeRepository->getAll();
        return view("codes.list", ["codes" => $codes]);
    }

    public function create(Request $request): RedirectResponse
    {
        //validation
        $request->validate(["quantity" => ["required", new CodeQuantity]]);

        $quantity = $this->codeGenerator->generate((int)$request->input("quantity"));

        try {
            $this->codeRepository->insert($quantity);
        } catch (DuplicadeCodeException $exception) {
            return redirect()->route('your_codes')->with(["error" => "Codes was not generated try again later"]);
        }

        return redirect()->route('your_codes')->with(["success" => "The codes was generated successfully"]);
    }

    public function delete(Request $request): RedirectResponse
    {
        //validation using regexp
        $request->validate(["codes" => ["required", new CodesRegExp]]);

        $codes = $this->codeGenerator->parse($request->input("codes"));
        $invalidCodes = $this->codeRepository->removeOrFail($codes);

        if (!empty($invalidCodes)) {
            return back()->with(["invalidcodes" => $invalidCodes]);
        }

        return redirect()->route('your_codes');
    }

    public function renderCreateForm(): View
    {
        return view("codes.create");
    }

    public function renderDeleteForm(): View
    {
        return view("codes.delete");
    }

}
