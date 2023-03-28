<?php

namespace App\Service\Deliver\DeliverRepository;

use App\Models\Deliver;
use Illuminate\Database\Eloquent\Collection;

class EloquentDeliverRepository
{
    public function getByDate($date): Collection
    {
        return Deliver::where('date', $date)->get();
    }
}
