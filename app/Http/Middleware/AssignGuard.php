<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\GeneralTrait;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use JWTAuth;

class AssignGuard extends BaseMiddleware
{
    use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    { 
        if($guard != null){
            //shoud you user guard / table
            auth()->shouldUse($guard); 
            $token = $request->header('auth-token');
            $request->headers->set('auth-token', (string) $token, true);
            $request->headers->set('Authorization', 'Bearer '.$token, true);
            try {
                $user = JWTAuth::parseToken()->authenticate();//check key to any user has belong
            } catch (TokenExpiredException $e) {
                return  $this -> returnError('401','Unauthenticated user');
            } catch (JWTException $e) {
                return  $this -> returnError('', 'token_invalid'.$e->getMessage());
            }

        }
         return $next($request);
    }
}
