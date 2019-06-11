<br>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Komisi</h3>
  </div>
  <br>
  <form action="{{route('komisi.store')}}" enctype="multipart/form-data" method="post" id="formkom">
    {{csrf_field()}}
    <input type="hidden" name="idper" id="id_pekom" value="{{$personal->idpersonal}}">
    
      <div class="col-md-12">
        <div class="col-md-12">
          <div class="form-group">
            <label>Rayon</label>
            <select class="form-control select2" name="rayon" id="rayon" style="width: 100%;" required>
              <option value="" disable="true" selected="true">=== Pilih Rayon ===</option>
              @foreach ($raper as $key => $value)
              <option value="{{$value->idrayon}}">{{ $value->namarayon }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Sub Rayon</label>
            <select class="form-control select2" name="subrayon" id="subrayon" style="width: 100%;" required="">
              <option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Cabang</label>
            <select class="form-control select2" name="cabang" id="cabang" style="width: 100%;" required="">
             <option value="" disable="true" selected="true">=== Pilih Cabang ===</option>
           </select>
         </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Komisi</label>
            <select class="form-control select2" name="komisi" style="width: 100%;">
             <option value="" selected="true">=== Pilih Komisi ===</option>
             <option value="Youth" >Youth</option>
             <option value="Wanita" >Wanita</option>
             <option value="Umas" >Umas</option>
             <option value="Proandbiz" >Proandbiz</option>
             <option value="Wanitamandiri" >Wanitamandiri</option>
             </select>
          </div>
        </div>        
      </div>
      <div class="demo-button">
        <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
      </div>
  </form>
</div>
<br>
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Histori Komisi</h3>
    <div class="box-tools pull-right">
      <a href="{{url('komisi/mutasi/'.$personal->idpersonal)}}" type="submit"  class="btn btn-primary btn-xs " ><i class="fa fa-pencil"> Mutasi</i></a>
    </div>
  </div>
  <div class="box-body">
    <table  class="table table-bordered table-striped" >
      <thead>
        <tr>
          <th>No</th>
          <th>Komisi</th>
          <th>Rayon</th>
          <th>Sub Rayon</th>
          <th>Cabang</th>
          <th>Jadwal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="kom_data">
        @php $no = 1 @endphp
        @foreach($komisi as $item)
        <tr class="item{{$item->id}}">
          <td>{{$no}}</td>
          <td>{{$item->komisi}}</td>
          <td>{{$item->rayon['namarayon']}}</td>
          <td>{{$item->subrayon['namasubrayon'] }}</td>
          <td>{{$item->cabang['namacabang']}}</td>
          <td>{{$item->jadwal}}</td>
          <td>
           
            <button data-target="#edit{{$item->id}}" data-toggle="modal" type="submit" class="btn btn-xs btn-warning">
              <span class="glyphicon glyphicon-edit"></span> 
            </button>     
            <button class="btn btn-xs btn-danger" onclick="del_kom({{$item->id}} )">
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
  @foreach ($komisi as $kom)
<div id="edit{{$kom->id}}" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>Edit Komisi</h4>
          </div>
          <form action="{{route('komisi.update',$kom->id)}}" class="form-horizontal" method="post" id="editformkom">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" class="form-control" value="{{$kom->id}}" name="id" disabled>            
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-sm-12">
                    <br>
                    <label>Komisi</label>
                    <select class="form-control select2" name="komisi" id="komisi" style="width: 100%;">
                     <option value="" selected="true">=== Pilih Komisi ===</option>
                     <option value="Youth" <?php echo ($kom->komisi == 'Youth') ? "selected": "" ?>>Youth</option>
                     <option value="Wanita" <?php echo ($kom->komisi == 'Wanita') ? "selected": "" ?>>Wanita</option>
                     <option value="Umas" <?php echo ($kom->komisi == 'Umas') ? "selected": "" ?>>Umas</option>
                     <option value="Proandbiz" <?php echo ($kom->komisi == 'Proandbiz') ? "selected": "" ?>>Proandbiz</option>
                     <option value="Wanitamandiri" <?php echo ($kom->komisi == 'Wanitamandiri') ? "selected": "" ?>>Wanitamandiri</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label>Rayon</label>
                    <select class="form-control select2" name="rayon" id="rayon3" style="width: 100%;">
                      <option value="" disable="true" selected="true">=== Pilih Rayon ===</option>
                      @foreach ($raper as $key => $value)
                    
                      <option value="{{$value->idrayon}}" selected>{{ $value->namarayon }}</option>
                    
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label>Sub Rayon</label>
                      <select class="form-control select2" name="subrayon" id="subrayon3" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>
                        @php
                        $subray = app()->make('App\Http\Controllers\CountryController')->fill_subrayon2($kom->idrayon);
                        @endphp
                        @foreach($subray as $data)
                        <option value="{{$data->idsubrayon}}" @if($data->idsubrayon == $kom->idsubrayon) selected @endif> {{ $data->namasubrayon }}</option>  
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label>Cabang</label>
                      <select class="form-control select2" name="cabang" id="cabang3" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>
                        @php
                        $casub = app()->make('App\Http\Controllers\CountryController')->fill_cabang2($kom->idsubrayon);
                        @endphp
                        @foreach($casub as $data)
                        <option value="{{$data->idcabangranting}}" @if($data->idcabangranting == $kom->idcabangranting) selected @endif> {{ $data->namacabang }}</option>  
                        @endforeach
                      </select>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <div class="col-md-12">
                  <div><br></div>
                  <button type="submit" class="btn btn-success">
                    <span class='glyphicon glyphicon-check'> Update</span>
                  </button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                  </button>
                </div>
              </div>
          </form>
       
        </div>
      </div>
    </div>
 @endforeach