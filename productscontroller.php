<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use Illuminate\Support\Facades\Validator;

class productscontroller extends Controller
{
    public function show()
    {
        return products::all();
    }
    public function store(Request $request)
{
$validator=Validator::make($request->all(),
[
    'nama_products' => 'required',
    'deskripsi' => 'required',
    'harga' => 'required'
]
);
if($validator->fails()) {
return Response()->json($validator->errors());
}
$simpan = products::create([
    'nama_products' => $request->nama_products,
    'deskripsi' => $request->deskripsi,
    'harga' => $request->harga
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
         'nama_products'=>'required',
         'deskripsi'=>'required',
         'harga'=>'required'
     ]
     );
     if($validator->fails()){
         return Response()->json($validator->errors());
     }
     
     $ubah = products::where('id_products', $id)->update([
         'nama_products'=>$request->nama_products,
         'deskripsi'=>$request->deskripsi,
         'harga'=>$request->harga
     ]);

     if($ubah){
         return Response()->json(['status' => 1]);
     }
     else{
         return Response()->json(['status' => 0]);
     }
 }   
}

