<?php
namespace App\Http\Controllers\Requests\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateCompanyRequest extends Controller
{
    public function __construct(Request $request)
    {
        $this->validate(
            $request, [
                'title' => 'required|string',
                'description' => 'required|string',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
            ]
        );
        parent::__construct($request);
    }
}
