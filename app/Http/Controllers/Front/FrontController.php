<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $result['home_category'] = DB::table('categories')->where(['status' => 1])->where(['is_home' => 1])->get();

        $result['home_brand'] = DB::table('brands')->where(['status' => 1])->where(['is_home' => 1])->get();
        $result['home_banner'] = DB::table('banners')->where(['status' => 1])->get();


        foreach ($result['home_category'] as $list) {
            $result['home_category_product'][$list->id] = DB::table('products')->where(['status' => 1])->where(['category_id' => $list->id])->get();
            foreach ($result['home_category_product'][$list->id] as $list1) {
                $result['home_product_attr'][$list1->id] = DB::table('product_arts')->leftJoin('sizes', 'sizes.id', '=', 'size_id')->leftJoin('colors', 'colors.id', '=', 'color_id')->where(['product_arts.product_id' => $list1->id])->get();
            }
        }

        $result['home_featured_product'][$list->id] = DB::table('products')->where(['status' => 1])->where(['is_featured' => 1])->get();
        foreach ($result['home_featured_product'][$list->id] as $list1) {
            $result['home_featured_product_attr'][$list1->id] = DB::table('product_arts')->leftJoin('sizes', 'sizes.id', '=', 'size_id')->leftJoin('colors', 'colors.id', '=', 'color_id')->where(['product_arts.product_id' => $list1->id])->get();
        }

        $result['home_tranding_product'][$list->id] = DB::table('products')->where(['status' => 1])->where(['is_tranding' => 1])->get();
        foreach ($result['home_tranding_product'][$list->id] as $list1) {
            $result['home_tranding_product_attr'][$list1->id] = DB::table('product_arts')->leftJoin('sizes', 'sizes.id', '=', 'size_id')->leftJoin('colors', 'colors.id', '=', 'color_id')->where(['product_arts.product_id' => $list1->id])->get();
        }
        $result['home_discounted_product'][$list->id] = DB::table('products')->where(['status' => 1])->where(['is_discounted' => 1])->get();
        foreach ($result['home_discounted_product'][$list->id] as $list1) {
            $result['home_discounted_product_attr'][$list1->id] = DB::table('product_arts')->leftJoin('sizes', 'sizes.id', '=', 'size_id')->leftJoin('colors', 'colors.id', '=', 'color_id')->where(['product_arts.product_id' => $list1->id])->get();
        }
        // echo "<pre>";
        // print_r($result['home_discounted_product'][$list->id]);
        // die();

        return view('frontend.index', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product($slug)
    {
        $result['product'] = DB::table('products')->where(['pslug' => $slug])->where(['status' => 1])->get();
        foreach ($result['product'] as $list1) {
            $result['product_attr'][$list1->id] = DB::table('product_arts')->leftJoin('sizes', 'sizes.id', '=', 'size_id')->leftJoin('colors', 'colors.id', '=', 'color_id')->where(['product_arts.product_id' => $list1->id])->get();
        }
        foreach ($result['product'] as $list1) {
            $result['product_images'][$list1->id] = DB::table('product_imgs')->where(['product_imgs.product_id' => $list1->id])->get();
        }
        //for related product basis on related category
        $result['related_product'] = DB::table('products')->where(['status' => 1])->where('pslug', '!=', $slug)->where(['category_id' => $result['product'][0]->category_id])->get();

        foreach ($result['related_product'] as $list1) {
            $result['related_product_attr'][$list1->id] = DB::table('product_arts')->leftJoin('sizes', 'sizes.id', '=', 'size_id')->leftJoin('colors', 'colors.id', '=', 'color_id')->where(['product_arts.product_id' => $list1->id])->get();
        }
        return view('frontend.product', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function add_to_cart(Request $request)
    {
        if ($request->session()->has('USER_ID')) {
            $uid = $request->session()->get('USER_ID');
            $user_type = "Reg";
        } else {
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }

        $size_id = $request->post('size_id');
        $color_id = $request->post('color_id');
        $proudct_id = $request->post('product_id');
        $pqty = $request->post('pqty');

        $result = DB::table('product_arts')->select('product_arts.id')
            ->leftJoin('sizes', 'sizes.id', '=', 'product_arts.size_id')->leftJoin('colors', 'colors.id', '=', 'product_arts.color_id')->where(['product_id' => $proudct_id])->where(['sizes.size' => $size_id])->where(['colors.color' => $color_id])->get();
        $product_attr_id = $result[0]->id;

        $check =  DB::table('cart')
            ->where(['user_id' => $uid])
            ->where(['user_type' => $user_type])
            ->where(['product_id' => $proudct_id])

            ->where(['product_attr_id' => $product_attr_id])
            ->get();
        if (isset($check[0])) {

            $update_id = $check[0]->id;
            if ($pqty == 0) {
                DB::table('cart')
                    ->where(['id' => $update_id])
                    ->delete();
                $msg = "Remove";
            } else {
                DB::table('cart')
                    ->where(['id' => $update_id])
                    ->update(['qty' => $pqty]);
                $msg = "Updated";
            }
        } else {
            $id =  DB::table('cart')->insertGetId([
                'user_id' => $uid,
                'user_type' => $user_type,
                'product_id' => $proudct_id,
                'product_attr_id' => $product_attr_id,
                'qty' => $pqty,
                'added_on' => date('y-m-d h:i:s')
            ]);
            $msg = "added";
        }
        $result =  DB::table('cart')->leftJoin('products', 'products.id', '=', 'cart.product_id')->leftJoin('product_arts', 'product_arts.id', '=', 'cart.product_attr_id')->leftJoin('sizes', 'sizes.id', '=', 'product_arts.size_id')->leftJoin('colors', 'colors.id', '=', 'product_arts.color_id')
            ->where(['user_id' => $uid])
            ->where(['user_type' => $user_type])
            ->select('cart.qty', 'products.pname', 'products.image', 'products.pslug', 'sizes.size', 'colors.color', 'product_arts.price', 'products.id as pid', 'product_arts.id as attr_id')
            ->get();
        return response()->json(['msg' => $msg, 'data' => $result, 'totalitems' => count($result)]);
    }
    public  function cart(Request $request)
    {

        if ($request->session()->has('USER_ID')) {
            $uid = $request->session()->get('USER_ID');
            $user_type = "Reg";
        } else {
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }
        $result['list'] =  DB::table('cart')->leftJoin('products', 'products.id', '=', 'cart.product_id')->leftJoin('product_arts', 'product_arts.id', '=', 'cart.product_attr_id')->leftJoin('sizes', 'sizes.id', '=', 'product_arts.size_id')->leftJoin('colors', 'colors.id', '=', 'product_arts.color_id')
            ->where(['user_id' => $uid])
            ->where(['user_type' => $user_type])
            ->select('cart.qty', 'products.pname', 'products.image', 'products.pslug', 'sizes.size', 'colors.color', 'product_arts.price', 'products.id as pid', 'product_arts.id as attr_id')
            ->get();


        // $result = DB::table('product_arts')->select('product_arts.id')
        // ->leftJoin('sizes','sizes.id','=','size_id')->leftJoin('colors','colors.id','=','color_id')->where(['product_id'=>$proudct_id])->where(['sizes.size'=>$size_id])->where(['colors.color'=>$color_id]) ->get();


        return view('frontend.cart', $result);
    }


    public function category(Request $request, $slug)
    {

        $sort = '';
        $sort_txt = "";
        $filter_price_start = '';
        $filter_price_end = '';
        $color_filter = '';
        $colorattrArr = [];

        if ($request->get('sort') !== null) {
            $sort = $request->get('sort');
        }
        $query = DB::table('products');


        $query = $query->leftJoin('categories', 'products.category_id', '=', 'categories.id');
        $query = $query->leftJoin('product_arts', 'product_arts.product_id', '=', 'products.id');
        $query = $query->where(['products.status' => 1]);
        $query = $query->where(['categories.slug' => $slug]);
        if ($sort == 'name') {
            $query = $query->orderBy('products.pname', 'asc');
            $sort_txt = "Name";
        }
        if ($sort == 'date') {
            $query = $query->orderBy('products.id', 'desc');
            $sort_txt = "Date";
        }
        if ($sort == "price_desc") {
            $query = $query->orderBy('product_arts.price', 'desc');
            $sort_txt = "Price - Desc";
        }
        if ($sort == "price_asc") {
            $query = $query->orderBy('product_arts.price', 'asc');
            $sort_txt = "Price - Asc";
        }
        if ($request->get('filter_price_start') !== null && $request->get('filter_price_end') !== null) {
            $filter_price_start = $request->get('filter_price_start');
            $filter_price_end = $request->get('filter_price_end');
            if ($filter_price_start > 0 && $filter_price_end > 0) {
                $query = $query->whereBetween('product_arts.price', [$filter_price_start, $filter_price_end]);
            }
        }
        if ($request->get('color_filter') !== null) {

            $color_filter = $request->get('color_filter');

            $colorattrArr = explode(":", $color_filter);

            $colorattrArr = array_filter($colorattrArr);

            $query = $query->where(['product_arts.color_id' => $request->get('color_filter')]);
        }

        $query = $query->distinct()->select('products.*');
        $query = $query->get();
        $result['product'] = $query;
        foreach ($result['product'] as $list1) {
            $query  = DB::table('product_arts');
            $query = $query->leftJoin('sizes', 'sizes.id', '=', 'size_id');
            $query = $query->leftJoin('colors', 'colors.id', '=', 'color_id');
            $query = $query->where(['product_arts.product_id' => $list1->id]);


            $query = $query->get();


            $result['product_attr'][$list1->id] = $query;
        }
        $result['colors'] = DB::table('colors')->where(['status' => 1])->get();
        $result['sort'] = $sort;
        $result['slug'] = $slug;
        $result['color_filter'] = $color_filter;
        $result['colorattrArr'] = $colorattrArr;
        $result['filter_price_start'] = $filter_price_start;
        $result['filter_price_end'] = $filter_price_end;
        $result['sort_txt'] = $sort_txt;

        $result['home_category'] = DB::table('categories')->where(['status' => 1])->where(['is_home' => 1])->get();

        return view('frontend.category', $result);
    }


    public function search($str)
    {
        $result['search_product'] =
            $query = DB::table('products');


        $query = $query->leftJoin('categories', 'products.category_id', '=', 'categories.id');
        $query = $query->leftJoin('product_arts', 'product_arts.product_id', '=', 'products.id');
        $query = $query->where(['products.status' => 1]);

        $query = $query->Where('pname', 'like', "%$str%");
        $query = $query->orWhere('pslug', 'like', "%$str%");
        $query = $query->orWhere('short_desc', 'like', "%$str%");
        $query = $query->orWhere('desc', 'like', "%$str%");
        $query = $query->orWhere('keywords', 'like', "%$str%");
        $query = $query->orWhere('technical_specification', 'like', "%$str%");

        $query = $query->distinct()->select('products.*');
        $query = $query->get();
        $result['product'] = $query;
        foreach ($result['product'] as $list1) {
            $query  = DB::table('product_arts');
            $query = $query->leftJoin('sizes', 'sizes.id', '=', 'size_id');
            $query = $query->leftJoin('colors', 'colors.id', '=', 'color_id');
            $query = $query->where(['product_arts.product_id' => $list1->id]);


            $query = $query->get();


            $result['product_attr'][$list1->id] = $query;
        }


        return view('frontend.search', $result);
    }
    public function registration(Request $request)
    {
        if ($request->session()->has('USER_LOGIN') != null) {
            return redirect('/');
        }
        return view('frontend.registration');
    }


    public function registration_process(Request $request)
    {


        $valid = Validator::make($request->all(), [
            "name" => 'required',
            "email" => 'required|email|unique:customers,email',
            "password" => 'required|min:8',
            "phone" => 'required|numeric|digits:11',

        ]);
        if ($valid->fails()) {
            return response()->json(['status' => 'error', 'error' => $valid->errors()->toArray()]);
        } else {
            $rand_id = rand(11111111, 9999999);
            $arr = [
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "password" => Crypt::encrypt($request->password),
                "status" => 1,
                "is_verify" => 0,
                "random_id" => $rand_id,
                "created_at" => date('Y-m-d h:i:s'),
                "updated_at" => date('Y-m-d h:i:s')
            ];
            $query = DB::table('customers')->insert($arr);
        }
        if ($query) {
            // email verification code start
            $data = ['name' => $request->name, 'rand_id' => $rand_id];
            $user['to'] = $request->email;
            Mail::send('frontend/email_verification', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject('Email Id Verification');
            });
            //end
            return response()->json(['status' => 'sucess', 'msg' => "Registration Sucessful. Please check your eamil id for verification"]);
        }
    }



    public function login_process(Request $request)
    {
        //login exting user email check
        $result = Customer::where(['email' => $request->login_email])->get();
        if (isset($result[0])) {
            //password decrypt
            $pass_check = Crypt::decrypt($result[0]->password);
            $status = $result[0]->status;
            $is_verify = $result[0]->is_verify;
            if ($is_verify == 0) {
                return response()->json(['status' => 'error', 'msg' => 'Please Verify Your Account']);
            }
            if ($status == 0) {
                return response()->json(['status' => 'error', 'msg' => 'Your Account Has Been Deactived']);
            }
            if ($pass_check == $request->login_password) {
                //condition for remember me
                if ($request->rememberme != null) {

                    //set cookie for remember me
                    Cookie::queue('login_email', $request->login_email, (60 * 60 * 24 * 100));
                    Cookie::queue('login_password', $request->login_password, (60 * 60 * 24 * 100));
                } else {
                    //unset cookie for remember me
                    Cookie::queue(Cookie::forget('login_email'));
                    Cookie::queue(Cookie::forget('login_password'));
                }

                $status = "sucess";
                $msg = "";
                $request->session()->put('USER_LOGIN', true);
                $request->session()->put('USER_ID', $result[0]->id);

                $request->session()->put('USER_NAME', $result[0]->name);
                $getUserTempId = getUserTempId();
                DB::table('cart')
                    ->where(['user_id' => $getUserTempId])
                    ->where(['user_type' => 'Not-Reg'])
                    ->update(['user_id' => $result[0]->id, 'user_type' => 'Reg']);
            } else {
                $status = "error";
                $msg = "Please entred valid password";
            }
        } else {
            $status = "error";
            $msg = "Please entred valid email";
        }

        return response()->json(['status' => $status, 'msg' => $msg]);
    }


    public function email_verification($id)
    {
        $result = DB::table(
            'customers'
        )->where(['random_id' => $id])
            ->where(['is_verify' => 0])
            ->get();
        if (isset($result[0])) {
            DB::table('customers')->where(['id' => $result[0]->id])->update(['is_verify' => 1, 'random_id' => '']);
            return view('frontend.thankyou');
        } else {
            return redirect('/');
        }
    }
    public function forgot_password(Request $request)
    {

        $result = Customer::where(['email' => $request->forgot_email])->get();
        if (isset($result[0])) {
            $rand_id = rand(11111111, 9999999);
            DB::table('customers')->where(['email' => $request->forgot_email])->update(['is_forgot' => 1, 'random_id' => $rand_id]);
            $data = ['name' => $result[0]->name, 'rand_id' => $rand_id];
            $user['to'] = $request->forgot_email;
            Mail::send('frontend/forgot_email', $data, function ($message) use ($user) {
                $message->to($user['to']);
                $message->subject('Password Reset');
            });
            //end
            return response()->json(['status' => 'sucess', 'msg' => " Please check your eamil id for Reset Password"]);
        } else {
            return response()->json(['status' => 'error', 'msg' => "This Email id not registered"]);
        }
    }
    public function forgot_password_change($id)
    {
        $result = DB::table(
            'customers'
        )->where(['random_id' => $id])
            ->where(['is_forgot' => 1])
            ->get();
        if (isset($result[0])) {
            session()->put('USER_ID', $result[0]->id);
            return view('frontend.forgot_password_change');
        } else {
            return redirect('/');
        }
    }


    public function forgot_password_change_process(Request $request)
    {
        if ($request->forgot_password != null && $request->forgot_password_confirm != null) {
            if ($request->forgot_password == $request->forgot_password_confirm) {
                $update_password = Crypt::encrypt($request->forgot_password);
                DB::table('customers')->where(['id' => session('USER_ID')])->update(['password' => $update_password, 'is_forgot' => 0, 'random_id' => '']);
                return response()->json(['status' => 'sucess', 'msg' => "Password Update Sucessfully"]);
            } else {
                return response()->json(['status' => 'error', 'msg' => "Password Dont Match"]);
            }
        } else {
            return response()->json(['status' => 'error', 'msg' => "Password Can Not Be Empty"]);
        }
    }
    public function checkout()
    {

        $result['cart_data'] = cartCount();
        if (session()->has('USER_ID')) {
            $uid = session()->get('USER_ID');
            $customer_info =  DB::table('customers')->where(['id' => $uid])
                ->get();
            $result['customers']['name'] =  $customer_info[0]->name;
            $result['customers']['email'] =  $customer_info[0]->email;
            $result['customers']['phone'] =  $customer_info[0]->phone;
            $result['customers']['address'] =  $customer_info[0]->address;
            $result['customers']['city'] =  $customer_info[0]->city;
            $result['customers']['state'] =  $customer_info[0]->state;
            $result['customers']['zip'] =  $customer_info[0]->zip;
        } else {
            $result['customers']['name'] = '';
            $result['customers']['email'] = '';
            $result['customers']['phone'] = '';
            $result['customers']['address'] = '';
            $result['customers']['city'] = '';
            $result['customers']['state'] = '';
            $result['customers']['zip'] = '';
        }
        if (isset($result['cart_data'][0])) {
            return view('frontend.checkout', $result);
        } else {
            return redirect('/');
        }
    }
    public function apply_coupon_code(Request $request)
    {
        //apply coupon using common.php and json ecode and decode
        $arr = apply_coupon_code($request->coupon_code);
        $arr = json_decode($arr, true);

        return response()->json(['status' => $arr['status'], 'msg' => $arr['msg'], 'totalprice' => $arr['totalprice']]);
    }
    public function remove_coupon_code(Request $request)
    {
        $totalprice = 0;
        $result = DB::table('coupons')->where(['code' => $request->coupon_code])->get();
        $totalAddtoCartItem = cartCount();

        foreach ($totalAddtoCartItem as $list) {
            $totalprice = $totalprice + ($list->qty * $list->price);
        }
        return response()->json(['status' => 'sucess', 'msg' => 'Coupon Code Removed', 'totalprice' => $totalprice]);
    }


    public function place_order(Request $request)
    {
        if ($request->session()->get('USER_ID')) {
            $coupon_value = 0;
            $arr = [];

            //chech user coupon code is valid or not when place order using commin.php
            if ($request->coupon_code != '') {
                $arr = apply_coupon_code($request->coupon_code);
                $arr = json_decode($arr, true);
                if ($arr['status'] == 'sucess') {
                    $coupon_value = $arr['coupon_code_value'];
                } else {
                    return response()->json(['status' => 'error', 'msg' => $arr['msg']]);
                }
            }
            $uid = $request->session()->get('USER_ID');
            $totalprice = 0;

            $totalAddtoCartItem = cartCount();

            foreach ($totalAddtoCartItem as $list) {
                $totalprice = $totalprice + ($list->qty * $list->price);
            }

        $valid = Validator::make($request->all(), [
            "name" => 'required',
            "email" => 'required|email',

            "phone" => 'required|numeric|digits:11',

        ]);
        if ($valid->fails()) {
            return response()->json(['status' => 'errors', 'error' => $valid->errors()->toArray()]);
        }else{
            $post_data = [
                'customers_id' => $uid,

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'state' => $request->state,
                'city' => $request->city,
                'zip' => $request->zip,
                'coupon_code' => $request->coupon_code,
                'coupon_value' => $coupon_value,
                'payment_type' => $request->payment_type,
                'payment_status' => 'Pending',
                'total_amt' => $totalprice,
                'order_status' => 1,

                'added_on' => date('Y-m-d h:i:s'),
            ];
            $order_id = DB::table('orders')->insertGetId($post_data);
        }


            $request->session()->put('ORDER_ID', $order_id);

            if ($order_id > 0) {
                foreach ($totalAddtoCartItem as $list) {
                    $productDetailArr['product_id'] = $list->pid;
                    $productDetailArr['products_attr_id'] = $list->attr_id;
                    $productDetailArr['price'] = $list->price;
                    $productDetailArr['qty'] = $list->qty;
                    $productDetailArr['orders_id'] = $order_id;
                    DB::table('orders_details')->insert($productDetailArr);
                }
                $url_final = "";
                if ($request->payment_type == 'Gateway') {
                    $final_amt = $totalprice - $coupon_value;
                    $ch = curl_init();
                    $url = 'https://sandbox.aamarpay.com/request.php'; // live url https://secure.aamarpay.com/request.php
                    $fields = array(
                        'store_id' => 'aamarpay', //store id will be aamarpay,  contact integration@aamarpay.com for test/live id
                        'amount' => $final_amt, //transaction amount
                        'payment_type' => 'VISA', //no need to change
                        'order_id' => $order_id,
                        'currency' => 'BDT',  //currenct will be USD/BDT
                        'tran_id' => rand(1111111, 9999999), //transaction id must be unique from your end
                        'cus_name' => $request->name,  //customer name
                        'cus_email' => $request->email, //customer email address
                        'cus_add1' => 'Dhaka',  //customer address
                        'cus_add2' => 'Mohakhali DOHS', //customer address
                        'cus_city' => 'Dhaka',  //customer city
                        'cus_state' => 'Dhaka',  //state
                        'cus_postcode' => '1206', //postcode or zipcode
                        'cus_country' => 'Bangladesh',  //country
                        'cus_phone' => '1231231231231', //customer phone number
                        'cus_fax' => 'Not¬Applicable',  //fax
                        'ship_name' => 'ship name', //ship name
                        'ship_add1' => 'House B-121, Road 21',  //ship address
                        'ship_add2' => 'Mohakhali',
                        'ship_city' => 'Dhaka',
                        'ship_state' => 'Dhaka',
                        'ship_postcode' => '1212',
                        'ship_country' => 'Bangladesh',
                        'desc' => 'payment description',
                        'success_url' => route('success'), //your success route
                        'fail_url' => route('fail'), //your fail route
                        'cancel_url' => 'http://localhost/foldername/cancel.php', //your cancel url
                        'opt_a' => $order_id,  //optional paramter
                        'opt_b' => 'Akil',
                        'opt_c' => 'Liza',
                        'opt_d' => 'Sohel',
                        'signature_key' => '28c78bb1f45112f5d40b956fe104645a'
                    ); //signature key will provided aamarpay, contact integration@aamarpay.com for test/live signature key





                    curl_setopt($ch, CURLOPT_VERBOSE, true);
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_HEADER, False);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));


                    curl_close($ch);
                    // print_r ($_POST);

                    $url_final =   'https://sandbox.aamarpay.com' . $url_forward;
                }





                // DB::table('cart')->where(['user_id' => $uid, 'user_type' => 'Reg'])->delete();
                // $request->session()->put('ORDER_ID', $order_id);

                $status = "sucess";
                $msg = "Order Placed";
            } else {
                $status = "error";
                $msg = "Please Try After Sometime";
            }
            //this else for not reg user
        } else {
            $status = "error";
            $msg = "Please login to placed order";
        }
        return response()->json(['status' => $status, 'msg' => $msg, 'url_final' =>  $url_final]);
    }





    public function success(Request $request)
    {
        if ($request['opt_a'] != '' && $request['pay_status'] == 'Successful') {


            DB::table("orders")->where(['id' => $request['opt_a']])->update(['tran_id' => $request['pg_txnid'], 'payment_id' => $request['mer_txnid']]);
            return redirect('/order_placed');
        }
    }

    public function fail(Request $request)
    {
        return $request;
    }




    public function order_placed()
    {
        if (session()->has('ORDER_ID')) {
            return view('frontend.order_placed');
        } else {
            return redirect('/');
        }
    }
}
