		$(document).ready(function() {
		    load(1);
		});

		function load(page) {
		    var q = $("#q").val();
		    $("#loader").fadeIn('slow');
		    $.ajax({
		        url: '../ajax/buscar_egresos.php?action=ajax&page=' + page + '&q=' + q,
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
		$("#guardar_proveedor").submit(function(event) {
		    $('#guardar_datos').attr("disabled", true);
		    var parametros = $(this).serialize();
		    $.ajax({
		        type: "POST",
		        url: "../ajax/nuevo_egreso.php",
		        data: parametros,
		        beforeSend: function(objeto) {
		            $("#resultados_ajax").html('<img src="../../img/ajax-loader.gif"> Cargando...');
		        },
		        success: function(datos) {
		            $("#resultados_ajax").html(datos);
		            $('#guardar_datos').attr("disabled", false);
		            load(1);
		            //resetea el formulario
		            $("#guardar_proveedor")[0].reset();
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
		// $("#editar_proveedor").submit(function(event) {
		//     $('#actualizar_datos').attr("disabled", true);
		//     var parametros = $(this).serialize();
		//     $.ajax({
		//         type: "POST",
		//         url: "../ajax/editar_proveedor.php",
		//         data: parametros,
		//         beforeSend: function(objeto) {
		//             $("#resultados_ajax2").html('<img src="../../img/ajax-loader.gif"> Cargando...');
		//         },
		//         success: function(datos) {
		//             $("#resultados_ajax2").html(datos);
		//             $('#actualizar_datos').attr("disabled", false);
		//             load(1);
		//             //desaparecer la alerta
		//             window.setTimeout(function() {
		//                 $(".alert").fadeTo(200, 0).slideUp(200, function() {
		//                     $(this).remove();
		//                 });
		//             }, 2000);
		//         }
		//     });
		//     event.preventDefault();
		// })
		
		$('#dataDelete').on('show.bs.modal', function(event) {
		    var button = $(event.relatedTarget) // Botón que activó el modal
		    var id = button.data('id') // Extraer la información de atributos de datos
		    var modal = $(this)
		    modal.find('#id_egreso').val(id)
			
		})
		$("#eliminarDatos").submit(function(event) {
		    var parametros = $(this).serialize();
		    $.ajax({
		        type: "POST",
		        url: "../ajax/anular_egreso.php",
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

		function obtener_datos(id) {
		    var fecha = $("#fecha" + id).val();
		    var cuenta_contable = $("#cuenta_contable" + id).val();
		    var concepto = $("#concepto" + id).val();
		    var proveedor = $("#proveedor" + id).val();
		    var nro_comprobante = $("#nro_comprobante" + id).val();
		    var medio_pago = $("#medio_pago" + id).val();
		    var importe = $("#importe" + id).val();
		    var estado = $("#estado" + id).val();
		    // var estado_proveedor = $("#estado_proveedor" + id).val();
		    // $("#mod_nombre").val(nombre_proveedor);
		    // $("#mod_fiscal").val(fiscal_proveedor);
		    // $("#mod_web").val(web_proveedor);
		    // $("#mod_direccion").val(direccion_proveedor);
		    // $("#mod_contacto").val(contacto_proveedor);
		    // $("#mod_email").val(email_proveedor);
		    // $("#mod_telefono").val(telefono_proveedor);
		    // $("#mod_estado").val(estado_proveedor);
		    // $("#mod_id").val(id);
		}