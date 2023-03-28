<?php

namespace App\Service\Deliver\DeliverRepository;

use Illuminate\Database\Eloquent\Collection;

interface DeliverRepository
{
    public function getByDate($date): Collection;
}
