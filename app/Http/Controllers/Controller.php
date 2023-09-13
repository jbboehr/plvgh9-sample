<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function get(\Illuminate\Http\Request $request)
    {
        $x = $request->validate(['values.*' => 'required|integer'])['values'];
        \PHPStan\dumpType($x);
        $t = collect($x);

        $val = [1, '1'];
        \PHPStan\dumpType($val); // array<int|string, int|numeric-string>
        collect($val); // No errors
    }
}
