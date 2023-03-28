<?php

namespace App\Service\Deliver\Classes;

use App\Models\Deliver;
use App\Service\Deliver\Service;
use Illuminate\Database\Eloquent\Collection;

class SocksCalculator
{
    private string $date;
    private Deliver | Collection $deliver;

    public function __construct($date, $deliver)
    {
        $this->date = $date;
        $this->deliver = $deliver;
    }

    public function calculateSocksQuantity(): int
    {
        $quantity = $this->previousDeliver();
        $quantity += $this->deliver->quantity;
        return $quantity;
    }

    public function calculateCost(): float
    {
        $calculatedQuantity = $this->calculateSocksQuantity();
        $cost = $this->deliver['cost'];
        return ($cost * 1.3) / $calculatedQuantity;
    }

    private function previousDeliver(): int
    {
        $previousDelivers = Deliver::where('date', '<', $this->date)
            ->where('product_id', $this->deliver->product_id)
            ->get()
            ->sum('quantity');
        return max(0, $previousDelivers - Service::preorders($this->date));
    }
}
