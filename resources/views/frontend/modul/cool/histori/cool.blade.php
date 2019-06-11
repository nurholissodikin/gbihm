@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Histori COOL</b>
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
                <h3 class="box-title ">Histori Data COOL Create / Update</h3>
                <a type="submit" class="btn btn-primary pull-right btn-xs" VALUE="Back" onClick="history.go(-1);"> Kembali</a>
              </center>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example2" cellspacing="0">
                  <thead>
                    <tr>
                     <th>No</th>
                      <th>Tipe COOL</th>
                      <th>Gembala COOL</th>
                      <th>Lokasi COOL</th>
                      <th>Kabupaten / Kota</th>
                      <th>Provinsi</th>
                      <th>Kodepos</th>
                      <th>User Create </th>
                      <th>User Update</th>
                      <th>Date Create</th>
                      <th>Date Update</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($cool as $item)
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$item->tipecool['tipecool']}}</td>
                      <td>{{$item->personal['namalengkap']}}</td>
                      <td>{{$item->lokasi}}</td>
                      <td>{{$item->kabkotaa['name']}}</td>
                      <td>{{$item->provinsia['name']}}</td>
                      <td>{{$item->kodepos}}</td>
                      <td>{{$item->user_created['name']}} </td>
                      <td>{{$item->user_updated['name']}}</td>
                      <td>
                        @php
                        $a = $item->created_at;   
                        $tanggal = date('d F Y, h:i:s', strtotime($a));
                        @endphp
                        {{$tanggal}}</td>
                      <td>
                        @php
                        $a = $item->updated_at;   
                        $tanggala = date('d F Y, h:i:s', strtotime($a));
                        @endphp
                        {{$tanggala}}</td>
                    </tr> 
                    @php $no++ @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection 