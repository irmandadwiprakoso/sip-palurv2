<!DOCTYPE html>
<html lang="en">

  <head>
    <style type="text/css">
      html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:11pt; background-color:white }
      a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
      a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
      div.comment { display:none }
      table { border-collapse:collapse; page-break-after:always }
      .gridlines td { border:1px dotted black }
      .gridlines th { border:1px dotted black }
      .b { text-align:center }
      .e { text-align:center }
      .f { text-align:right }
      .inlineStr { text-align:left }
      .n { text-align:right }
      .s { text-align:left }
      td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
      td.style1 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      th.style1 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      td.style2 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      th.style2 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      td.style3 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      th.style3 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      td.style4 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:18pt; background-color:white }
      th.style4 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:18pt; background-color:white }
      td.style5 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      th.style5 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      td.style6 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      th.style6 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      td.style7 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      th.style7 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      td.style8 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      th.style8 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      td.style9 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      th.style9 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      td.style10 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      th.style10 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Arial'; font-size:12pt; background-color:white }
      table.sheet0 col.col0 { width:54.2222216pt }
      table.sheet0 col.col1 { width:145.72222055pt }
      table.sheet0 col.col2 { width:100.98888773pt }
      table.sheet0 col.col3 { width:143.68888724pt }
      table.sheet0 col.col4 { width:75.23333247pt }
      table.sheet0 col.col5 { width:180.96666459pt }
      table.sheet0 col.col6 { width:135.555554pt }
      table.sheet0 col.col7 { width:43.37777728pt }
      table.sheet0 tr { height:15pt }
      table.sheet0 tr.row0 { height:23.25pt }
      table.sheet0 tr.row1 { height:23.25pt }
      table.sheet0 tr.row2 { height:23.25pt }
      table.sheet0 tr.row4 { height:24.75pt }
      table.sheet0 tr.row5 { height:24.95pt }
      table.sheet0 tr.row6 { height:24.95pt }
      table.sheet0 tr.row7 { height:24.95pt }
      table.sheet0 tr.row9 { height:29.25pt }
      table.sheet0 tr.row10 { height:34.5pt }
      table.sheet0 tr.row11 { height:34.5pt }
      table.sheet0 tr.row12 { height:34.5pt }
      table.sheet0 tr.row13 { height:34.5pt }
      table.sheet0 tr.row14 { height:34.5pt }
      table.sheet0 tr.row15 { height:21.75pt }
      table.sheet0 tr.row16 { height:50.1pt }
      table.sheet0 tr.row17 { height:42pt }
    </style>
  </head>

  <body>
<style>
@page { margin-left: 0.6in; margin-right: 0.7in; margin-top: 0.2in; margin-bottom: 0.5in; }
body { margin-left: 0.6in; margin-right: 0.7in; margin-top: 0.2in; margin-bottom: 0.5in; }
</style>

<section class="content-info">
    <div class="container paddings-mini">
        <div class="row">
           <div class="col-lg-12">
    <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <tbody>
          <tr class="row0">
            <td class="column0 style4 s style4" colspan="8">LAPORAN KEGIATAN HARIAN SATGAS PAMOR RW {{ Auth::user()->rw->rw }}</td>
          </tr>
          <tr class="row1">
            <td class="column0 style4 s style4" colspan="8">KELURAHAN {{ Auth::user()->village->name }} KECAMATAN {{ Auth::user()->district->name }}</td>
          </tr>
          <tr class="row2">
            <td class="column0 style4 s style4" colspan="8">TAHUN {{ date('Y') }}</td>
          </tr>
          <tr class="row3">
          </tr>
          <tr class="row4">
            <td class="column0 style5 s">NAMA</td>
            <td class="column1 style5 s">: {{ Auth::user()->name }} </td>
          </tr>
          <tr class="row5">
            <td class="column0 style5 s">RW</td>
            <td class="column1 style5 s">: {{ Auth::user()->rw->rw }}</td>
          </tr>
          <tr class="row6">
            @foreach ($cetaklaporanbydate as $pamor)
            <td class="column0 style5 s">HARI</td>
            <td class="column1 style5 s">: {{ \Carbon\Carbon::parse($pamor->tanggal)->isoformat('dddd') }} </td>
            @endforeach
        </tr>
          <tr class="row7">
            @foreach ($cetaklaporanbydate as $pamor)
            <td class="column0 style5 s">TANGGAL</td>
            <td class="column1 style5 s">: {{ \Carbon\Carbon::parse($pamor->tanggal)->isoformat('D MMMM Y') }}</td>
            @endforeach
          </tr>
          <tr class="row8">
          </tr>
          <tr class="row9">
             <td class="column0 style9 s">NO</th>
             <td class="column0 style9 s">URAIAN KEGIATAN</th>
             <td class="column0 style9 s">BIDANG</th>
             <td class="column0 style9 s">JUMLAH</th>
             <td class="column0 style9 s">RT</th>
             <td class="column0 style9 s">KETERANGAN</th>
             <td class="column0 style9 s">FOTO KEGIATAN</th>
             <td class="column0 style9 s">STEMPEL DAN TTD RW</th>
        </tr>
             @foreach ($cetaklaporanbydate as $pamor)
            <tr>
            <td class="style9 s"> {{ $loop->iteration }}</td>
            <td class="style9 s"> {{ $pamor->kegiatan }}</td>
            <td class="style9 s"> {{ $pamor->seksi->seksi }}</td>
            <td class="style9 s"> {{ $pamor->jumlah }}</td>
            <td class="style9 s"> {{ $pamor->rt->rt }}</td>
            <td class="style9 s"> {{ $pamor->keterangan }}</td>
            <td class="style9 s"> <img src="{{ asset('images/LaporanHarian/' . $pamor->foto) }}" width="100" height="100"></img>
            </td>
            <td class="style9 s"> </td>
            </tr>
            @endforeach
          <tr class="row16">
            <td class="column0 style3 null"></td>
            <td class="column1 style3 null"></td>
            <td class="column2 style3 null"></td>
            <td class="column3 style3 null"></td>
            <td class="column4 style3 null"></td>
            <td class="column5 style3 s">PETUGAS PAMOR RW {{ Auth::user()->rw->rw }}</td>
          </tr>
          <tr class="row17">
          </tr>
          <tr class="row18">
          </tr>
          <tr class="row19">
            <td class="column0 style3 null">&nbsp;</td>
            <td class="column1 style3 null">&nbsp;</td>
            <td class="column2 style3 null">&nbsp;</td>
            <td class="column3 style3 null">&nbsp;</td>
            <td class="column4 style3 null">&nbsp;</td>
            <td class="column5 style1 s">{{ Auth::user()->name }}</td>
          </tr>
        </tbody>
    </table>
</div>
</div>
</div>

</section>