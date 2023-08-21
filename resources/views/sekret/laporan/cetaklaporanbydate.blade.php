<!DOCTYPE html>
<html lang="en">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
      <meta name="author" content="setda kota bekasi" />
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
      td.style1 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      th.style1 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      td.style2 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      th.style2 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      td.style3 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      th.style3 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      td.style4 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      th.style4 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      td.style5 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      th.style5 { vertical-align:middle; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      td.style6 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      th.style6 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      td.style7 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Bookman Old Style'; font-size:14pt; background-color:white }
      th.style7 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Bookman Old Style'; font-size:14pt; background-color:white }
      td.style8 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      th.style8 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      td.style9 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      th.style9 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; font-weight:bold; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      td.style10 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      th.style10 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; font-weight:bold; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      td.style11 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      th.style11 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      td.style12 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      th.style12 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      td.style13 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      th.style13 { vertical-align:middle; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Bookman Old Style'; font-size:12pt; background-color:white }
      table.sheet0 col.col0 { width:38.63333289pt }
      table.sheet0 col.col1 { width:62.35555484pt }
      table.sheet0 col.col2 { width:145.72222055pt }
      table.sheet0 col.col3 { width:79.29999909pt }
      table.sheet0 col.col4 { width:56.93333268pt }
      table.sheet0 col.col5 { width:25.75555526pt }
      table.sheet0 col.col6 { width:151.82222048pt }
      table.sheet0 col.col7 { width:70.48888808pt }
      table.sheet0 col.col8 { width:108.4444432pt }
      table.sheet0 col.col9 { width:43.37777728pt }
      table.sheet0 tr { height:15pt }
      table.sheet0 tr.row0 { height:18pt }
      table.sheet0 tr.row1 { height:18pt }
      table.sheet0 tr.row2 { height:18pt }
      table.sheet0 tr.row9 { height:29.25pt }
      table.sheet0 tr.row10 { height:99.95pt }
      table.sheet0 tr.row11 { height:21.75pt }
    </style>
  </head>

  <body>
<style>
@page { margin-left: 0.78in; margin-right: 0.7in; margin-top: 0.3in; margin-bottom: 0.75in; }
body { margin-left: 0.78in; margin-right: 0.7in; margin-top: 0.3in; margin-bottom: 0.75in; }
</style>
    <table cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <col class="col8">
        <col class="col9">
        <tbody>
          <tr class="row0">
            <td class="column1 style7 s style7" colspan="10">LAPORAN KEGIATAN HARIAN SATGAS PAMOR RW {{ Auth::user()->rw->rw }}</td>
          </tr>
          <tr class="row1">
            <td class="column1 style7 s style7" colspan="10">KELURAHAN {{ Auth::user()->village->name }} KECAMATAN {{ Auth::user()->district->name }}</td>
          </tr>
          <tr class="row2">
            <td class="column1 style7 s style7" colspan="10">TAHUN {{ date('Y') }}</td>
          </tr>
          <tr class="row3">
          </tr>
          <tr class="row4">
            <td class="column0 style1 null"></td>
            <td class="column1 style1 s">NAMA</td>
            <td class="column2 style1 s" colspan="4">: {{ Auth::user()->name }} </td>
            <td class="column3 style1 null"></td>
            <td class="column4 style1 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 null"></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style1 null"></td>
            <td class="column9 style1 null"></td>
          </tr>
          <tr class="row5">
            <td class="column0 style1 null"></td>
            <td class="column1 style1 s">RW</td>
            <td class="column2 style1 s">: {{ Auth::user()->rw->rw }} </td>
            <td class="column3 style1 null"></td>
            <td class="column4 style1 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 null"></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style1 null"></td>
            <td class="column9 style1 null"></td>
          </tr>
          <tr class="row6">
            <td class="column0 style1 null"></td>
            <td class="column1 style1 s">HARI</td>
            <td class="column2 style1 s">: {{ \Carbon\Carbon::parse($cetaklaporanbydate[0]->tanggal)->isoformat('dddd') }}</td>
            <td class="column3 style1 null"></td>
            <td class="column4 style1 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 null"></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style1 null"></td>
            <td class="column9 style1 null"></td>
          </tr>
          <tr class="row7">
            <td class="column0 style1 null"></td>
            <td class="column1 style1 s">TANGGAL</td>
            <td class="column2 style1 s">: {{ \Carbon\Carbon::parse($cetaklaporanbydate[0]->tanggal)->isoformat('D MMMM Y') }}</td>
            <td class="column3 style1 null"></td>
            <td class="column4 style1 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 null"></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style1 null"></td>
            <td class="column9 style1 null"></td>
          </tr>
          <tr class="row8">
          </tr>
          <tr class="row9">
            <td class="column0 style2 s">NO</td>
            <td class="column1 style9 s style10" colspan="2">URAIAN KEGIATAN</td>
            <td class="column3 style2 s">BIDANG </td>
            <td class="column4 style2 s">JUMLAH</td>
            <td class="column5 style2 s">RT </td>
            <td class="column6 style2 s style10" >KETERANGAN</td>
            <td class="column7 style2 s">FOTO</td>
            <td class="column8 style8 s">STEMPEL DAN TTD RW</td>
            <td class="column9 style1 null"></td>
          </tr>
          @foreach ($cetaklaporanbydate as $pamor)
          <tr class="row10">
            <td class="column0 style4 null style12" > {{ $loop->iteration }}</td>
            <td class="column1 style4 null style12" colspan="2"> {{ $pamor->kegiatan }}</td>
            <td class="column3 style4 null style12" > {{ $pamor->seksi->seksi }} </td>
            <td class="column4 style4 null style12" > {{ $pamor->jumlah }} </td>
            <td class="column5 style4 null style12"> {{ $pamor->rt->rt }} </td>
            <td class="column6 style4 null style12" > {{ $pamor->keterangan }}</td>
            <td class="column7 style4 null style12"> <img src="{{ asset('images/LaporanHarian/' . $pamor->foto) }}" width="80" height="80"></img></td>
            <td class="column8 style4 null"></td>
            <td class="column9 style1 null"></td>
          </tr>
          @endforeach
          <tr class="row11">
          </tr>
          <tr class="row12">
            <td class="column0 style6 null"></td>
            <td class="column1 style6 null"></td>
            <td class="column2 style6 null"></td>
            <td class="column3 style6 null"></td>
            <td class="column4 style6 null"></td>
            <td class="column5 style6 null"></td>
            <td class="column6 style6 s style1" colspan="2"><b>PETUGAS PAMOR RW {{ Auth::user()->rw->rw }}</b> </td>
            <td class="column7 style6 null"></td>
            <td class="column8 style6 null"></td>
            <td class="column9 style6 null"></td>
          </tr>
          <tr class="row13">
          </tr>
          <tr class="row14">
          </tr>
          <tr class="row15">
          </tr>
          <tr class="row16">
            <td class="column0 style1 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style1 null"></td>
            <td class="column4 style1 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 s" colspan="4"><b><u>{{ Auth::user()->name }}</b></u></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style1 null"></td>
            <td class="column9 style1 null"></td>
          </tr>
          <tr class="row17">
            <td class="column0 style1 null"></td>
            <td class="column1 style1 null"></td>
            <td class="column2 style1 null"></td>
            <td class="column3 style1 null"></td>
            <td class="column4 style1 null"></td>
            <td class="column5 style1 null"></td>
            <td class="column6 style1 s" colspan="2"><b>NIK. {{$cetaklaporanbydate[0]->user->tkk->id}}</b></td>
            <td class="column7 style1 null"></td>
            <td class="column8 style1 null"></td>
            <td class="column9 style1 null"></td>
          </tr>
        </tbody>
    </table>
  </body>
</html>
