<?php

namespace App\Http\Middleware;

use Closure;

class RecaptchaMiddleware
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
        if ( ! env('APP_DEBUG')) {
            $results = $this->getCaptcha($request->input('g-recaptcha-response'));

            if ($results->success && $results->score > 0.5) {
                return $next($request);
            }

            return back()->with('error', 'error');
        }

        return $next($request);
    }

    private function getCaptcha(string $secretKey = '')
    {
        $results = file_get_contents(
            'https://www.google.com/recaptcha/api/siteverify?secret='
            . env('SECRET_KEY')
            . '&response='
            . $secretKey
        );

        return json_decode($results);
    }
}
