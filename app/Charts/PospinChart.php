<?php

namespace App\Charts;

use App\Models\Pospin;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PospinChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\pieChart
    {
        $pospin = Pospin::get();
        $data = [
            $pospin->where('pin_1', '=', 'Sudah')->count(),
            $pospin->where('pin_1', '=', 'Belum')->count(),
            $pospin->where('pin_2', '=', 'Sudah')->count(),
            $pospin->where('pin_2', '=', 'Belum')->count(),
        ];

        $label = [
            'Sudah Pin Polio 1',
            'Belum Pin Polio 1',
            'Sudah Pin Polio 2',
            'Belum Pin Polio 2',
        ];

        return $this->chart->pieChart()
            ->setTitle('Data Pos Sub Pin Polio Nopv2')
            ->addData($data)
            ->setLabels($label)
            ->setWidth(400)
            ->setHeight(400);
            // ->setColors(['#ffc63b', '#ff6384']);
    }
}
