<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class AdminupdateController extends Controller
{
    //function that allow admin to change price (add or subtract  1 S.P from all product)
    //enter (status = 1) in API URL to add 1 S.P
    //enter (status = 2) in API URL to sub 1 S.P
    //return all product with new price from database
    public function add_or_sub_price($status){
        $products = Product::all();
        
        if ($status == 1){
          foreach($products as $pro){

        $pro->price= $pro->price+1;
         $pro->save();
        
      }
        $response['data'] = $products;
        $response['message'] = "This is all products";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
     }
    elseif ($status ==2){
        foreach($products as $pro){

            $pro->price= $pro->price-1;
             $pro->save();
            
          }
            $response['data'] = $products;
            $response['message'] = "This is all products";
            $response['status_code'] = 200;
            return response()->json($response,200) ;
           }
        }
 
}
