<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Tax::all();
       return view('admin.tax',$result);
    }

    public function manage_tax(Request $request, $id=''){
if($id>0){

          $arr = Tax::where(['id'=>$id])->get();
          $result['tax_desc'] = $arr['0']->tax_desc;
          $result['tax_value'] = $arr['0']->tax_value;

          $result['id'] = $arr['0']->id;


}else{

$result['tax_desc'] = '';
$result['tax_value'] = '';

$result['id'] = 0;

}

        return view('admin.manage_tax',$result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)

    {
        $tax = Tax::find($id);
        $tax->delete();
        session()->flash('message','Tax Deleted Sucessfully');
        return redirect()->route('admin.tax');

    }
    public function status(Request $request,$status)

    {
        $tax = Tax::find($request->id);
        $tax->status= $status;
        $tax->save();
        session()->flash('message','Tax Status Updated Sucessfully');
        return redirect()->route('admin.tax');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_tax_process(Request $request)
    {
     $request->validate([
'tax_desc' => 'required|unique:taxes,tax_desc,'.$request->post('id'),

]);

if($request->post('id')>0){
    $tax = Tax::find($request->post('id'));
    $msg = "Tax Update Sucessfully";

}else{
    $tax = new Tax();
    $msg = "Tax Added Sucessfully";
}

$tax->tax_desc = $request->post('tax_desc');
$tax->tax_value = $request->post('tax_value');

$tax->status = 1;
$tax->save();
$request->session()->flash('message',$msg);

return redirect('admin/tax');






    }
}
