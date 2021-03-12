<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class myController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('secondpage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showproductform()   
    {
     return view('addproduct');
    }
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
    public function store(Request $request)
{
    $image=null;
    if($request->hasFile('image')){
        $file=$request->file('image');
        $image=mt_rand(10001,9999999).'_'.$file->
        getClientOriginalName();
        $file->move('uploads/products/',$image);
    }
    Product::create([
      'Product_name'=>$request->get('pname'),
      'Product_price'=>$request->get('price'),
      'Product_Quantity'=>$request->get('quantity'),
      'Product_description'=>$request->get('description'),
      'Product_image'=>$image
     ]);
    $request->session()->Flash('msg','Product has been added successfully');
    return redirect()->back();
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $showdata=Product::orderby('id','desc')->get();
        return view('showproduct',['showdata'=>$showdata]);
    }
    public function homepage()
    {
        $show=Product::orderby('id','desc')->get();
        return view('homepage',['show'=>$show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product=Product::find($id);
       return view('editproduct',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $product=Product::find($id);
        if($product->Product_image){
            // to remove image from folder
          unlink('uploads/products/'.$product->Product_image);
    }
    $product->delete();
    $request->session()->flash('msg','Product has been delete successfully');
    return redirect()->back();
        }
}
