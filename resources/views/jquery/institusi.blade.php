<script type="text/javascript">
  $('#rayon').on('change', function(e){
        console.log(e);
        var idrayon = e.target.value;
        $.get("{{url('/json-subrayon?idrayon=')}}" + idrayon,function(data) {
          console.log(data);
          $('#subrayon').empty();
          $('#subrayon').append('<option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>');

          $('#cabang').empty();
          $('#cabang').append('<option value="" disable="true" selected="true">=== Pilih Cabang ===</option>');

          $.each(data, function(index, subrayonObj){
            $('#subrayon').append('<option value="'+ subrayonObj.idsubrayon +'">'+ subrayonObj.namasubrayon +'</option>');
          })
        });
      });

      $('#subrayon').on('change', function(e){
        console.log(e);
        var idsubrayon = e.target.value;
        $.get("{{url('/json-cabang?idsubrayon=')}}" + idsubrayon,function(data) {
          console.log(data);
          $('#cabang').empty();
          $('#cabang').append('<option value="" disable="true" selected="true">=== Pilih Cabang ===</option>');

          $.each(data, function(index, cabangObj){
            $('#cabang').append('<option value="'+ cabangObj.idcabangranting +'">'+ cabangObj.namacabang +'</option>');
          })
        });
      });

    

      $('#rayon2').on('change', function(e){
        console.log(e);
        var idrayon = e.target.value;
        $.get("{{url('/json-subrayon?idrayon=')}}" + idrayon,function(data) {
          console.log(data);
          $('#subrayon2').empty();
          $('#subrayon2').append('<option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>');

          $('#cabang2').empty();
          $('#cabang2').append('<option value="" disable="true" selected="true">=== Pilih Cabang ===</option>');

          $.each(data, function(index, subrayonObj){
            $('#subrayon2').append('<option value="'+ subrayonObj.idsubrayon +'">'+ subrayonObj.namasubrayon +'</option>');
          })
        });
      });

      $('#subrayon2').on('change', function(e){
        console.log(e);
        var idsubrayon = e.target.value;
        $.get("{{url('/json-cabang?idsubrayon=')}}" + idsubrayon,function(data) {
          console.log(data);
          $('#cabang2').empty();
          $('#cabang2').append('<option value="" disable="true" selected="true">=== Pilih Cabang ===</option>');

          $.each(data, function(index, cabangObj){
            $('#cabang2').append('<option value="'+ cabangObj.idcabangranting +'">'+ cabangObj.namacabang +'</option>');
          })
        });
      });

       $('#rayon3').on('change', function(e){
        console.log(e);
        var idrayon = e.target.value;
        $.get("{{url('/json-subrayon?idrayon=')}}" + idrayon,function(data) {
          console.log(data);
          $('#subrayon3').empty();
          $('#subrayon3').append('<option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>');

          $('#cabang3').empty();
          $('#cabang3').append('<option value="" disable="true" selected="true">=== Pilih Cabang ===</option>');

          $.each(data, function(index, subrayonObj){
            $('#subrayon3').append('<option value="'+ subrayonObj.idsubrayon +'">'+ subrayonObj.namasubrayon +'</option>');
          })
        });
      });

      $('#subrayon3').on('change', function(e){
        console.log(e);
        var idsubrayon = e.target.value;
        $.get("{{url('/json-cabang?idsubrayon=')}}" + idsubrayon,function(data) {
          console.log(data);
          $('#cabang3').empty();
          $('#cabang3').append('<option value="" disable="true" selected="true">=== Pilih Cabang ===</option>');

          $.each(data, function(index, cabangObj){
            $('#cabang3').append('<option value="'+ cabangObj.idcabangranting +'">'+ cabangObj.namacabang +'</option>');
          })
        });
      });
</script>