<?php

namespace app\http\middleware;

class Check
{
    public function handle($request, \Closure $next,$token)
    {
       
        return $next($request);
    }
}
