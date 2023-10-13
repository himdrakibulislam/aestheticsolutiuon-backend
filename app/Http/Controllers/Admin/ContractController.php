<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{
    public function index()
    {
        $clients = Contract::all();
        return view("admin.client.index", ["clients" => $clients]);
    }
    public function contract(int $id)
    {
        $client = Contract::findOrFail($id);
        return view("admin.client.details", ["client" => $client]);
    }
    public function create(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'service_type' => 'required|string',
            'budget' => 'required|numeric',
            'description' => 'required|string',
            'es_time' => 'required|numeric',
        ]);
        if ($validators->fails()) {
            return response()->json([
                'errors' => $validators->messages(),
            ], 422);
        }
        $contract = Contract::create($request->all());
        return response()->json([
            'message' => 'Thank you for submitting.',
            'data' => $contract
        ], 200);
    }

    public function delete_client(int $id)
    {
        Contract::destroy($id);
        return redirect('admin/clients')->with('status', 'Contract removed');
    }
}
