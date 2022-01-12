<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Services\PublisherService;
use App\Http\Requests\PublisherCreateRequest;

class PublisherAction extends Controller
{
    private $publisher;

    public function __construct(PublisherService $publisher) {
        $this->publisher = $publisher;
    }

    public function create(PublisherCreateRequest $request)
    {

        $name = $request->get('name');
        $address = $request->get('address');
        if ($this->publisher->exist($name)) {
            return response('', Response::HTTP_OK);
        }

        $id = $this->publisher->store($name, $address);
        return response('', Response::HTTP_CREATED)
            ->header('Location', '/api/publishers/' . $id);
    }
}
