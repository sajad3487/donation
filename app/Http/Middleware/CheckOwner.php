<?php

namespace App\Http\Middleware;

use App\Http\Services\UserService;
use Closure;

class CheckOwner
{
    private $userService;

    public function __construct(
        UserService $userService
    )
    {
        $this->userService = $userService;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $this->userService->getUserById(auth()->id());
        if ($user->user_type == 2){
            return $next($request);
        }elseif ($user->user_type == 1){
            return redirect('/customer');
        }
        else{
            return redirect('/admin');
        }
    }
}
