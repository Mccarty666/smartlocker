<?php

namespace Tests\Unit;

use App\Http\Middleware\SecurityHeaders;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeadersTest extends TestCase
{
    /**
     * Test if SecurityHeaders middleware adds the expected headers.
     */
    public function test_it_adds_security_headers(): void
    {
        $middleware = new SecurityHeaders;
        $request = Request::create('/', 'GET');

        // Create a dummy next closure that returns a blank response
        $next = function () {
            return new Response;
        };

        $response = $middleware->handle($request, $next);

        $this->assertEquals('SAMEORIGIN', $response->headers->get('X-Frame-Options'));
        $this->assertEquals('1; mode=block', $response->headers->get('X-XSS-Protection'));
        $this->assertEquals('nosniff', $response->headers->get('X-Content-Type-Options'));
        $this->assertEquals('strict-origin-when-cross-origin', $response->headers->get('Referrer-Policy'));
        $this->assertEquals("default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';", $response->headers->get('Content-Security-Policy'));
    }
}
