@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Menu
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <!-- /.box-header -->
             <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Tambah Data Menu</h3>
              </div>
              <br>
              <form  action="{{route('menu.update',$menu->id)}}" enctype="multipart/form-data" method="post">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="{{$menu->nama}}" class="form-control" placeholder="Nama">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Url</label>
                    <input type="text" name="url" value="{{$menu->url}}" class="form-control" placeholder="Url">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Icon</label>
                    <div class="input-group">
                      <input data-placement="bottomRight" name="icon" class="form-control icp icp-auto" value="{{$menu->icon}}" type="text"/>
                      <span class="input-group-addon"></span>
                    </div>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>List Order</label>
                    <input type="text" name="list_order" class="form-control" value="{{$menu->list_order}}" placeholder="List Order">
                  </div>                  
                </div>
                <div class="demo-button">
                  <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                </div>
              </form>    
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection 