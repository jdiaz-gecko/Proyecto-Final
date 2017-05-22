$(document).ready(function() {

	$('#btn_edit').click(function() {
		var formData = new FormData($("#form_editusuario")[0]);

		$.ajax({
			url : '../../usuario/updateUsuario',
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
/*
 * $(document).ready(inicializadora);
 * 
 * function inicializadora(){ $('#btn_edit').click(validacion); } function
 * validacion(){ var usuario = $('#usuario').val(); var nombre =
 * $('#nombre').val(); var email = $('#email').val(); var rol = $('#rol').val();
 * 
 * if(usuario == ''){ // var mensaje= '<p>Debe ingresar usuario</p>' //
 * $('#validacion').html(mensaje); alert('ingrese usuario'); }else if(nombre ==
 * ''){ alert('ingrese nombre') }else if(email == ''){ alert('ingrese email') }
 * else { //$('#form_addusuario').submit(); //$.POST se utiliza para llamar a un
 * script que este del lado del servidor $.post('../usuario/editar',{ usuario :
 * usuario, nombre : nombre, email : email, rol : rol }, function (respuesta) {
 * console.log(respuesta); if(respuesta == 'Ok'){ $('#zona_respuesta').html('<font
 * color="green">Se grabo</font>'); }else { $('#zona_respuesta').html('<font
 * color="red">Error al grabar</font>'); } });
 *  }
 *  }
 */