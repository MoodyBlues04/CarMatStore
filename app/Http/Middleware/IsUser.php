<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|RedirectResponse|null
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse|null
    {
        if (!$request->user() || $request->user()->is_admin) {
            return $request->expectsJson()
                ? abort(403, 'You should be user.')
                : Redirect::route('admin.index');
        }

        return $next($request);
    }
}
