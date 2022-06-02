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
    public function category()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
