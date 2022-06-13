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
   if(session()->has('USER_TEMP_ID') ===null){
       $rand = rand(11111111,99999999);
 session()->put('USER_TEMP_ID',$rand);
 return $rand;
   }else{
    return session()->has('USER_TEMP_ID');
   }
}


function cartCount(){
    if(session()->has('FRONT_USER_LOGIN')){
        $uid = session()->get('FRONT_USER_LOGIN');
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


?>
