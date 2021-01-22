<?php
namespace App\Http\Controllers\Requests\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateUserRequest extends Controller
{
    public function __construct(Request $request)
    {
        $this->validate(
            $request, [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5'
            ]
        );
        parent::__construct($request);
    }
}
