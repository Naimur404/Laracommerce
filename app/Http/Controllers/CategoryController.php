<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Category::all();
       return view('admin.category',$result);
    }

    public function manage_category(Request $request, $id=''){
if($id>0){

          $arr = Category::where(['id'=>$id])->get();
          $result['name'] = $arr['0']->name;
          $result['slug'] = $arr['0']->slug;
          $result['id'] = $arr['0']->id;


}else{

$result['name'] = '';
$result['slug'] = '';
$result['id'] = 0;

}

        return view('admin.manage_category',$result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)

    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','Category Deleted Sucessfully');
        return redirect()->route('admin.category');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_category_process(Request $request)
    {
     $request->validate([
'name' => 'required',
'slug' => 'required|unique:categories,slug,'.$request->post('id'),
]);

if($request->post('id')>0){
    $category = Category::find($request->post('id'));
    $msg = "Category Update Sucessfully";

}else{
    $category = new Category();
    $msg = "Category Added Sucessfully";
}

$category->name = $request->post('name');
$category->slug = $request->post('slug');
$category->save();
$request->session()->flash('message',$msg);

return redirect('admin/category');






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
