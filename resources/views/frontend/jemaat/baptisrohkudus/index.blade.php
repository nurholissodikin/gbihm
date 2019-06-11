 <br>
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Baptis Roh Kudus</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <div class="col-md-3">
                <p>Baptis Roh Kudus</p>
              </div>
              <form action="{{url('personal/brk',$personal->idpersonal)}}">
                <div class="col-md-3">
                  <input type="radio" class="minimal" id="contactChoice1" name="brk" value="Sudah" <?php echo ($personal->baptisrohkudus == 'Sudah') ? "checked" : "" ?> >
                  <label for="contactChoice1">Sudah</label><br>
                  <input type="radio" class="minimal" id="contactChoice1" name="brk" value="Belum" <?php echo ($personal->baptisrohkudus == 'Belum') ? "checked" : "" ?>>
                  <label for="contactChoice1">Belum</label>
                </div>
                <div class="col-md-3">
                  <button class="btn btn-primary btn-block-small" type="submit"> save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <br>
    
  