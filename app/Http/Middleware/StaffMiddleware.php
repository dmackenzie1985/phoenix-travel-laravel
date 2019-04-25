<?php
/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Used to control access for Staff users
 * File: StaffMiddleware.php
 * Updated By: David Mackenzie
 * Updated: 11/05/2017
 */
namespace App\Http\Middleware;
use Closure;
/**
 * Class StaffMiddleware
 * Helper class to help deciding what to do if user is Staff or not
 * Found on: http://laravel.io/forum/02-17-2015-laravel-5-routes-restricting-based-on-usertype
 * @package App\Http\Middleware
 */
class StaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() == null || $request->user()->role != 'staff')
        {
            return redirect('home');
        }
        return $next($request);
    }
}