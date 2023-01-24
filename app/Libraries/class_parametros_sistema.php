<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');

class Class_parametros_sistema{
	
  	public $string_permisos;
	public $mod_parametros_sistema;

	function __construct()
	{   $CI =& get_instance();
		$CI->load->model('Model_parametros_sistema');
		$this->mod_parametros_sistema = new Model_parametros_sistema();
   		$this->string_permisos = "";
	}

	function get_nombre_empresa()
	{   
         $row = $this->mod_parametros_sistema->get_nombre_empresa();
         if($row->value==""){return $row->value=""; }
         else{return $row->value;}
       
	}
	function get_rfc_empresa()
	{   
		 
         $row = $this->mod_parametros_sistema->get_rfc_empresa();
         if($row->value==""){return $row->value=""; }
         else{return $row->value;}
	}
	function get_direccion_empresa()
	{   
		 
         $row = $this->mod_parametros_sistema->get_direccion_empresa();
         if($row->value==""){return $row->value=""; }
         else{return $row->value;}
	}
	function get_telefono_empresa()
	{   
		 
         $row = $this->mod_parametros_sistema->get_telefono_empresa();
         if($row->value==""){return $row->value=""; }
         else{return $row->value;}
	}
	function get_iva()
	{   
		 
         $row = $this->mod_parametros_sistema->get_iva();
         if($row->value==""){return $row->value="16"; }
         else{return $row->value;}
	}

	function get_simbolo_moneda()
	{   
		 
         $row = $this->mod_parametros_sistema->get_simbolo_moneda();
         if($row->value==""){return $row->value="$"; }
         else{return $row->value;}
	}

	function get_formato_moneda()
	{   
		 
         $row = $this->mod_parametros_sistema->get_formato_moneda();
         if($row->value==""){return $row->value="MXN"; }
         else{return $row->value;}
	}

	function get_num_legal()
	{   
		 
         $row = $this->mod_parametros_sistema->get_num_legal();
         if($row->value==""){return $row->value="0"; }
         else{return $row->value;}
	}
	function get_opcion_num_legal()
	{   
		 
         $row = $this->mod_parametros_sistema->get_opcion_num_legal();
         if($row->value==""){return $row->value="alcrear"; }
         else{return $row->value;}
	}
	function get_tamanio_factura()
	{   
		 
         $row = $this->mod_parametros_sistema->get_tamanio_factura();
         if($row->value==""){return $row->value="a4"; }
         else{return $row->value;}
	}

	function get_tamanio_recibo()
	{   
		 
         $row = $this->mod_parametros_sistema->get_tamanio_recibo();
         if($row->value==""){return $row->value="a4"; }
         else{return $row->value;}
	}

	function get_orientacion_factura()
	{   
		 
         $row = $this->mod_parametros_sistema->get_orientacion_factura();
         if($row->value==""){return $row->value="portrait"; }
         else{return $row->value;}
	}
	function get_orientacion_recibo()
	{   
		 
         $row = $this->mod_parametros_sistema->get_orientacion_recibo();
         if($row->value==""){return $row->value="portrait"; }
         else{return $row->value;}
	}
	function get_moneda_letras()
	{   
		 
         $row = $this->mod_parametros_sistema->get_moneda_letras();
         if($row->value==""){return $row->value="Pesos"; }
         else{return $row->value;}
	}
	function get_mostrar_franja()
	{   
		 
         $row = $this->mod_parametros_sistema->get_mostrar_franja();
         if($row->value==""){return $row->value="on"; }
         else{return $row->value;}
	}

	function get_mostrar_fecha_pdf()
	{   
		 
         $row = $this->mod_parametros_sistema->get_mostrar_fecha_pdf();
         if($row->value==""){return $row->value="on"; }
         else{return $row->value;}
	}

	function get_send_nueva_factura()
	{   
		 
         $row = $this->mod_parametros_sistema->get_send_nueva_factura();
         if($row->value==""){return $row->value="on"; }
         else{return $row->value;}
	}

	function get_send_pagado_factura()
	{   
		 
         $row = $this->mod_parametros_sistema->get_send_pagado_factura();
         if($row->value==""){return $row->value="on"; }
         else{return $row->value;}
	}

	function get_zona_horaria()
	{   
		 
         $row = $this->mod_parametros_sistema->get_zona_horaria();
         if($row->value==""){return $row->value="America/Merida"; }
         else{return $row->value;}
	}

	function get_correo_host()
	{   
		 
         $row = $this->mod_parametros_sistema->get_correo_host();
         if($row->value==""){return $row->value="smtp.gmail.com"; }
         else{return $row->value;}
	}

		function get_correo_port()
	{   
		 
         $row = $this->mod_parametros_sistema->get_correo_port();
         if($row->value==""){return $row->value="587"; }
         else{return $row->value;}
	}

		function get_correo_secure()
	{   
		 
         $row = $this->mod_parametros_sistema->get_correo_secure();
         if($row->value==""){return $row->value="tls"; }
         else{return $row->value;}
	}

		function get_correo_user()
	{   
		 
         $row = $this->mod_parametros_sistema->get_correo_user();
         if($row->value==""){return $row->value="levasmx@gmail.com"; }
         else{return $row->value;}
	}

		function get_correo_pass()
	{   
		 
         $row = $this->mod_parametros_sistema->get_correo_pass();
         if($row->value==""){return $row->value="jjml8291"; }
         else{return $row->value;}
	}

		function get_correo_firma()
	{   
		 
         $row = $this->mod_parametros_sistema->get_correo_firma();
         if($row->value==""){return $row->value=""; }
         else{return $row->value;}
	}
		function get_url_logo()
	{   
		 
         $row = $this->mod_parametros_sistema->get_url_logo();
         if($row->value==""){return $row->value="img/logofactura.png"; }
         else{return $row->value;}
	}
}
?>