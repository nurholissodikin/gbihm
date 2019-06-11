$(document).ready(function() {
 
    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addItem',
            data: {
                '_token': $('input[idpersonal=_token]').val(),
                'idpersonal': $('input[idpersonal=idpersonal]').val()
            },
            success: function(data) {
                if ((data.errors)){
                  $('.error').removeClass('hidden');
                    $('.error').text(data.errors.idpersonal);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.idpersonal + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.idpersonal + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.idpersonal + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },

        });
        $('#idpersonal').val('');
    });
  
});
