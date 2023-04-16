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

    public function build(): \ArielMejiaDev\LarapexCharts\donutChart
    {
        $pospin = Pospin::get();
        $data = [
            $pospin->where('pin_1', '=', 'Sudah')->count(),
            $pospin->where('pin_1', '=', 'Belum')->count(),
        ];

        $label = [
            'Sudah Pin Polio',
            'Belum Pin Polio',
        ];

        return $this->chart->donutChart()
            ->setTitle('Data Pos Sub Pin Polio Kelurahan Jakasampurna')
            ->addData($data)
            ->setLabels($label)
            ->setWidth(500)
            ->setHeight(500)
            ->setColors(['#ffc63b', '#ff6384']);
    }
}
