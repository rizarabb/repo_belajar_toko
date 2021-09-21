<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\costumers;
use Illuminate\Support\Facades\Validator;

class costumerscontroller extends Controller
{
    public function store(Request $request)
{
    $validator=Validator::make($request->all(),
[
    'nama_costumers' => 'required',
    'username' => 'required',
    'password' => 'required',
    'alamat' => 'required',
    'no_telp' => 'required'
]
);
if($validator->fails()) {
return Response()->json($validator->errors());
}
$simpan = costumers::create([
    'nama_costumers' => $request->nama_costumers,
    'username' => $request->username,
    'password' => $request->password,
    'alamat' => $request->alamat,
    'no_telp' => $request->no_telp
]);
if($simpan) {
return Response()->json(['status'=>1]);
}
else {
return Response()->json(['status'=>0]);
}
}
    //
}
