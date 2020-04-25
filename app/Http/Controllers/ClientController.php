<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;

use App\Client;
class ClientController extends Controller
{
     
    public function getIndex(){
        return view('clients.index');
    }
    public function index(){
         $clients =  Client::all();
         return response()->json(['clients'=>$clients]);
    }


    public function store(CreateClientRequest $request,Client $client)
    {
        $client->create($request->all());
        return response()->json($client);
    }

    
    public function update(UpdateClientRequest $request,Client $client)
    {
        $client->update($request->all());
        return response()->json($client);
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return response()->json(['menssage'=>'registro eliminado Exitosamente']);
    }
}
