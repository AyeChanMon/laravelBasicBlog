<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ItemApiController extends Controller
{
    public function index(){
        $item = Item::all();
        return response($item,200);
    }
    
    public function show($id){
        $item = Item::find($id);
        return response($item,200);
    }

    public function store(Request $request){
        $v = Validator::make($request->all(),[
            "name"=>"required|min:3|max:50",
            "price"=>"required|integer|min:1|max:1000000000000",
            "stock"=>"required|integer|min:1|max:10"
        ]);
        if($v->fails()){
            return response($v->errors(),400);
        }
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item-> save();
        return response($request,200);
    }
}