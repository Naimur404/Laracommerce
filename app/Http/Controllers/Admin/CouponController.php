<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Coupon::all();
       return view('admin.coupon',$result);
    }

    public function manage_coupon(Request $request, $id=''){
if($id>0){

          $arr = Coupon::where(['id'=>$id])->get();
          $result['title'] = $arr['0']->title;
          $result['code'] = $arr['0']->code;
          $result['value'] = $arr['0']->value;
          $result['type'] = $arr['0']->type;
          $result['min_order'] = $arr['0']->min_order;
          $result['is_one_time'] = $arr['0']->is_one_time;
          $result['id'] = $arr['0']->id;


}else{

$result['title'] = '';
$result['code'] = '';
$result['value'] = '';
$result['type'] = '';
$result['min_order'] = '';
$result['is_one_time'] = '';
$result['id'] = 0;

}

        return view('admin.manage_coupon',$result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)

    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        session()->flash('message','Coupon Deleted Sucessfully');
        return redirect()->route('admin.coupon');

    }
    public function status(Request $request,$status)

    {
        $coupon = Coupon::find($request->id);
        $coupon->status= $status;
        $coupon->save();
        session()->flash('message','Coupon Status Updated Sucessfully');
        return redirect('admin/coupon');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_coupon_process(Request $request)
    {
     $request->validate([
'title' => 'required',
'code' => 'required|unique:coupons,code,'.$request->post('id'),
'value' => 'required',
]);

if($request->post('id')>0){
    $coupon = Coupon::find($request->post('id'));
    $msg = "Coupon Update Sucessfully";

}else{
    $coupon = new Coupon();
    $msg = "Coupon Added Sucessfully";
    $coupon->status = 1;
}

$coupon->title = $request->post('title');
$coupon->code = $request->post('code');
$coupon->value = $request->post('value');
$coupon->type = $request->post('type');
$coupon->min_order = $request->post('min_order');
$coupon->is_one_time = $request->post('is_one_time');

$coupon->save();
$request->session()->flash('message',$msg);

return redirect('admin/coupon');






    }
}
