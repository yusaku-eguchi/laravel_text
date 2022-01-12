<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Services\PublisherService;

class PublisherAction extends Controller
{
    private $publisher;

    public function __construct(PublisherService $publisher) {
        $this->publisher = $publisher;
    }

    public function create(Request $request)
    {
        if ($this->publisher->exist($request->name)) {
            return response('', Response::HTTP_OK);
        }

        $id = $this->publisher->store($request->name, $request->address);
        return response('', Response::HTTP_CREATED)
            ->header('Location', '/api/publishers/' . $id);
    }
}
