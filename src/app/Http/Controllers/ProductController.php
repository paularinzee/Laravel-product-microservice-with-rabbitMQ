<?php

namespace App\Http\Controllers;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;
class ProductController extends Controller
{
    // protected Model $model;
    // public function _construct(Product $model){
    //     $this->model = $model;
    // }

    // public function store(Request $request) {
    //     $request = $request->all();
    //     $product = $this->model->create($request);
    //     return response()->json([
    //         'data' => $product,
    //         'message' => 'Item is added successfully'
    //     ]);
    // }


    public function store( Request $request ){
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'price'=>'required|numeric',
            'inventory'=>'required|numeric',
            
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $product = new Product();
        
        $product->title = $request->title;
        $product->price = $request->price;
        $product->inventory	 = $request->inventory;
        $product->save();
        return response()->json('product is added',201);
        
    }

    public function index(){
        $products = Product::paginate(10);
        if($products){
            return response()->json($products, 200);

        }else return response()->json('no products');
        
    }

    public function show($id){
        $product = Product::find($id);
        if($product){
            return response()->json($product, 200);
        }
        else return response()->json('product not found');

    }

    // public function update( Request $request,$id ){
    //     $validator = Validator::make($request->all(),[
    //         'title'=>'required',
    //         'price'=>'required|numeric',
    //         'inventory'=>'required|numeric',
    //     ]);


    //     if($validator->fails()){
    //         return response()->json($validator->errors()->toJson(), 400);
    //     }
        
    //     $product = Product::find($id);
    //     if($product){
    //         $product->title = $request->title;
    //         $product->price = $request->price;
    //         $product->inventory	 = $request->inventory;
           
    //         $product->save();
    //         return response()->json('product is updated');
    //     }
    //     else return response()->json('product not found');
        
        
        
    // }

    public function destroy($id){
        $product= Product::find($id);
        if($product){
        $product->delete();
        return response()->json('product is deleted');

        }
        else return response()->json('product not found');
        
    }




}
