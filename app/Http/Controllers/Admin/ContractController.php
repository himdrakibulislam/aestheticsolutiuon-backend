<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Traits\NotifyToAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{
    use NotifyToAdmin;
    public function index()
    {
        $clients = Contract::orderBy('id','DESC')->get();
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
        $this->sendNotification('contract',$request->name.'  sent a contract',[
            'id' => $contract->id,
            'name' => $request->name,
            'email' => $request->email,
        ]);
      
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
