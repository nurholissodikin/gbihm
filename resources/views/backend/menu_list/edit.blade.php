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
               <h3 class="box-title">Edit Data Menu list</h3>
              </div>
              <br>
              <form  action="{{route('menulist.update',$menulist->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Menu</label>
                    <select name="menu" class="form-control select2" style="width: 100%">
                      <option value="">== Pilih Menu ==</option>
                      @foreach ($menu as $data)
                      <option value="{{$data->id}}" <?php if($menulist->menu_id == $data->id)  ? "selected": "" ?>>{{$data->nama}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Parent Menu</label>
                    <select name="parent" class="form-control select2" style="width: 100%">
                      <option value="">== Pilih Menu ==</option>
                      @foreach ($menu as $data)
                      <option value="{{$data->id}}" <?php if($menulist->parent_id == $data->id)  ? "selected": "" ?>>{{$data->nama}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Order</label>
                    <input type="text" name="order" class="form-control" value="{{$menulist->order}}" placeholder="Order">
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
 