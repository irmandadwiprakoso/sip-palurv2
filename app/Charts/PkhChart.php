<?php

namespace App\Charts;

use App\Models\Pkh;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PkhChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        if (auth()->user()->role == 'user') {
            $pkh = Pkh::get();
            $data = [
                $pkh->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('pkh', '=', 'PKH')->count(),
                $pkh->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('bpnt', '=', 'BPNT')->count(),
                $pkh->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('pbi', '=', 'PBI')->count(),
                $pkh->where('village_id', '=', auth()->user()->village_id)->where('rw_id', '=', auth()->user()->rw_id)->where('non_bansos', '=', 'NON BANSOS')->count(),
            ];
        }

        if (auth()->user()->role == 'struktural' || auth()->user()->role == 'permasbang'|| auth()->user()->role == 'kessos' ) {
            $pkh = Pkh::get();
            $data = [
                $pkh->where('village_id', '=', auth()->user()->village_id)->where('pkh', '=', 'PKH')->count(),
                $pkh->where('village_id', '=', auth()->user()->village_id)->where('bpnt', '=', 'BPNT')->count(),
                $pkh->where('village_id', '=', auth()->user()->village_id)->where('pbi', '=', 'PBI')->count(),
                $pkh->where('village_id', '=', auth()->user()->village_id)->where('non_bansos', '=', 'NON BANSOS')->count(),
            ];
        }

        if (auth()->user()->role == 'superadmin') {
            $pkh = Pkh::get();
            $data = [
                $pkh->where('pkh', '=', 'PKH')->count(),
                $pkh->where('bpnt', '=', 'BPNT')->count(),
                $pkh->where('pbi', '=', 'PBI')->count(),
                $pkh->where('non_bansos', '=', 'NON BANSOS')->count(),
            ];
        }

        $label = [
            'PKH',
            'BPNT',
            'PBI',
            'NON BANSOS',
        ];

        return $this->chart->donutChart()
            ->setTitle('Data DTKS')
            ->addData($data)
            ->setWidth(400)
            ->setHeight(400)
            ->setLabels($label);
    }
}
