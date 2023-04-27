<?php

namespace App\Http\Middleware;

use App\Models\SearchResult;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TrackSearch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    // terminate() is called after the response is sent to the browser

    public function terminate(Request $request, Response $response)
    {
        SearchResult::create([
            'ip' => $request->ip(),
            'from' => $request->from,
            'to' => $request->to,
            'results' => Arr::get(json_decode($response->getContent(),true),'data')
        ]);
}
}
