<?php

namespace App\Charts;

use App\Models\Pbb;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PbbChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        if (auth()->user()->role == 'superadmin') {
            $pbb = Pbb::get();
            $dataTerhutang= [
                $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('KETERANGAN', '=', 'TERHUTANG')->count(),
            ];
            $pbb = Pbb::get();
            $dataLunas= [
                $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('KETERANGAN', '=', 'LUNAS')->count(),
            ];
        }
        if (auth()->user()->role == 'user') {
            $pbb = Pbb::get();
            $dataTerhutang= [
                $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)
                ->where('rw_id', '=', auth()->user()->rw_id)->where('KETERANGAN', '=', 'TERHUTANG')->count(),
            ];
            $pbb = Pbb::get();
            $dataLunas= [
                $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)
                ->where('rw_id', '=', auth()->user()->rw_id)->where('KETERANGAN', '=', 'LUNAS')->count(),
            ];
        }
        if (auth()->user()->role == 'struktural' || auth()->user()->role == 'permasbang') {
            $pbb = Pbb::get();
            $dataTerhutang= [
                $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->where('KETERANGAN', '=', 'TERHUTANG')->count(),
            ];
            $pbb = Pbb::get();
            $dataLunas= [
                $pbb->where('TAHUN_SPPT', '=', date('Y'))->where('village_id', '=', auth()->user()->village_id)->where('KETERANGAN', '=', 'LUNAS')->count(),
            ];
        }

        return $this->chart->barChart()
        ->setTitle('SPPT PBB')
        ->setSubtitle(date('Y'))
        ->addData('Terhutang', $dataTerhutang)
        ->addData('Lunas', $dataLunas)
        ->setXAxis(['SPPT PBB']);
    }
}
