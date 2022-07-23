<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


function getTopNavCat(){
    $result = DB::table('categories')->where(['status' =>1])->get();
    $arr=[];
    foreach($result as $row){
        $arr[$row->id]['name'] = $row->name;
        $arr[$row->id]['parent_category_id'] = $row->parent_category_id;
        $arr[$row->id]['slug'] = $row->slug;

    }
    $str=buildTreeView($arr,0);
    return $str;

}
$html='';
function buildTreeView($arr,$parent,$level=0,$preLevel=-1){
         global $html;
    foreach($arr as $id=>$data){
        if($parent==$data['parent_category_id']){
            if($level>$preLevel){
                if($html==''){
                    $html.='<ul class="nav navbar-nav"><li><a href="/">Home</a></li>';
                }else{
                    $html.='<ul class="dropdown-menu">';
                }

            }
            if($level==$preLevel){
                $html.='</li>';
            }
            $html.='<li><a href="/category/'.$data['slug'].'">'.$data['name'].'<span class="caret"></span></a>';
            if($level>$preLevel){
                $preLevel=$level;
            }
            $level++;
            buildTreeView($arr,$id,$level,$preLevel);
            $level--;
        }
    }
    if($level==$preLevel){
        $html.='</li></ul>';
    }
    return $html;
}
function getUserTempId(){
   if(!session()->has('USER_TEMP_ID')){
       $rand = rand(11111111,99999999);
 session()->put('USER_TEMP_ID',$rand);
 return $rand;
   }else{
    return session()->get('USER_TEMP_ID');
   }
}


function cartCount(){
    if(session()->has('USER_ID')){
        $uid = session()->get('USER_ID');
        $user_type = "Reg";
     }else{
         $uid = getUserTempId();
         $user_type = "Not-Reg";
     }
     $result =  DB::table('cart')->leftJoin('products','products.id','=','cart.product_id')->leftJoin('product_arts','product_arts.id','=','cart.product_attr_id')->leftJoin('sizes','sizes.id','=','product_arts.size_id')->leftJoin('colors','colors.id','=','product_arts.color_id')
    ->where(['user_id'=> $uid])
    ->where(['user_type'=>$user_type])
    ->select('cart.qty','products.pname','products.image','products.pslug','sizes.size','colors.color','product_arts.price','products.id as pid','product_arts.id as attr_id')
    -> get();

 return $result;
}
function apply_coupon_code($coupon_code){
    $totalprice = 0;
    $result = DB::table('coupons')->where(['code' => $coupon_code])->get();
    //check this request coupon code exist or not
    if (isset($result[0])) {
        $value = $result[0]->value;
        $type = $result[0]->type;
        if ($result[0]->status == 1) {
            if ($result[0]->is_one_time == 1) {
                $status = "error";
                $msg = "Coupon Code Already Used";
            } else {
                $min_order_amount = $result[0]->min_order;
                if ($min_order_amount > 0) {
                    $totalAddtoCartItem = cartCount();
                    $totalprice = 0;
                    foreach ($totalAddtoCartItem as $list) {
                        $totalprice = $totalprice + ($list->qty * $list->price);
                    }
                    if ($min_order_amount < $totalprice) {
                        $status = "sucess";
                        $msg = "Coupon Code Applied";
                    } else {
                        $status = "error";
                        $msg = "Cart Ammount Must be Greater Then $min_order_amount";
                    }
                } else {
                    $status = "sucess";
                    $msg = "Coupon Code Applied1";
                }
            }
        } else {
            $status = "error";
            $msg = "Coupon Code Deactive";
        }
    } else {
        $status = "error";
        $msg = "Please Enter Valid Coupon Code";
    }
    //check status is sucess or not if sucess then apply the coupon code
    $coupon_code_value =0;
    if ($status == 'sucess') {

        if ($type == 'Value') {
            $coupon_code_value = $value;
            $totalprice = $totalprice - $value;
        } else {

            $newprice = ($value / 100) * $totalprice;
            $totalprice = round($totalprice - $newprice);
            $coupon_code_value = $newprice;
        }
    }



    return json_encode(['status' => $status, 'msg' => $msg, 'totalprice' => $totalprice, 'coupon_code_value' =>$coupon_code_value]);
}
function getCustomDate($date){
if($date!=''){
   $date = strtotime($date);
   return date('d-M Y',$date);
}
}
function getAvaliableQty($product_id,$attr_id){
    $result =  DB::table('product_arts')


    ->where(['product_arts.product_id'=> $product_id])
    ->where(['product_arts.id'=> $attr_id])
    ->select('product_arts.qty')
    ->get();

    return $result;
}
function updateAvaliableQty($order_id){
    $result =  DB::table('order_details')
    ->leftJoin('product_arts' ,'product_arts.id','=','order_details.products_attr_id')


    ->where(['order_details.orders_id'=> $order_id])
    ->where('order_details.id','=', 'order_details.product_id')
    ->where('order_details.id','=', 'order_details.products_attr_id')
    ->select('product_arts.qty as pqty','product_arts.qty')
    ->get();

    return $result;
}
