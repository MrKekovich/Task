<?php

namespace App\Service\Deliver;

use App\Service\Deliver\Classes\Fibonacci;
use App\Service\Deliver\Classes\SocksCalculator;
use App\Service\Deliver\DeliverRepository\DeliverRepository;
use App\Service\Deliver\DeliverRepository\EloquentDeliverRepository;
use Carbon\Carbon;

class Service
{
    const START_DATE = '2021-01-13';
    private DeliverRepository $deliverRepository;

    public function __construct(DeliverRepository $deliverRepository)
    {
        $this->deliverRepository = $deliverRepository;
    }

    public function show($date): bool|string
    {
        $delivers = $this->deliverRepository->getByDate($date);

        return json_encode($this->calculatePrice($delivers, $date));
    }
    public function calculatePrice($delivers, $date): array
    {
        $answer = [];
        foreach ($delivers as $deliver) {
            $socksCalculator = new SocksCalculator($date, $deliver);
            $deliver['calculated_quantity'] = $socksCalculator->calculateSocksQuantity();
            $deliver['calculated_cost'] = number_format($socksCalculator->calculateCost(), 2);
            $deliver['product'] = $deliver->product;
            $answer[] = $deliver;
        }

        return $answer;
    }

    public static function preorders($date): int
    {
        $startDate = Carbon::parse(self::START_DATE);
        $daysDiff = $startDate->diffInDays($date);
        return Fibonacci::calculate($daysDiff);
    }


}

