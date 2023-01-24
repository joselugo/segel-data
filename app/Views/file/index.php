	<h1 class="page-header">Pagos masivos</h1>

	<div class="row">


		<div class="col-xl-8 dvfotm" style="margin: 0 auto">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><b>Registrar pagos Masivos</b></h4>
				</div>
				<div class="panel-body border-panel" style="padding: 20px">

					<form id="frm-import-up" action="ajax/addpagomasivo?action=procesaimport" enctype="multipart/form-data" method="post">
						<p class="text-success">Desde Aquí podemos registrar pagos de forma masiva utilizando un archivo de excel</p>

						<div class="row">
							<div class="import_number">1</div>
							<div class="import_line"></div>
							<div class="import_body">
								<h5>Descargar Plantilla</h5>
								<a class="btn btn-default" download href="../../ejemplos_import/Registrar-Pagos-Excel-Mikrowisp.xlsx"><i class="fas fa-download"></i> Descargar Plantilla Excel</a>
							</div>
						</div>

						<div class="row">
							<div class="import_number">2</div>
							<div class="import_line"></div>
							<div class="import_body p-b-0">
								<h5>Rellenar Plantilla</h5>
								<label class="btn btn-default">
									<i class="fas fa-upload"></i> Seleccionar plantilla y Subir <input type="file" hidden="" name="import-file" required="">
								</label>
								<p class="m-b-0">No altere el orden de las columnas de la plantilla. El nombre del archivo debe terminar en .xlsx</p>
							</div>
						</div>

						<div class="row">
							<div class="import_number">3</div>
							<div class="import_line" style="height: 150px;"></div>
							<div class="import_body p-t-10 p-b-0">
								<h5>Buscar Cliente</h5>
								<label class="m-r-10">Buscar por : </label>
								<select name="tipo-b" class="sl2">
									<option value="0">CEDULA,DNI,RUC,CUIT,NIT,SAT,RUT,RTN,ETC.</option>
									<option value="1">ID Factura</option>
									<option value="2">ID Cliente</option>
								</select>
								<p class="m-t-5">El dato a buscar está difinido en la primera columna de la plantilla, aquí debe escoger el tipo de busqueda correcto..</p>

							</div>
						</div>

						<div class="row">
							<div class="import_number">4</div>
							<div class="import_line"></div>
							<div class="import_body p-t-10">
								<h5>Validar archivo</h5>
								<p><button class="btn btn-white" type="submit"><i class="fas fa-cloud-upload-alt"></i> Iniciar</button></p>
							</div>
						</div>


					</form>


				</div>
			</div>
		</div>


		<div class="panel panel-inverse dvpagos" style="width: 100%;"></div>



		<div class="panel panel-danger dverrores" style="width: 100%;"></div>

	</div>

	<script>
		function procesarpagosmasivos() {
			$('.btn-pagos').prop('disabled', true);
			loaderin('.dvpagos');
			var itm = [];

			$('input[name^="chmasivo"]:checked').each(function() {
				itm.push($(this).val());
			})

			$.post("ajax/addpagomasivo", {
					id: itm,
					action: "addpago",
					forma: $('#forma_pago').val()
				})
				.done(function(data) {

					$('input[name^="chmasivo"]:checked').each(function() {
						$('*[data-fila="' + $(this).data('fila') + '"]').remove();
					})
					conterch();
					$('input.allmasivo').prop('checked', false);
					loaderout('.dvpagos');
					alerta('exito', data['salida']);
				});

		}


		function conterch() {
			var numberOfChecked = $('input[name^="chmasivo"]:checked').length;

			if (numberOfChecked == 0) {
				$('.btn-pagos').html('<i class="far fa-money-bill-alt"></i> Registrar pagos').prop('disabled', true);
			} else {
				$('.btn-pagos').html('<i class="far fa-money-bill-alt"></i> Registrar pagos <span class="text-warning" style="font-size: 11px;">(' + numberOfChecked + ')<span>').prop('disabled', false);
			}

		}

		function selectall() {
			if ($('input.allmasivo').is(':checked')) {
				$('input[name^="chmasivo"]').each(function() {
					$(this).prop('checked', true);
				});
			} else {
				$('input[name^="chmasivo"]').each(function() {
					$(this).prop('checked', false);
				});
			}
			conterch();
		}



		$(function() {
			$('.sl2').select2();
			$('#frm-import-up').ajaxForm({
				success: function(data) {
					btnloader('#frm-import-up', '<i class="fas fa-cloud-upload-alt"></i> Iniciar');
					$('input[name="import-file"]').val('');
					if (data['estado'] == 'exito') {
						if (data['pagos']) {
							$('.dvpagos').html(data['pagos']);
							$('.dvfotm').hide();
						} else {
							$('.dvpagos').html('');
						}

						if (data['errores']) {
							$('.dvfotm').hide();
							$('.dverrores').html(data['errores']);
						} else {
							$('.ddverrores').html('');
						}


					} else {
						alerta('error', 'No se ha procesado la plantilla');
					}
				},
				beforeSend: function() {
					btnloader('#frm-import-up');
				},
				error: function(response) {
					$('#gritter-notice-wrapper').remove();
					alerta('error500', response['responseText']);
				}
			})

			App.restartGlobalFunction();
			App.setPageTitle('Registrar Datos');
		})
	</script>