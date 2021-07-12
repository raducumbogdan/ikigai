<?php


namespace App\Http\Middleware;


use Illuminate\Http\Request;
use Closure;
use Spatie\HttpLogger\DefaultLogWriter;

/**
 * Class HttpLogger
 * @package App\Http\Middleware
 *
 * A simple logger for all HTTP requests
 */
class HttpLogger
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $logger = new DefaultLogWriter();
        $logger->logRequest($request);

        return $next($request);
    }
}
