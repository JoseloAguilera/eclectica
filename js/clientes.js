		$(document).ready(function() {
		    load(1);
		});

		function load(page) {
		    var q = $("#q").val();
		    $("#loader").fadeIn('slow');

			let botonHijos = document.querySelector("#hijos_chk");
			let botonPareja = document.querySelector("#pareja_chk");
			let botonMayorista = document.querySelector("#int_mayorista_chk");
			var chk_h = botonHijos.checked;
			var chk_p = botonPareja.checked;
			var chk_m = botonMayorista.checked;
			
		    $.ajax({
		        url: '../ajax/buscar_cliente.php?action=ajax&page=' + page + '&q=' + q + '&chk_hijos=' + chk_h + '&chk_par=' + chk_p+ '&chk_mayo=' + chk_m,
		        beforeSend: function(objeto) {
		            $('#loader').html('<img src="../../img/ajax-loader.gif"> Cargando...');
		        },
		        success: function(data) {
		            $(".outer_div").html(data).fadeIn('slow');
		            $('#loader').html('');
		            $('[data-toggle="tooltip"]').tooltip({
		                html: true
		            });
		        }
		    })
		}
		$("#guardar_cliente").submit(function(event) {
		    $('#guardar_datos').attr("disabled", true);
		    var parametros = $(this).serialize();
		    $.ajax({
		        type: "POST",
		        url: "../ajax/nuevo_cliente.php",
		        data: parametros,
		        beforeSend: function(objeto) {
		            $("#resultados_ajax").html('<img src="../../img/ajax-loader.gif"> Cargando...');
		        },
		        success: function(datos) {
		            $("#resultados_ajax").html(datos);
		            $('#guardar_datos').attr("disabled", false);
		            load(1);
		            //resetea el formulario
		            $("#guardar_cliente")[0].reset();
		            $("#nombre").focus();
		            //desaparecer la alerta
		            window.setTimeout(function() {
		                $(".alert").fadeTo(200, 0).slideUp(200, function() {
		                    $(this).remove();
		                });
		            }, 2000);
		        }
		    });
		    event.preventDefault();
		})
		$("#editar_cliente").submit(function(event) {
		    $('#actualizar_datos').attr("disabled", true);
		    var parametros = $(this).serialize();
		    $.ajax({
		        type: "POST",
		        url: "../ajax/editar_cliente.php",
		        data: parametros,
		        beforeSend: function(objeto) {
		            $("#resultados_ajax2").html('<img src="../../img/ajax-loader.gif"> Cargando...');
		        },
		        success: function(datos) {
		            $("#resultados_ajax2").html(datos);
		            $('#actualizar_datos').attr("disabled", false);
		            load(1);
		            //desaparecer la alerta
		            window.setTimeout(function() {
		                $(".alert").fadeTo(200, 0).slideUp(200, function() {
		                    $(this).remove();
		                });
		            }, 2000);
		        }
		    });
		    event.preventDefault();
		})
		
		$('#dataDelete').on('show.bs.modal', function(event) {
		    var button = $(event.relatedTarget) // Botón que activó el modal
		    var id = button.data('id') // Extraer la información de atributos de datos
		    var modal = $(this)
		    modal.find('#id_cliente').val(id)
		})
		$("#eliminarDatos").submit(function(event) {
		    var parametros = $(this).serialize();
		    $.ajax({
		        type: "POST",
		        url: "../ajax/eliminar_cliente.php",
		        data: parametros,
		        beforeSend: function(objeto) {
		            $(".datos_ajax_delete").html('<img src="../../img/ajax-loader.gif"> Cargando...');
		        },
		        success: function(datos) {
		            $(".datos_ajax_delete").html(datos);
		            $('#dataDelete').modal('hide');
		            load(1);
		            //desaparecer la alerta
		            window.setTimeout(function() {
		                $(".alert").fadeTo(200, 0).slideUp(200, function() {
		                    $(this).remove();
		                });
		            }, 2000);
		        }
		    });
		    event.preventDefault();
		});



		let botonHijos = document.querySelector("#mod_hijos");
		let botonPareja = document.querySelector("#mod_pareja");
		let botonMayorista = document.querySelector("#mod_int_mayorista");

		function obtener_datos(id) {
		    var nombre_cliente = $("#nombre_cliente" + id).val();
		    var fiscal_cliente = $("#fiscal_cliente" + id).val();
		    var telefono_cliente = $("#telefono_cliente" + id).val();
		    var email_cliente = $("#email_cliente" + id).val();
		    var direccion_cliente = $("#direccion_cliente" + id).val();
		    var status_cliente = $("#status_cliente" + id).val();
		    var facebook = $("#facebook" + id).val();
		    var instagram = $("#instagram" + id).val();
		    var twitter = $("#twitter" + id).val();
		    var tiktok = $("#tiktok" + id).val();
		    var fec_nacimiento = $("#fec_nacimiento" + id).val();
		    var ciudad = $("#ciudad" + id).val();
		    var canal_comunicacion = $("#canal_comunicacion" + id).val();
		    var hijos = $("#hijos" + id).val();
		    var pareja = $("#pareja" + id).val();
		    var int_mayorista = $("#int_mayorista" + id).val();
			 
		    $("#mod_nombre").val(nombre_cliente);
		    $("#mod_fiscal").val(fiscal_cliente);
		    $("#mod_telefono").val(telefono_cliente);
		    $("#mod_email").val(email_cliente);
		    $("#mod_direccion").val(direccion_cliente);
		    $("#mod_estado").val(status_cliente);
		    $("#mod_id").val(id);
		    $("#mod_facebook").val(facebook);
		    $("#mod_instagram").val(instagram);
		    $("#mod_twitter").val(twitter);
		    $("#mod_tiktok").val(tiktok);
		    $("#mod_fec_nacimiento").val(fec_nacimiento);
		    $("#mod_ciudad").val(ciudad);
		    $("#mod_canal_comunicacion").val(canal_comunicacion);
			if(hijos == 'N'){
				botonHijos.checked = false
			}else{
				botonHijos.checked = true;
			}
			if(pareja == 'N'){
				botonPareja.checked = false
			}else{
				botonPareja.checked = true;
			}
			if(int_mayorista == 'N'){
				botonMayorista.checked = false
			}else{
				botonMayorista.checked = true;
			}
		    console.log("h", fec_nacimiento)
			
		}

		