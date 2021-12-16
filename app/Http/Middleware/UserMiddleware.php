<?php
/**
 * This is a Northumbria University Coursework.
 *
 *  @author mitsigkas
 */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(Auth::check() && Auth::user()->isban){

        $banned = Auth::user()->isban == "1";
        Auth::logout();

        if($banned == 1){
            $message = 'Your account has been Banned.';
        }
        return redirect()->route('login')
        ->with('status', $message)
        ->withErrors(['email'=>'Your account has been Banned.']);

      }
      return $next($request);
    }
}
