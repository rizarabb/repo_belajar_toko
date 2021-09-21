<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orders;
use Illuminate\Support\Facades\Validator;

class orderscontroller extends Controller
{
    public function store(Request $request)
{
$validator=Validator::make($request->all(),
[
    'id_products' => 'required',
    'id_costumers' => 'required',
    'tgl_orders' => 'required'
]
);
if($validator->fails()) {
return Response()->json($validator->errors());
}
$simpan = orders::create([
    'id_products' => $request->id_products,
    'id_costumers' => $request->id_costumers,
    'tgl_orders' => $request->tgl_orders
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
