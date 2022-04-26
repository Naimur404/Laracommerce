<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Size::all();
       return view('admin.size',$result);
    }

    public function manage_size(Request $request, $id=''){
if($id>0){

          $arr = Size::where(['id'=>$id])->get();
          $result['size'] = $arr['0']->size;

          $result['id'] = $arr['0']->id;


}else{

$result['size'] = '';

$result['id'] = 0;

}

        return view('admin.manage_size',$result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)

    {
        $size = Size::find($id);
        $size->delete();
        session()->flash('message','Size Deleted Sucessfully');
        return redirect()->route('admin.size');

    }
    public function status(Request $request,$status)

    {
        $size = Size::find($request->id);
        $size->status= $status;
        $size->save();
        session()->flash('message','Size Status Updated Sucessfully');
        return redirect()->route('admin.size');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_size_process(Request $request)
    {
     $request->validate([
'size' => 'required|unique:sizes,size,'.$request->post('id'),

]);

if($request->post('id')>0){
    $size = Size::find($request->post('id'));
    $msg = "Size Update Sucessfully";

}else{
    $size = new Size();
    $msg = "Size Added Sucessfully";
}

$size->size = $request->post('size');

$size->status = 1;
$size->save();
$request->session()->flash('message',$msg);

return redirect('admin/size');






    }
}
