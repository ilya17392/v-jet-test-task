<?php
namespace App\Http\Controllers\Requests\Password;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdatePasswordRequest extends Controller
{
    public function __construct(Request $request)
    {
        $this->validate(
            $request, [
                'email' => 'required|email',
                'password' => 'required|min:5'
            ]
        );
        parent::__construct($request);
    }
}
