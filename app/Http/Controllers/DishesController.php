<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\DishRequest;
use Illuminate\Support\Facades\Validator;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes=Dish::all();
        // return $dishes->categories->category_name;
        return view('kitchen.dish',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();

        return view('kitchen.create-dish',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(DishRequest $request)
    {
        $dish=new Dish();
        $dish->name=$request->name;
        $dish->category_id=$request->category;
        $imageName=date('YmdHis'). "." .$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'),$imageName);
        $dish->image=$imageName;
        $dish->save();
        return redirect()->route('dishes.index')->with('success','Dish created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish=Dish::find($id);
        $category=Category::all();
        return view('kitchen.edit',compact('dish','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
      request()->validate([
        'name'=>'required',
        'category'=>'required',
      ]);
      $dish->name=$request->name;
      $dish->category_id=$request->category;
      if ($request->image) {
          $imageName=date('YmdHis'). "." .$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'),$imageName);
            $dish->image=$imageName;
      }
      $dish->save();
      return redirect()->route('dishes.index')->with('success','Dish updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
         return redirect()->route('dishes.index')->with('success','Dish deleted successfully');
    }
    public function order()
    {
        $rawStatus=config('res.order_status');
        $status=array_flip($rawStatus);
        $order=Order::whereIn('status',[1,2])->get();
        return view('kitchen.order',compact('order','status'));
    }
    public function approve(Order $order)
    {
        // dd($order->all());
       $order->status=config('res.order_status.processing');
       $order->save();
       return redirect('order')->with('success','Order approved successfully');
    }
     public function cancel(Order $order)
    {
       $order->status=config('res.order_status.cancel');
       $order->save();
       return redirect('order')->with('success','Order canel successfully');
    }
     public function ready(Order $order)
    {
       $order->status=config('res.order_status.ready');
       $order->save();
       return redirect('order')->with('success','Order ready successfully');
    }
}
