<?php
namespace App\Http\Controllers\Requests\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginUserRequest extends Controller
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
