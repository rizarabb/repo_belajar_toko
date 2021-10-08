<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orders;
use Illuminate\Support\Facades\Validator;

class orderscontroller extends Controller
{
    public function show()
    {
        $data_orders = orders::join('costumers','costumers.id_costumers','orders.id_costumers')->get();

        $data_orders = orders::join('products','products.id_products','orders.id_products')->get();
     
        return response()->json($data_orders);

    }
    public function detail()
    {
        if(orders::where('id',$id)->exist())
        {

            $data_orders = orders::join('costumers','costumers.id_costumers','orders.id_costumers')
                                                                    ->where('orders.id','id',$id)
                                                                    ->get();

            $data_orders = orders::join('products','products.id_products','orders.id_products')
                                                                    ->where('orders.id','id',$id)
                                                                    ->get();                                                                    
        }
    }
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
public function update($id, request $request)
 {
     $validator=Validator::make($request->all(),
     [
        'id_products'=>'required', 
        'id_costumers'=>'required',
         'tgl_orders'=>'required'
     ]
     );
     if($validator->fails()){
         return Response()->json($validator->errors());
     }
     
     $ubah = orders::where('id_orders', $id)->update([
         'id_products'=>$request->id_products,
         'id_costumers'=>$request->id_costumers,
         'tgl_orders'=>$request->tgl_orders
     ]);

     if($ubah){
         return Response()->json(['status' => 1]);
     }
     else{
         return Response()->json(['status' => 0]);
     }
 }
}
