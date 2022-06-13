<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $result['home_category'] = DB::table('categories')->where(['status' =>1])->where(['is_home' =>1])->get();

        $result['home_brand'] = DB::table('brands')->where(['status' =>1])->where(['is_home' =>1])->get();
        $result['home_banner'] = DB::table('banners')->where(['status' =>1])->get();


        foreach($result['home_category'] as $list){
            $result['home_category_product'][$list->id] = DB::table('products')->where(['status'=>1])->where(['category_id'=>$list->id])->get();
            foreach($result['home_category_product'][$list->id] as $list1){
                $result['home_product_attr'][$list1->id] = DB::table('product_arts')->leftJoin('sizes','sizes.id','=','size_id')->leftJoin('colors','colors.id','=','color_id')->where(['product_arts.product_id'=>$list1->id]) ->get();
            }
        }

        $result['home_featured_product'][$list->id] = DB::table('products')->where(['status'=>1])->where(['is_featured'=>1])->get();
        foreach($result['home_featured_product'][$list->id] as $list1){
            $result['home_featured_product_attr'][$list1->id] = DB::table('product_arts')->leftJoin('sizes','sizes.id','=','size_id')->leftJoin('colors','colors.id','=','color_id')->where(['product_arts.product_id'=>$list1->id]) ->get();
        }

        $result['home_tranding_product'][$list->id] = DB::table('products')->where(['status'=>1])->where(['is_tranding'=>1])->get();
        foreach($result['home_tranding_product'][$list->id] as $list1){
            $result['home_tranding_product_attr'][$list1->id] = DB::table('product_arts')->leftJoin('sizes','sizes.id','=','size_id')->leftJoin('colors','colors.id','=','color_id')->where(['product_arts.product_id'=>$list1->id]) ->get();
        }
        $result['home_discounted_product'][$list->id] = DB::table('products')->where(['status'=>1])->where(['is_discounted'=>1])->get();
        foreach($result['home_discounted_product'][$list->id] as $list1){
            $result['home_discounted_product_attr'][$list1->id] = DB::table('product_arts')->leftJoin('sizes','sizes.id','=','size_id')->leftJoin('colors','colors.id','=','color_id')->where(['product_arts.product_id'=>$list1->id]) ->get();
        }
        // echo "<pre>";
        // print_r($result['home_discounted_product'][$list->id]);
        // die();

       return view('frontend.index',$result);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product($slug)
    {
        $result['product'] = DB::table('products')->where(['pslug'=>$slug])->where(['status'=>1])-> get();
        foreach($result['product'] as $list1){
            $result['product_attr'][$list1->id] = DB::table('product_arts')->leftJoin('sizes','sizes.id','=','size_id')->leftJoin('colors','colors.id','=','color_id')->where(['product_arts.product_id'=>$list1->id]) ->get();
        }
        foreach($result['product'] as $list1){
            $result['product_images'][$list1->id] = DB::table('product_imgs')->where(['product_imgs.product_id'=>$list1->id]) ->get();
        }
        //for related product basis on related category
        $result['related_product'] = DB::table('products')->where(['status'=>1])->where('pslug','!=',$slug)->where(['category_id'=>$result['product'][0]->category_id])->get();

        foreach($result['related_product'] as $list1){
            $result['related_product_attr'][$list1->id] = DB::table('product_arts')->leftJoin('sizes','sizes.id','=','size_id')->leftJoin('colors','colors.id','=','color_id')->where(['product_arts.product_id'=>$list1->id]) ->get();
        }
        return view('frontend.product',$result);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function add_to_cart(Request $request){
        if($request->session()->has('FRONT_USER_LOGIN')){
           $uid = $request->session()->get('FRONT_USER_LOGIN');
           $user_type = "Reg";
        }else{
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }

        $size_id = $request->post('size_id');
        $color_id = $request->post('color_id');
        $proudct_id = $request->post('product_id');
        $pqty = $request->post('pqty');

        $result = DB::table('product_arts')->select('product_arts.id')
        ->leftJoin('sizes','sizes.id','=','product_arts.size_id')->leftJoin('colors','colors.id','=','product_arts.color_id')->where(['product_id'=>$proudct_id])->where(['sizes.size'=>$size_id])->where(['colors.color'=>$color_id]) ->get();
        $product_attr_id = $result[0]->id;

        $check =  DB::table('cart')
        ->where(['user_id'=> $uid])
        ->where(['user_type'=>$user_type])
        ->where(['product_id'=>$proudct_id])

        ->where(['product_attr_id'=>$product_attr_id])
        -> get();
        if(isset($check[0])){

           $update_id = $check[0]->id;
           if($pqty==0){
            DB::table('cart')
            ->where(['id'=> $update_id])
            ->delete();
            $msg = "Remove";
        }else{
            DB::table('cart')
            ->where(['id'=> $update_id])
            ->update(['qty'=>$pqty]);
            $msg = "Updated";
        }



        }else{
          $id=  DB::table('cart')->insertGetId([
            'user_id'=> $uid,
            'user_type'=>$user_type,
            'product_id'=>$proudct_id,
            'product_attr_id'=>$product_attr_id,
            'qty'=>$pqty,
            'added_on'=>date('y-m-d h:i:s')
            ]);
            $msg = "added";
        }
        $result =  DB::table('cart')->leftJoin('products','products.id','=','cart.product_id')->leftJoin('product_arts','product_arts.id','=','cart.product_attr_id')->leftJoin('sizes','sizes.id','=','product_arts.size_id')->leftJoin('colors','colors.id','=','product_arts.color_id')
        ->where(['user_id'=> $uid])
        ->where(['user_type'=>$user_type])
        ->select('cart.qty','products.pname','products.image','products.pslug','sizes.size','colors.color','product_arts.price','products.id as pid','product_arts.id as attr_id')
        -> get();
       return response()->json(['msg'=>$msg,'data'=>$result,'totalitems'=> count($result)]);
    }
  public  function cart(Request $request){

    if($request->session()->has('FRONT_USER_LOGIN')){
        $uid = $request->session()->get('FRONT_USER_LOGIN');
        $user_type = "Reg";
     }else{
         $uid = getUserTempId();
         $user_type = "Not-Reg";
     }
    $result['list'] =  DB::table('cart')->leftJoin('products','products.id','=','cart.product_id')->leftJoin('product_arts','product_arts.id','=','cart.product_attr_id')->leftJoin('sizes','sizes.id','=','product_arts.size_id')->leftJoin('colors','colors.id','=','product_arts.color_id')
    ->where(['user_id'=> $uid])
    ->where(['user_type'=>$user_type])
    ->select('cart.qty','products.pname','products.image','products.pslug','sizes.size','colors.color','product_arts.price','products.id as pid','product_arts.id as attr_id')
    -> get();


    // $result = DB::table('product_arts')->select('product_arts.id')
    // ->leftJoin('sizes','sizes.id','=','size_id')->leftJoin('colors','colors.id','=','color_id')->where(['product_id'=>$proudct_id])->where(['sizes.size'=>$size_id])->where(['colors.color'=>$color_id]) ->get();


        return view('frontend.cart',$result);
    }
public function category(Request $request, $slug){

$sort ='';
$sort_txt = "";
$filter_price_start ='';
$filter_price_end ='';
$color_filter ='';
$colorattrArr =[];

    if($request->get('sort') !== null){
        $sort = $request->get('sort');
    }
    $query= DB::table('products');


    $query=$query->leftJoin('categories','products.category_id','=','categories.id');
    $query=$query->leftJoin('product_arts','product_arts.product_id','=','products.id');
    $query=$query-> where(['products.status'=>1]);
    $query= $query->where(['categories.slug'=>$slug]);
    if($sort == 'name'){
        $query=$query->orderBy('products.pname','asc');
        $sort_txt = "Name";

    }
    if($sort=='date'){
        $query=$query->orderBy('products.id','desc');
        $sort_txt = "Date";

    }
    if($sort=="price_desc"){
        $query=$query->orderBy('product_arts.price','desc');
        $sort_txt = "Price - Desc";

       }
    if($sort=="price_asc"){
        $query=$query->orderBy('product_arts.price','asc');
        $sort_txt = "Price - Asc";

    }
    if($request->get('filter_price_start') !== null && $request->get('filter_price_end') !== null){
        $filter_price_start = $request->get('filter_price_start');
        $filter_price_end = $request->get('filter_price_end');
        if($filter_price_start >0 && $filter_price_end>0){
            $query=$query->whereBetween('product_arts.price',[$filter_price_start,$filter_price_end]);
        }

    }
    if($request->get('color_filter') !== null){

        $color_filter =$request->get('color_filter');

        $colorattrArr =explode(":",$color_filter);

        $colorattrArr = array_filter($colorattrArr);

        $query=$query->where(['product_arts.color_id' =>$request->get('color_filter')]);


    }

    $query= $query->distinct()->select('products.*');
    $query= $query->get();
    $result['product'] = $query;
        foreach($result['product'] as $list1){
           $query  = DB::table('product_arts');
           $query= $query->leftJoin('sizes','sizes.id','=','size_id');
           $query= $query->leftJoin('colors','colors.id','=','color_id');
           $query= $query->where(['product_arts.product_id'=>$list1->id]);


           $query= $query->get();


            $result['product_attr'][$list1->id] = $query;
        }
        $result['colors'] = DB::table('colors')->where(['status'=>1])->get();
        $result['sort'] = $sort;
        $result['slug'] = $slug;
        $result['color_filter'] = $color_filter;
        $result['colorattrArr'] = $colorattrArr;
        $result['filter_price_start']=$filter_price_start;
        $result['filter_price_end']=$filter_price_end;
        $result['sort_txt'] = $sort_txt;

        $result['home_category'] = DB::table('categories')->where(['status' =>1])->where(['is_home' =>1])->get();

    return view('frontend.category',$result);
}
}
