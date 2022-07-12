<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
   public function index(Request $request){
    $result['orders'] = DB::table('orders')
    ->select('orders.*','orders_status.orders_status')
    ->leftJoin('orders_status','orders_status.id','=','order_status')
    ->get();
  return view('admin.order',$result);
   }
   public function order_details(Request $request, $id){

    $result['orders_details'] = DB::table('orders_details')
    ->select('orders.*','orders_status.orders_status','orders_details.price','orders_details.qty','products.pname','products.image','sizes.size','colors.color')
    ->leftJoin('orders','orders.id','=','orders_details.orders_id')
    ->leftJoin('product_arts','product_arts.id','=','orders_details.products_attr_id')
    ->leftJoin('products','products.id','=','orders_details.product_id')
    ->leftJoin('sizes', 'sizes.id', '=', 'product_arts.size_id')->leftJoin('colors', 'colors.id', '=', 'product_arts.color_id')
    ->leftJoin('orders_status','orders_status.id','=','order_status')
    ->where(['orders_details.orders_id' =>$id])->get();
    $result['payment_status'] = ['Pending','Success','Failed'];
    $result['orders_status'] = DB::table('orders_status')->get();
     return view('admin.order_details',$result);
   }
   public function update_payment_status($status,$id){
    if($status!=null){
        DB::table('orders')
        ->where(['id'=>$id])
        ->update(['payment_status'=>$status]);
    }
    return back();

   }
   public function update_order_status($status,$id){
    if($status!=null){
        DB::table('orders')
        ->where(['id'=>$id])
        ->update(['order_status'=>$status]);
    }
    return back();

   }
   public function update_track_details(Request $request,$id){
      DB::table('orders')->where(['id'=>$id])
      ->update(['track_details'=>$request->post('track_details')]);
      return back();
   }

}
