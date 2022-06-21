<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Traits\GeneralTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use Auth;
use App\Product;
class UserController extends Controller
{
    use GeneralTrait;


//user login 
    public function login(Request $request)
    {

        try {

            $rules = [
                "email" => "required|exists:users,email",
                "password" => "required"

            ];
             //validation
            $validator = Validator::make($request->all(), $rules);
            //check validation
            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            //validation success
            //login
            //variable
            $credentials = $request->only(['email', 'password']); 
            //jwt generate token
            $token = Auth::guard('user-api')->attempt($credentials);
            

            if (!$token){
                return $this->returnError('E001', 'بيانات الدخول غير صحيحة');
            }
            //put user authenticated in guard (user-api)
            $user = Auth::guard('user-api')->user();
            $user->api_token = $token;
             //return token
             return $this->returnData('user', $user);//return json responce

        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
 
    }


//logout
    public function logout(Request $request)
    {
         //get token from header
         $token = $request -> header('auth-token');
        if($token){
            try {
                //logout user token
                JWTAuth::setToken($token)->invalidate(); 
            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                return  $this -> returnError('','some thing went wrongs');
            }
            return $this->returnSuccessMessage('Logged out successfully');
        }else{
            $this -> returnError('','some thing went wrongs');
        }

    } 

//user register with information
    public function user_register(Request $request)
    {
        $user =new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt("$request->password"); 
        $user->phonenumber = $request->phonenumber;
        
        $user->save();

        $response['data'] = $user;
        $response['message'] = "register success";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
    }

 //return all users
       public function index()
    {
        $users = User::all();

        $response['data'] = $users;
        $response['message'] = "This is all users";
        $response['status_code'] = 200;
        return response()->json($response,200) ;
    }
    
//show all product after check if user is authenticated or not 
//if user authenticated return all products with there prices 
//if user not authenticated return all products with price 0
    public function all_product(Request $request)
    {
        //get token fron header
            $token = $request->header('auth-token');
            $request->headers->set('auth-token', (string) $token, true);
            $request->headers->set('Authorization', 'Bearer '.$token, true);
            try {
               //check authenticted user
               //check token to any user has belong if token not belong to any exist user throw exception
               //if throw exception then th user is not authenticated 
                $user = JWTAuth::parseToken()->authenticate();
                //if user authenticated return all products with there prices 
                $products = Product::all();
                $response['data'] = $products;
                $response['message'] = "allow user to see products price (auth user)";
                $response['status_code'] = 200;
                return response()->json($response,200) ;
                
               
            } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                //if user not authenticated return all products with price 0
                  $products = Product::all();
                      foreach($products as $pro){
                        $pro->price = 0;
                      }
                        $response['data'] = $products;
                        $response['data'] = $products;
                        $response['message'] = "preventing user from see products price ( unauth user)";
                        $response['status_code'] = 200;
                        return response()->json($response,200) ;
            }catch (TokenExpiredException $e) {
                //if user not authenticated return all products with price 0
                 $products = Product::all();
                      foreach($products as $pro){
                        $pro->price = 0;
                      }
                        $response['data'] = $products;
                        $response['data'] = $products;
                        $response['message'] = "preventing user from see products price ( unauth user)";
                        $response['status_code'] = 200;
                        return response()->json($response,200) ;
            } 
            catch (JWTException $e) {
                //if user not authenticated return all products with price 0
                 $products = Product::all();
                      foreach($products as $pro){
                        $pro->price = 0;
                      }
                        $response['data'] = $products;
                        $response['data'] = $products;
                        $response['message'] = "preventing user from see products price ( unauth user)";
                        $response['status_code'] = 200;
                        return response()->json($response,200) ;
            }
     }
}
