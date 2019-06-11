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
               <h3 class="box-title">Tambah Data Menu list</h3>
              </div>
              <br>
              <form  action="{{route('menulist.store')}}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Menu</label>
                    <select name="menu" class="form-control select2" style="width: 100%">
                      <option value="">== Pilih Menu ==</option>
                      @foreach ($menu as $data)
                      <option value="{{$data->id}}">{{$data->nama}}</option>
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
                      <option value="{{$data->id}}">{{$data->nama}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Order</label>
                    <input type="text" name="order" class="form-control" placeholder="Icon">
                  </div>                  
                </div>
                <div class="demo-button">
                  <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                </div>
              </form>    
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Menu List</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example3" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Menu</th>
                      <th>Parent Menu</th>
                      <th>Order</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1 @endphp
                    @foreach($menulist as $item)
                    <tr >
                      <td>{{$no}}</td>
                      <td>{{$item->menu['nama']}}</td>
                      <td>{{$item->parent['nama']}}</td>
                      <td>{{$item->order}}</td>
                      <td>
                        <a href="{{ route('menulist.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <button class="btn btn-xs btn-danger" onclick="del_menulist({{$item->id}})">
                          <span class="glyphicon glyphicon-trash"></span> 
                        </button>
                      </td>
                    </tr>
                    @php $no++ @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @php
            $resource = [];
            $data = \App\Vmenu::all();
            for($i = 0; $i < count($data); $i++){
              $result = $data[$i];
              $id = $result['id'];

              if($result['parent_id'] != null){

                if(!array_key_exists($id,array_column($resource,'id'))){
                  $resource[$id]['id'] = $id;
                  $resource[$id]['parent_id'] = $result['parent_id'];
                  $resource[$id]['parent'] = $result['nama_parent'].$result['parent_id'];
                  $resource[$id]['child'][] = $result['nama'].$result['menu_id'];
                  $resource[$id]['child'][] = $result['url'];
                  $resource[$id]['child'][] = $result['icon'];
                }else{
                  $resource[$id]['child'][] = $result['nama'].$result['menu_id'];
                }
              }else{
                  $resource[$id]['id'] = $id;
                  $resource[$id]['single'] = $result['nama'].$result['menu_id'];
              }
              
            }
dd($resource)
          
            @endphp
            <ul>
              <ul>
                <li class="treeview">
                  <a href="{{url($resource[$id]['child'][] = $result['url'])}}">
                    <i class="fa {{$resource[$id]['child'][] = $result['icon']}}"></i>
                    <span>{{$resource[$id]['child'][] = $result['nama']}}</span>
                  </a>

                </li>
                <li>
                  <a href="{{ $resource[$id]['child'][] = $result['nama'].$result['menu_id'] }}">{{ $result['nama_parent'] }}</a>

                </li>
                
              </ul>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection 
 @push('scriptz')
<script type="text/javascript">
  function del_menulist(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Menu List?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('menulist/delete')}}"+"/"+id,function(){
          swal({
            title: "Berhasil Dihapus",
            icon: "success",

          });
          location.reload();
        }).fail(function() {
          alert( "error" );
        });
      }
    });
  }
</script>
@endpush 