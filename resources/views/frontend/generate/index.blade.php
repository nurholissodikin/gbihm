@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1 class="pull-left">
        Generate User
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <button type="button" class="btn btn-primary"  id="deGenerate" data-toggle="modal" data-target="#modal-existing">
            Generate User Existing
          </button>
          <button type="button" class="btn btn-primary" data-toggle="modal" id="deGeneratea" data-target="#modal-baru">
            Generate User Baru
          </button>

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>ID Personal</th>
                      <th>Aksi</th>
                    </tr>

                  </thead>
                  <tbody>
                   <?php $no = 0;?>
                   @foreach($user as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$data->username}}</td>
                      @if ($data->idpersonal != null)
                      <td>-</td>
                      @else
                      <td>{{$data->pw_text}}</td>
                      @endif
                      <td>{{$data->idpersonal}}</td>
                      <td>
                        <a href="{{ url('user/show',$data->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('user/edit',$data->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <button class="btn btn-xs btn-danger" onclick="del_person({{$data->id}})">
                          <span class="glyphicon glyphicon-trash"></span> 
                        </button>
                      </td>            
                    </tr>
                   @endforeach 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal-existing">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Generate User Existing</h4>
            </div>
            <form action="{{url('generate/store')}}" method="POST">
              {{csrf_field()}}
              <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="form-control-label">Username</label>
                  <input type="text" id="id_personal" name="username" class="form-control" readonly="">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="form-control-label">Password</label>
                   <input type="text" name="pw" id="pw" class="form-control" readonly="">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="form-control-label">ID Personal</label>
                  <select class="form-control select2" name="idpersonal" id="personal_eks" style="width: 100%" onchange="username_a()">
                    @foreach($personal as $data)
                      <option value="{{$data->idpersonal}}">{{$data->idpersonal}} || {{$data->namalengkap}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="message-text" class="form-control-label">Form</label>
                  <select class="form-control select2" name="form" style="width: 100%">
                    <option value="PENGERJA">PENGERJA</option>
                    <option value="COOL">COOL</option>
                    <option value="TAMU">TAMU</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-baru">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <form action="{{url('generate/store')}}" method="POST">
              {{csrf_field()}}
              <div class="modal-body">
                <div class="form-group">
                  <label for="recipient-name" class="form-control-label">Username</label>
                  <input type="text" name="username" id="rtsa" class="form-control" readonly="">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="form-control-label">Password</label>
                   <input type="text" name="pw" id="pwa" class="form-control" readonly="">
                </div>
                <div class="form-group">
                  <label for="message-text" class="form-control-label">Form</label>
                  <select class="form-control select2" name="form" style="width: 100%">
                    <option value="PENGERJA">PENGERJA</option>
                    <option value="COOL">COOL</option>
                    <option value="TAMU">TAMU</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </section>
  </div>
@endsection
@push('scriptz')
<script type="text/javascript">
  function del_person(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Personal ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('delete_user/pelayan/')}}"+"/"+id,function(){
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

  function username_a(){
    var id_suami_personal = $('#personal_eks').val();
    if(id_suami_personal != null){
      $.get("{{url('bap_personal/get')}}"+"/"+id_suami_personal,function(value){
        $('#id_personal').val(value.id_personal);
      })
    }
    if(!id_suami_personal){
      $('#id_personal').val(null);
    }
  }


  $(function () {
    $("#deGenerate").click(function (e) {
      e.preventDefault();
      var data = [];
      $.ajax({
        type: 'GET',
        url: '{{url('random')}}',
        data: [],
        success: function (data) {
         $("#rts").val(data.rtr);
         $("#pw").val(data.pw);
       }
     });
    });
    $("#deGeneratea").click(function (e) {
      e.preventDefault();
      var data = [];
      $.ajax({
        type: 'GET',
        url: '{{url('random')}}',
        data: [],
        success: function (data) {
         $("#rtsa").val(data.rtr);
         $("#pwa").val(data.pw);
       }
     });
    });
  });
</script>
@endpush