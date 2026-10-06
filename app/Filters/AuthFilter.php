<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Suriin kung nakaset ang isLoggedIn flag sa session
        if (! $session->get('isLoggedIn')) {
            return redirect()->to(base_url('index.php/login'))->with('error', 'Please login first.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Walang kailangang gawin pagkatapos ng request
    }
}