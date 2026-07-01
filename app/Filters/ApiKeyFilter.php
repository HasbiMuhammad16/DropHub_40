<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ApiKeyFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $validKey = env('API_KEY');
        $sentKey  = $request->getHeaderLine('X-API-KEY');

        if (empty($validKey) || empty($sentKey) || ! hash_equals($validKey, $sentKey)) {
            $response = service('response');

            return $response->setStatusCode(401)
                ->setJSON(['error' => 'Unauthorized. Header X-API-KEY tidak valid atau tidak ada.']);
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Not used
    }
}
