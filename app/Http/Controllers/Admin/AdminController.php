<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (session()->has('ADMIN_LOGIN')) {

            return redirect('admin/dashboard');
        } else {

            return view('admin.login');
        }
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)

    {
        $email = $request->post('email');
        $password = $request->post('password');
        // $result = Admin::where(['email' => $email, 'password' => $password])->get();
        $result = Admin::where(['email' => $email])->first();
        if ($result) {
            if (Hash::check($request->post('password'), $result->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                return redirect('admin/dashboard');
            } else {
                $request->session()->flash('error', 'please enter valid Password');
                return redirect('admin');
            }
            $request->session()->put('ADMIN_LOGIN', true);
            $request->session()->put('ADMIN_ID', $result[0]->id);
            return redirect('admin/dashboard');
        } else {
            $request->session()->flash('error', 'please enter valid email');
            return redirect('admin');
        }
    }

    public function dashboard()
    {

        $result['total_orders'] = DB::table('orders')->count();

        $result['total_items'] = DB::table('orders_details')
        ->leftjoin('orders','orders.id','=','orders_details.orders_id')
        ->where('orders.payment_status','=',"Success")
        ->sum('orders_details.qty')
       ;
       $result['total_earnings'] = DB::table('orders')

       ->where('payment_status','=',"Success")
       ->sum('orders.total_amt')
      ;




        return view('admin.dashboard',$result);
    }
}
