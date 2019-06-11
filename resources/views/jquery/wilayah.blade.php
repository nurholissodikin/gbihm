 <script type="text/javascript">
      $('#provinces').on('change', function(e){
        console.log(e);
        var province_id = e.target.value;
        $.get("{{url('/json-regencies?province_id=')}}" + province_id,function(data) {
          console.log(data);
          $('#regencies').empty();
          $('#regencies').append('<option value="" disable="true" selected="true">=== Pilih Kabupaten/Kota ===</option>');

          $('#districts').empty();
          $('#districts').append('<option value="" disable="true" selected="true">=== Pilih Kecamatan ===</option>');

          $('#villages').empty();
          $('#villages').append('<option value="" disable="true" selected="true">=== Pilih Kelurahan ===</option>');

          $.each(data, function(index, regenciesObj){
            $('#regencies').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.name +'</option>');
          })
        });
      });

      $('#regencies').on('change', function(e){
        console.log(e);
        var regencies_id = e.target.value;
        $.get("{{url('/json-districts?regencies_id=')}}" + regencies_id,function(data) {
          console.log(data);
          $('#districts').empty();
          $('#districts').append('<option value="" disable="true" selected="true">=== Pilih Kecamatan ===</option>');

          $.each(data, function(index, districtsObj){
            $('#districts').append('<option value="'+ districtsObj.id +'">'+ districtsObj.name +'</option>');
          })
        });
      });

      $('#districts').on('change', function(e){
        console.log(e);
        var districts_id = e.target.value;
        $.get("{{url('/json-village?districts_id=')}}" + districts_id,function(data) {
          console.log(data);
          $('#villages').empty();
          $('#villages').append('<option value="" disable="true" selected="true">=== Pilih Kelurahan ===</option>');

          $.each(data, function(index, villagesObj){
            $('#villages').append('<option value="'+ villagesObj.id +'">'+ villagesObj.name +'</option>');
          })
        });
      });


      $('#provincesa').on('change', function(e){
        console.log(e);
        var province_id = e.target.value;
        $.get("{{url('/json-regencies?province_id=')}}" + province_id,function(data) {
          console.log(data);
          $('#regenciesa').empty();
          $('#regenciesa').append('<option value="" disable="true" selected="true">=== Pilih Kabupaten/Kota ===</option>');

          $('#districtsa').empty();
          $('#districtsa').append('<option value="" disable="true" selected="true">=== Pilih Kecamatan ===</option>');

          $('#villagesa').empty();
          $('#villagesa').append('<option value="" disable="true" selected="true">=== Pilih Kelurahan ===</option>');

          $.each(data, function(index, regenciesObj){
            $('#regenciesa').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.name +'</option>');
          })
        });
      });

      $('#regenciesa').on('change', function(e){
        console.log(e);
        var regencies_id = e.target.value;
        $.get('/json-districts?regencies_id=' + regencies_id,function(data) {
          console.log(data);
          $('#districtsa').empty();
          $('#districtsa').append('<option value="" disable="true" selected="true">=== Pilih Kecamatan ===</option>');

          $.each(data, function(index, districtsObj){
            $('#districtsa').append('<option value="'+ districtsObj.id +'">'+ districtsObj.name +'</option>');
          })
        });
      });

      $('#districtsa').on('change', function(e){
        console.log(e);
        var districts_id = e.target.value;
        $.get('/json-village?districts_id=' + districts_id,function(data) {
          console.log(data);
          $('#villagesa').empty();
          $('#villagesa').append('<option value="" disable="true" selected="true">=== Pilih Kelurahan ===</option>');

          $.each(data, function(index, villagesObj){
            $('#villagesa').append('<option value="'+ villagesObj.id +'">'+ villagesObj.name +'</option>');
          })
        });
      });


    </script>