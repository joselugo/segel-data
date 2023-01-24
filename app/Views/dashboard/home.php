<h1 class="page-header col-md-12">Bienvenido <small><?= $nombre; ?></small></h1>
<div class="row">


 <?php if ($permisos['WIDGET CLIENTES_ONLINE']) : ?>
    <div class="col-xl-3 col-md-6 ">
      <div class="widget widget-stats bg-teal">
        <div class="stats-icon stats-icon-lg"><i class="fas fa-users fa-fw"></i></div>
        <div class="stats-content">
          <div class="stats-title">SERVICIOS ONLINE</div>
          <div class="stats-number m-b-2" id="home_total_online">0</div>
          <div>Total De Servicios Registrados <b id="home_total_registrados">0</b></div>
          <div class="stats-progress progress">
            <div class="progress-bar bar-w-1" style="width: 0%;"></div>
          </div>
          <div class="stats-desc"><a href="#clientes">Ver clientes <i class="fas fa-arrow-right"></i></a></div>
        </div>
      </div>
    </div>
  <?php endif; ?>
<?php if ($permisos['WIDGET TRANSACCIONES']) : ?>
  <div class="col-xl-3 col-md-6 ">
    <div class="widget widget-stats bg-blue">
      <div class="stats-icon stats-icon-lg"><i class="fas fa-tags fa-fw"></i></div>
      <div class="stats-content">
        <div class="stats-title">TRANSACCIONES HOY</div>
        <div class="stats-number m-b-2" id="home_pagos_hoy">0</div>
        <div>Cobrado este mes <b id="home_pagos_mes">0</b></div>
        <div class="stats-progress progress">
          <div class="progress-bar bar-w-2" style="width: 0%;"></div>
        </div>
        <div class="stats-desc"><a href="#finanzas/get_transacciones">Ver transacciones <i class="fas fa-arrow-right"></i></a></div>
      </div>
    </div>
  </div>
  <?php endif; ?>
<?php if ($permisos['WIDGET FACTURAS NO PAGADAS']) : ?>
  <div class="col-xl-3 col-md-6 ">
    <div class="widget widget-stats bg-indigo">
      <div class="stats-icon stats-icon-lg"><i class="far fa-file-alt fa-fw"></i></div>
      <div class="stats-content">
        <div class="stats-title">FACTURAS VENCIDAS</div>
        <div class="stats-number  m-b-2" id="home_facturas_nopagadas">0</div>
        <div>Total De Facturas No Pagadas <b id="home_facturas_vencidas">0</b></div>
        <div class="stats-progress progress">
          <div class="progress-bar bar-w-3" style="width: 0%;"></div>
        </div>
        <div class="stats-desc"><a href="#finanzas/facturas">Ver Facturas <i class="fas fa-arrow-right"></i></a></div>
      </div>
    </div>
  </div>
 <?php endif; ?>
<?php if ($permisos['WIDGET TICKETS SOPORTE']) : ?>
  <div class="col-xl-3 col-md-6 ">
    <div class="widget widget-stats bg-dark">
      <div class="stats-icon stats-icon-lg"><i class="far fa-comments fa-fw"></i></div>
      <div class="stats-content">
        <div class="stats-title">TICKET SOPORTE</div>
        <div class="stats-number m-b-2" id="home_soporte_activo">0</div>
        <div>Total Abiertos <b id="home_soporte_abierto">0</b></div>
        <div class="stats-progress progress">
          <div class="progress-bar bar-w-4" style="width: 0%;"></div>
        </div>
        <div class="stats-desc"><a href="#ticket">Ver Tickets <i class="fas fa-arrow-right"></i></a></div>
      </div>
    </div>
  </div>
 <?php endif; ?>


</div>



<div class="row errordisco" style="display: none">
  <div class="col-xl-12">
    <div class="alert alert-danger fade show" style="font-size: 13px; min-height: 50px;line-height: 25px;">
      <span class="close" data-dismiss="alert">×</span>
      <i class="fas fa-exclamation-triangle"></i> Atención Queda poco espacio en el disco duro <b>(<span class="error_disco"></span>)</b>, Puede liberar espacio desde <a href="#ajax/ajustes?action=sistema" class="alert-link">el área de mantenimiento</a> para liberar espacio.
    </div>
  </div>
</div>

<div class="row">

<?php if ($permisos['WIDGET TRAFICO DE CLIENTES']) : ?>
  <div class="col-xl-8 ">
    <div class="widget-chart with-sidebar inverse-mode">
      <div class="widget-chart-content bg-dark">
        <h4 class="chart-title">
          Tráfico Clientes
          <small>Últimos 7 días</small>
        </h4>
        <div id="chart-trafico-home" class="widget-chart-full-width nvd3-inverse-mode" style="height: 260px;"></div>
      </div>
      <div class="widget-chart-sidebar bg-dark-darker">
        <div class="chart-number">
	  <small>Tráfico Total de Hoy</small>
          <span class="total_trafico">Cargando ...</span>
        </div>
        <div class="flex-grow-1 d-flex align-items-center">
          <div class="nvd3-inverse-mode donut-trafico">

          </div>
        </div>
        <ul class="chart-legend f-s-11">
          <li><i class="fa fa-circle fa-fw text-blue f-s-9 m-r-5 t-minus-1"></i> <span class="total_tx" style="color:#fff;font-weight: 600">0.0</span><span>Descarga</span></li>
          <li><i class="fa fa-circle fa-fw text-teal f-s-9 m-r-5 t-minus-1"></i> <span class="total_rx" style="color:#fff;font-weight: 600">0.0</span></span><span>Subida</span></li>
        </ul>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php if ($permisos['WIDGET RESUMEN DEL SISTEMA']) : ?>
  <div class="col-xl-4 ">
    <div class="panel panel-inverse" data-sortable-id="home_resumen_servicios">
      <div class="panel-heading ui-sortable-handle">
        <h4 class="panel-title">Resumen del sistema</h4>
      </div>
      <div class="list-group">
        <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis" style="padding-top: 11px !important;padding-bottom: 11px !important;">
          1. Routers Activos
          <span class="badge bg-teal f-s-10 r-1" style="font-size: 12px !important">0</span>
        </a>

        <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis" style="padding-top: 11px !important;padding-bottom: 11px !important;">
          2. Routers desconectados
          <span class="badge bg-red f-s-10 r-2" style="font-size: 12px !important">0</span>
        </a>

        <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis" style="padding-top: 11px !important;padding-bottom: 11px !important;">
          3. Clientes Activos
          <span class="badge bg-green f-s-10 r-3" style="font-size: 12px !important">0</span>
        </a>

        <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis" style="padding-top: 11px !important;padding-bottom: 11px !important;">
          4. Clientes suspendidos
          <span class="badge bg-pink f-s-10 r-4" style="font-size: 12px !important">0</span>
        </a>

        <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis" style="padding-top: 11px !important;padding-bottom: 11px !important;">
          5. Servicios Activos
          <span class="badge bg-info f-s-10 r-5" style="font-size: 12px !important">0</span>
        </a>

        <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis" style="padding-top: 11px !important;padding-bottom: 11px !important;">
          6. Emisores Activos
          <span class="badge bg-lime f-s-10 r-6" style="font-size: 12px !important">0</span>
        </a>

        <a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse d-flex justify-content-between align-items-center text-ellipsis" style="padding-top: 11px !important;padding-bottom: 11px !important;">
          7. Emisores Caídos
          <span class="badge bg-indigo f-s-10 r-7" style="font-size: 12px !important">0</span>
        </a>

      </div>
    </div>
  </div>
<?php endif; ?>

</div>
<!-- begin row -->
<div class="row">
  <!-- begin col-4 -->
<?php if ($permisos['WIDGET ULTIMOS PAGOS']) : ?>
  <div class="col-xl-6 ">
    <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="home_ultimospagos">
      <div class="panel-heading">
        <h4 class="panel-title">Últimos pagos registrados</h4>
      </div>

      <div class="panel-body p-0">
        <div class="table-responsive m-b-0">
          <table class="table m-b-0 table-bordered table-striped" style="font-size: 11px;">
            <thead>
              <tr>
                <th>Cliente</th>
                <th style="width: 80px">Cobrado</th>
                <th>Operador</th>
                <th>Tiempo</th>
              </tr>
            </thead>
            <tbody id="home_ultimos_pagos">

            </tbody>
          </table>
        </div>
      </div>

      <div class="panel-footer text-center">
        <a href="#finanzas/get_transacciones" class="text-inverse">Ver todos <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
    <!-- end panel -->
  </div>
<?php endif; ?>
  <!-- end col-4 -->
  <!-- ULTIMOS CONECTADOS -->
<?php if ($permisos['WIDGET ULTIMOS CLIENTES CONECTADOS']) : ?>

  <div class="col-xl-6 ">
    <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="home_conectados">
      <div class="panel-heading">
        <h4 class="panel-title">Últimos conectados</h4>
      </div>
      <ul class="registered-users-list clearfix" id="home_ultimos_conectados">


      </ul>
      <div class="panel-footer text-center">
        <a href="#clientes" class="text-inverse">Ver todos <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
    <!-- end panel -->
  </div>
  <!-- end col-4 -->
</div>
<?php endif; ?>
<div class="row">

<?php if ($permisos['WIDGET DATOS DEL SERVIDOR']) : ?>
  <!-- begin col-4 -->
  <div class="col-xl-6 ">
    <!-- begin panel -->
    <div class="panel bg-dark" data-sortable-id="home-server">
      <div class="panel-heading">
        <h4 class="panel-title text-white">DATOS DEL SERVIDOR</h4>
      </div>
      <div class="panel-body bg-dark">
        <div class="widget-list widget-list-rounded inverse-mode">
          <!-- begin widget-list-item -->
          <a href="#" class="widget-list-item rounded-0 p-t-3">
            <div class="widget-list-media icon">
              <i class="fas fa-microchip bg-indigo text-white"></i>
            </div>
            <div class="widget-list-content">
              <div class="widget-list-title">CPU Cores</div>
            </div>
            <div class="widget-list-action text-nowrap text-grey">
              <span class="home_cores_cpu"></span>
            </div>
          </a>
          <!-- end widget-list-item -->
          <!-- begin widget-list-item -->
          <a href="#" class="widget-list-item">
            <div class="widget-list-media icon">
              <i class="fas fa-server bg-blue text-white"></i>
            </div>
            <div class="widget-list-content">
              <div class="widget-list-title">Carga promedio (1,5,15 min)</div>
            </div>
            <div class="widget-list-action text-nowrap text-grey">
              <span class="home_carga_cpu"></span>
            </div>
          </a>
          <!-- end widget-list-item -->
          <!-- begin widget-list-item -->
          <a href="#" class="widget-list-item">
            <div class="widget-list-media icon">
              <i class="far fa-chart-bar bg-aqua text-white"></i>
            </div>
            <div class="widget-list-content">
              <div class="widget-list-title">Uso de CPU</div>
            </div>
            <div class="widget-list-action text-nowrap text-grey">
              <span>
                <div class="progress progress-free" style="margin-bottom: 0;width: 180px">
                  <div class="progress-bar progress-bar-animated bg-orange progress-bar-striped home_uso_cpu" role="progressbar" style="width: 0%;">
                    <span class="progress-value home_uso_cpu2">0.00 %</span>
                  </div>
                </div>
              </span>
            </div>
          </a>
          <!-- end widget-list-item -->
          <!-- begin widget-list-item -->
          <a href="#" class="widget-list-item">
            <div class="widget-list-media icon">
              <i class="fas fa-memory bg-red text-white"></i>
            </div>
            <div class="widget-list-content">
              <div class="widget-list-title home_memoria_server">Mem.: 0 MB (Libre 0 %)</div>
            </div>
            <div class="widget-list-action text-nowrap text-grey">
              <span>
                <div class="progress" style="margin-bottom: 0px;width: 180px">
                  <div class="progress-bar bg-orange progress-bar-striped home_memoria_usado" role="progressbar" style="width: 0%;">
                    Usado
                  </div>
                  <div class="progress-bar bg-blue progress-bar-striped home_memoria_libre" role="progressbar" style="width: 0%;">
                    Libre
                  </div>
                </div>
              </span>
            </div>
          </a>
          <!-- end widget-list-item -->
          <!-- begin widget-list-item -->
          <a href="#" class="widget-list-item p-b-3">
            <div class="widget-list-media icon">
              <i class="fas fa-hdd bg-pink text-white"></i>
            </div>
            <div class="widget-list-content">
              <div class="widget-list-title home_disco_server">Disco: 0 GB
                (Libre 0 %)</div>
            </div>
            <div class="widget-list-action text-nowrap text-grey">
              <span>
                <div class="progress" style="margin-bottom: 0px;width: 180px">
                  <div class="progress-bar bg-orange progress-bar-striped home_disco_usado" role="progressbar" style="width:0%">
                    Usado
                  </div>
                  <div class="progress-bar bg-blue progress-bar-striped home_disco_libre" role="progressbar" style="width:0%">
                    Libre
                  </div>
                </div>
              </span>
            </div>
          </a>

          <a href="#" class="widget-list-item p-b-3">
            <div class="widget-list-media icon">
              <i class="fab fa-instagram bg-pink text-white"></i>
            </div>
            <div class="widget-list-content">
              <div class="widget-list-title">Ultima copia de seguridad</div>
            </div>
            <div class="widget-list-action text-nowrap text-grey">
              <span class="home_last_backup"></span>
            </div>
          </a>
          <!-- end widget-list-item -->
        </div>
      </div>
    </div>

    <!-- end panel -->
  </div>
<?php endif; ?>
  <!-- end col-4 -->
<?php if ($permisos['WIDGET RESUMEN DE FACTURACION']) : ?>
  <div class="col-xl-6 ">
    <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="home_facturacion">
      <div class="panel-heading">
        <h4 class="panel-title">Resumen Facturación</h4>
      </div>
      <div class="panel-body">
        <div class="list-group m-b-0">
          <a class="list-group-item bg-blue p-4" style="text-align: center;color:#fff">Mes actual</a>
          <a class="list-group-item p-b-3 p-t-3">Pagos<span class="pull-right" id="resumen_pagos_mes">0 (0.00)</span></a>
          <a class="list-group-item p-b-3 p-t-3">Facturas pagadas<span class="pull-right" id="resumen_facturaspagadas_mes">0 (0.00)</span></a>
          <a class="list-group-item p-b-3 p-t-3">Facturas sin Pagar<span class="pull-right" id="resumen_facturasnopagadas_mes">0 (0.00)</span></a>

          <a class="list-group-item bg-info p-4" style="text-align: center;color:#fff">El mes pasado</a>
          <a class="list-group-item p-b-3 p-t-3">Pagos<span class="pull-right" id="resumen_pagos_mespasado">0 (0.00)</span></a>
          <a class="list-group-item p-b-3 p-t-3">Facturas pagadas<span class="pull-right" id="resumen_facturaspagadas_mespasado">0 (0.00)</span></a>
          <a class="list-group-item p-b-3 p-t-3">Facturas sin Pagar<span class="pull-right" id="resumen_facturasnopagadas_mespasado">0 (0.00)</span></a>

        </div>
      </div>
    </div>
    <!-- end panel -->
  </div>
</div>
<?php endif; ?>
<div class="row">
<?php if ($permisos['WIDGET EMISORES']) : ?>
  <div class="col-xl-12 ">
    <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="home_listemisores">
      <div class="panel-heading">
        <h4 class="panel-title">Emisores</h4>
      </div>

      <div class="panel-body">
        <div class="table-responsive">
          <table id="home-emisores" class="display nowrap table table-striped table-bordered table-hover" cellspacing="0" width="100%" data-order="[[ 3, &quot;asc&quot; ]]">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Equipo</th>
                <th>IP</th>
                <th class="all">Estado</th>
                <th class="all" style="max-width:20px !important" data-orderable="false"></th>
              </tr>
            </thead>
            <tbody>
              <?= $emisores;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- end panel -->
  </div>
<?php endif; ?>
</div>
<!-- end row -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script>

<?php if ($permisos['WIDGET TRAFICO DE CLIENTES']) : ?>
var data=[];
var morris
  var Chart_trafico_home = function() {
    morris=new Morris.Line({
      element: 'chart-trafico-home',
      data: data,
      xkey: 'period',
      parseTime: false,
      ykeys: ['tx', 'rx'],
      resize: true,
      postUnits: ' TB',
      grid: true,
      gridTextSize: '11px',
      pointFillColors: ['#348fe2', '#00acac'],
      labels: ['Descarga', 'Subida'],
      pointSize: 3,
      lineWidth: '2px',
      lineColors: ['#348fe2', '#00acac'],
      //stacked: true,
      xLabelAngle: 25,
      hideHover: 'auto'
    });


    
    getsatus();
    updateGraf()
  };
     function updateGraf() {
    $.ajax({
      type: "GET",
      url: "dashboard/trafico",
      success: function(data) {
        data = JSON.parse(data);
        morris.setData(data.data_grafico);
	$('.total_tx').html(data.descarga+' TB');
        $('.total_rx').html(data.subida+' TB');
        $('.donut-trafico').html('<div class="svg-item"><svg width="100%" height="100%" viewBox="0 0 40 40" class="donut"><circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#192229"></circle><circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="4.5"></circle><circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="5"\
        stroke-dasharray="'+data.porcentaje_descarga+' '+ data.porcentaje_subida+'" stroke-dashoffset="25"></circle><g class="donut-text donut-text-1"><text y="50%" transform="translate(0, 2)"><tspan x="50%" text-anchor="middle" class="donut-percent">'+data.porcentaje_descarga+'%</tspan></text><text y="60%" transform="translate(0, 2)"><tspan x="50%" text-anchor="middle" class="donut-data">DESCARGA</tspan></text></g></svg></div>');
       $('.total_trafico').html(data.trafico_total+' TB');
      }
    })
  }
<?php endif; ?>
  function getsatus() {

    $.ajax({
      type: "POST",
      url: "dashboard/get_data",
      //asyn: true,
      //cache:false,
      data: {
        action: "status"
      },
      timeout: 6000,
      success: function(data) {
        data = JSON.parse(data);

	<?php if ($permisos['WIDGET CLIENTES_ONLINE']) : ?>
        $('#home_total_online').html(data.online);
	$('#home_total_registrados').html(data.registrados);
        $('.bar-w-1').css("width", data.w1);
	<?php endif; ?>

        <?php if ($permisos['WIDGET TRANSACCIONES']) : ?>
        $('#home_pagos_hoy').html(data.pagoshoy);
        $('#home_pagos_mes').html(data.pagosmes);
	$('.bar-w-2').css("width", data.w2);
	<?php endif; ?>

	<?php if ($permisos['WIDGET FACTURAS NO PAGADAS']) : ?>
        $('#home_facturas_vencidas').html(data.facturas);
        $('#home_facturas_nopagadas').html(data.vencidas);
	$('.bar-w-3').css("width", data.w3);
	<?php endif; ?>

	<?php if ($permisos['WIDGET TICKETS SOPORTE']) : ?>
        $('#home_soporte_activo').html(data.soporte_activo);
        $('#home_soporte_abierto').html(data.soporte_abierto);
	$('.bar-w-4').css("width", data.w4);
	<?php endif; ?>

	<?php if ($permisos['WIDGET ULTIMOS CLIENTES CONECTADOS']) : ?>
        $('#home_ultimos_conectados').html(data.ultimosconectados);
	<?php endif; ?>

	<?php if ($permisos['WIDGET ULTIMOS PAGOS']) : ?>
        $('#home_ultimos_pagos').html(data.ultimospagos);
	<?php endif; ?>

	<?php if ($permisos['WIDGET RESUMEN DE FACTURACION']) : ?>
        $('#resumen_pagos_mes').html(data.pagosmestotal + ' <b>(' + data.pagosmes + ')</b>');
        $('#resumen_pagos_mespasado').html(data.pagosmestotalpasado + ' <b>(' + data.pagosmespasado + ')</b>');
        $('#resumen_facturaspagadas_mes').html(data.facturasmes + ' <b>(' + data.facturastotalmes + ')</b>');
        $('#resumen_facturasnopagadas_mes').html(data.facturasmes2 + ' <b>(' + data.facturastotalmes2 + ')</b>');
        $('#resumen_facturaspagadas_mespasado').html(data.facturasmespasado + ' <b>(' + data.facturastotalmespasado + ')</b>');
        $('#resumen_facturasnopagadas_mespasado').html(data.facturasmespasado2 + ' <b>(' + data.facturastotalmespasado2 + ')</b>');
	<?php endif; ?>

	<?php if ($permisos['WIDGET RESUMEN DEL SISTEMA']) : ?>
        $('.home_cores_cpu').html(data.cores);
        $('.home_carga_cpu').html(data.carga);
        $('.home_uso_cpu2').html(data.cpu);
        $('.home_uso_cpu').css("width", data.cpu);
        $('.home_memoria_server').html('Mem.: ' + data.totalmemoria + ' (Libre ' + data.memorialibre + ')');
        $('.home_memoria_usado').css("width", data.memoriausada);
        $('.home_memoria_libre').css("width", data.memorialibre);
        $('.home_disco_server').html('Disco: ' + data.totaldisco + ' (Libre ' + data.discolibre + ')');
        $('.home_disco_usado').css("width", data.discousado);
        $('.home_disco_libre').css("width", data.discolibre);
 	$('.error_disco').html(data.totaldiscolibre);
        if (data.discobytes < 1073741824) {
          $('.errordisco').show();
        }
        $('.home_last_backup').html(data.backup);
        <?php endif; ?>

        <?php if ($permisos['WIDGET DATOS DEL SERVIDOR']) : ?>
        $('.r-1').html(data.r1);
        $('.r-2').html(data.r2);
        $('.r-3').html(data.r3);
        $('.r-4').html(data.r4);
        $('.r-5').html(data.r5);
        $('.r-6').html(data.r6);
        $('.r-7').html(data.r7);
        <?php endif; ?>
        
        
        

        $('img[data-name]').initial({
          height: 64,
          width: 64,
          charCount: 2,
          fontSize: 24,
          fontWeight: 600
        });

       
        timechar = setTimeout(function() {
          getsatus();
        }, 10000);
      }
    });
  }
  $(document).ready(function() {
    setTimeout(function() {
      configtable('#home-emisores', 'Emisores');
      $('#home-emisores').DataTable({
        "idDataTables": "40"
      });
    }, 500);

    App.restartGlobalFunction();
    App.setPageTitle('Dashboard');
<?php if ($permisos['WIDGET TRAFICO DE CLIENTES']) : ?>
    Chart_trafico_home();
<?php endif; ?>
<?php if ($permisos['WIDGET TRAFICO DE CLIENTES']==false) : ?>
   getsatus();
<?php endif; ?>

  })
</script>
<!-- ================== END PAGE LEVEL JS ================== -->