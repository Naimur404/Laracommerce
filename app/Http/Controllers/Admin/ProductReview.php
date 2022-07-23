<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductReview extends Controller
{
    public function index(){
        $result['product_review']= DB::table('product_review')
        ->get();
        return view('admin.product_review',$result);


    }
    public function status($status,$id){

        $result['product_review']= DB::table('product_review')
        ->where(['id'=>$id])
        ->update(['status'=>$status]);

        session()->flash('message','Product Review Status Updated Sucessfully');
        return redirect('admin/product_review');


    }
    public function delete($id){
      DB::table('product_review')->where(['id'=>$id])
      ->delete();
      session()->flash('message','Product Review Deleted Sucessfully');
      return redirect('admin/product_review');
    }
}
