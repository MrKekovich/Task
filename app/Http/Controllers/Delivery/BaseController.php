<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Service\Deliver\Service;

class BaseController extends Controller
{
    public mixed $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
