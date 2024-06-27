<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure  $next
     * @return Response|RedirectResponse|null
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse|null
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return $request->expectsJson()
                ? abort(403, 'You should be admin.')
                : Redirect::route('user.profile.index');
        }

        return $next($request);
    }
}
