<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Color::all();
       return view('admin.color',$result);
    }

    public function manage_color(Request $request, $id=''){
if($id>0){

          $arr = Color::where(['id'=>$id])->get();
          $result['color'] = $arr['0']->color;

          $result['id'] = $arr['0']->id;


}else{

$result['color'] = '';

$result['id'] = 0;

}

        return view('admin.manage_color',$result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)

    {
        $size = Color::find($id);
        $size->delete();
        session()->flash('message','Size Deleted Sucessfully');
        return redirect()->route('admin.color');

    }
    public function status(Request $request,$status)

    {
        $size = Color::find($request->id);
        $size->status= $status;
        $size->save();
        session()->flash('message','Color Status Updated Sucessfully');
        return redirect()->route('admin.color');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_color_process(Request $request)
    {
     $request->validate([
'color' => 'required|unique:colors,color,'.$request->post('id'),

]);

if($request->post('id')>0){
    $size = Color::find($request->post('id'));
    $msg = "Size Update Sucessfully";

}else{
    $size = new Color();
    $msg = "Size Added Sucessfully";
}

$size->color = $request->post('color');

$size->status = 1;
$size->save();
$request->session()->flash('message',$msg);

return redirect('admin/color');






    }
}
