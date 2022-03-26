<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Code;
use App\Repository\CodeRepositoryInterface;
use App\Rules\CodeQuantity;
use App\Rules\CodesRegExp;
use App\Services\CodeGenerator;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CodesController extends Controller
{

    private CodeGenerator $codeGenerator;
    private CodeRepositoryInterface $codeRepository;

    public function __construct(CodeGenerator $codeGenerator, CodeRepositoryInterface $codeRepository)
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
        $request->validate(["quantity" => ["required", new CodeQuantity]]);
        $quantity = $this->codeGenerator->generate((int)$request->input("quantity"));
        $this->codeRepository->insert($quantity);
        return redirect()->route('your_codes')->with(["success" => "The codes was generated successfully"]);
    }

    public function delete(Request $request): RedirectResponse
    {
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
