<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\costumers;
use Illuminate\Support\Facades\Validator;

class costumerscontroller extends Controller
{
    public function show()
    {
        return costumers::all();
    }
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
public function update($id, request $request)
 {
     $validator=Validator::make($request->all(),
     [
        'nama_costumers'=>'required', 
        'username'=>'required',
        'password'=>'required',
        'alamat'=>'required',
        'no_telp'=>'required'
     ]
     );
     if($validator->fails()){
         return Response()->json($validator->errors());
     }
     
     $ubah = costumers::where('id_costumers', $id)->update([
         'nama_costumers'=>$request->nama_costumers,
         'username'=>$request->username,
         'password'=>$request->password,
         'alamat'=>$request->alamat,
         'no_telp'=>$request->no_telp
     ]);

     if($ubah){
         return Response()->json(['status' => 1]);
     }
     else{
         return Response()->json(['status' => 0]);
     }
 }
 public function destroy($id)
 {
    $hapus = costumers::where('id_costumers', $id)->delete();
    if($hapus){
        return response()->json ([ 'status' => 1]);
    }
    else{
        return response()->json (['status' => 0]);
    }

 } 
}
