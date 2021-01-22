<?php
namespace App\Http\Controllers\Requests\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecoverPasswordRequest extends Controller
{
    public function __construct(Request $request)
    {
        $this->validate(
            $request, [
                'email' => 'required|email',
            ]
        );
        parent::__construct($request);
    }
}
