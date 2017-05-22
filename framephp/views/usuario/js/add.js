if(typeof jQuery != 'undefined'){
	$(document).ready(inicializadora);
	
	function inicializadora(){
		$('#btn_registrar').click(validacion);
	}
	function validacion(){
		var usuario = $('#usuario').val();
		var nombre = $('#nombre').val();
		var email = $('#email').val();
		var clave1 = $('#clave1').val();
		var clave2 = $('#clave2').val();
		var rol = $('#rol').val();
		
		if(usuario == ''){
//			var mensaje= '<p>Debe ingresar usuario</p>'
//			$('#validacion').html(mensaje);
			alert('ingrese usuario');
		}else if(nombre == ''){
			alert('ingrese nombre')
		}else if(email == ''){
			alert('ingrese email')
		}else if(clave1 == ''){
			alert('ingrese clave1')
		}else if(clave2 == ''){
			alert('ingrese clave2')
		}else if(clave1 != clave2){
			alert('Las claves no coinciden');
		}else {
			//$('#form_addusuario').submit();
			//$.POST se utiliza para llamar a un script que este del lado del servidor
			$.post('../usuario/recepcionUsuario',{
				usuario : usuario,
				nombre : nombre,
				email : email,
				clave1 : clave1,
				rol : rol
			}, function (respuesta) {
				console.log(respuesta);
				if(respuesta == 'Ok'){
					$('#zona_respuesta').html('<font color="green">Se grabo</font>');
				}else {
					$('#zona_respuesta').html('<font color="red">Error al grabar</font>');
				}
			});
		
		}
		
	}
}else {
	alert('No cargo jQuery');
}