$(document).ready(function() {

    $('#btn_edit').click(function() {
        var formData = new FormData($("#form_editJuego")[0]);

        $.ajax({
            url : '../../juego/updateJuego',
            type : 'POST',
            data : formData,
            cache : false,
            contentType : false,
            processData : false,
            success : function(data) {
                //alert(data);
                if (data != '')
                    $('#zona_respuesta').html('<font color="green">Se grabo</font>');
                else
                    $('#zona_respuesta').html('<font color="red">Error al grabar</font>');
            }
        });

    });

});