<?php

namespace App\Http\Controllers\Delivery;

use App\Models\Deliver;

class DeliverController extends BaseController
{

    public function index()
    {
        return json_encode(Deliver::all()->sortByDesc('id'));
    }

    public function show($date)
    {
        return $this->service->show($date);
    }
}
