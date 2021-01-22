<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\Company\CreateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;



class CompaniesController extends Controller
{
    public function __construct(Request $request)
    {

    }

    //get user's companies
    public function index() {
        try {

            $user = \Auth::user();

            return response()->json([
                'success' => true,
                'data' => $user->companies
            ], 201);

        }
        catch (\Exception $e)
        {
            return response()->json([
                'error' => 'Something went wrong when trying to show companies list, please try again later.',
            ], 500);
        }
    }

    //create company assign to user
    public function store(CreateCompanyRequest $request) {
        try {
            $user = \Auth::user();

            $data = $request->getParams()->toArray();
            $data['user_id'] = $user->id;

            $company = Company::create($data);

            return response()->json([
                'success' => true,
                'data' => $company
            ], 201);

        }
        catch (\Exception $e)
        {
            return response()->json([
                'error' => 'Something went wrong when trying to store new company, please try again later.',
            ], 500);
        }
    }
}
