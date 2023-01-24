<?php

namespace App\Libraries;

use App\Models\Model_selectores;

class Class_permiso_oficina
{
	var $mdl_select;
	public $string_permisos;
	function __construct()
	{
		$this->mdl_select = new Model_selectores();
		$this->string_permisos = "";
	}

	function get_permiso_sucursal_intalacion($ids_sucursal)
	{
		if ($ids_sucursal == "%%") {
			$this->string_permisos = "i.id>0";
		} else {
			$array_permisos_sucursal = explode(",", $ids_sucursal);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_sucursal as $value) {
				if ($contador == 0) {

					if (count($array_permisos_sucursal) == 1) {
						$cadena_permisos .= "i.sucursal = " . $value;
					} else {
						$cadena_permisos .= "(i.sucursal = " . $value;
					}
				} else {

					if (count($array_permisos_sucursal) == ($contador + 1)) {
						$cadena_permisos .= " OR i.sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR i.sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_ticket($ids_sucursal)
	{
		if ($ids_sucursal == "%%") {
			$this->string_permisos = "s.id>0";
		} else {
			$array_permisos_sucursal = explode(",", $ids_sucursal);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_sucursal as $value) {
				if ($contador == 0) {

					if (count($array_permisos_sucursal) == 1) {
						$cadena_permisos .= "t.sucursal = " . $value;
					} else {
						$cadena_permisos .= "(t.sucursal = " . $value;
					}
				} else {

					if (count($array_permisos_sucursal) == ($contador + 1)) {
						$cadena_permisos .= " OR t.sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR t.sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal($ids_sucursal)
	{
		if ($ids_sucursal == "%%") {
			$this->string_permisos = "t.id>0";
		} else {
			$array_permisos_sucursal = explode(",", $ids_sucursal);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_sucursal as $value) {
				if ($contador == 0) {

					if (count($array_permisos_sucursal) == 1) {
						$cadena_permisos .= "t.sucursal = " . $value;
					} else {
						$cadena_permisos .= "(t.sucursal = " . $value;
					}
				} else {

					if (count($array_permisos_sucursal) == ($contador + 1)) {
						$cadena_permisos .= " OR t.sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR t.sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_gestion($ids_sucursal)
	{
		if ($ids_sucursal == "%%") {
			$this->string_permisos = "l.id>0";
		} else {
			$array_permisos_sucursal = explode(",", $ids_sucursal);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_sucursal as $value) {
				if ($contador == 0) {

					if (count($array_permisos_sucursal) == 1) {
						$cadena_permisos .= "t.sucursal = " . $value;
					} else {
						$cadena_permisos .= "(t.sucursal = " . $value;
					}
				} else {

					if (count($array_permisos_sucursal) == ($contador + 1)) {
						$cadena_permisos .= " OR t.sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR t.sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_cotizaciones($ids_sucursal)
	{
		if ($ids_sucursal == "%%") {
			$this->string_permisos = "id>0";
		} else {
			$array_permisos_sucursal = explode(",", $ids_sucursal);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_sucursal as $value) {
				if ($contador == 0) {

					if (count($array_permisos_sucursal) == 1) {
						$cadena_permisos .= "sucursal = " . $value;
					} else {
						$cadena_permisos .= "(sucursal = " . $value;
					}
				} else {

					if (count($array_permisos_sucursal) == ($contador + 1)) {
						$cadena_permisos .= " OR sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_login($ids_sucursal)
	{
		if ($ids_sucursal == "%%") {
			$this->string_permisos = "l.id>0";
		} else {
			$array_permisos_sucursal = explode(",", $ids_sucursal);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_sucursal as $value) {
				if ($contador == 0) {

					if (count($array_permisos_sucursal) == 1) {
						$cadena_permisos .= "l.sucursal_origen = " . $value;
					} else {
						$cadena_permisos .= "(l.sucursal_origen = " . $value;
					}
				} else {

					if (count($array_permisos_sucursal) == ($contador + 1)) {
						$cadena_permisos .= " OR l.sucursal_origen = " . $value . ")";
					} else {
						$cadena_permisos .= " OR l.sucursal_origen = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_select($ids_sucursal)
	{
		if ($ids_sucursal == "%%") {
			$this->string_permisos = "id>0";
		} else {
			$array_permisos_sucursal = explode(",", $ids_sucursal);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_sucursal as $value) {
				if ($contador == 0) {

					if (count($array_permisos_sucursal) == 1) {
						$cadena_permisos .= "id = " . $value;
					} else {
						$cadena_permisos .= "(id = " . $value;
					}
				} else {

					if (count($array_permisos_sucursal) == ($contador + 1)) {
						$cadena_permisos .= " OR id = " . $value . ")";
					} else {
						$cadena_permisos .= " OR id = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_nodo($ids_nodo)
	{
		if ($ids_nodo == "%%") {
			$this->string_permisos = "u.id>0";
		} else {
			$array_permisos_nodo = explode(",", $ids_nodo);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_nodo as $value) {
				if ($contador == 0) {

					if (count($array_permisos_nodo) == 1) {
						$cadena_permisos .= "u.nodo = " . $value;
					} else {
						$cadena_permisos .= "(u.nodo = " . $value;
					}
				} else {

					if (count($array_permisos_nodo) == ($contador + 1)) {
						$cadena_permisos .= " OR u.nodo = " . $value . ")";
					} else {
						$cadena_permisos .= " OR u.nodo = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_calendar($ids_sucursal)
	{
		if ($ids_sucursal == "%%") {
			$this->string_permisos = "c.id>0";
		} else {
			$array_permisos_sucursal = explode(",", $ids_sucursal);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_sucursal as $value) {
				if ($contador == 0) {

					if (count($array_permisos_sucursal) == 1) {
						$cadena_permisos .= "sucursal = " . $value;
					} else {
						$cadena_permisos .= "(sucursal = " . $value;
					}
				} else {

					if (count($array_permisos_sucursal) == ($contador + 1)) {
						$cadena_permisos .= " OR sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_socios_select($ids_sindicato)
	{
		if ($ids_sindicato == "%%") {
			$this->string_permisos = "id>0";
		} else {
			$array_permisos_nodo = explode(",", $ids_sindicato);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_nodo as $value) {
				if ($contador == 0) {

					if (count($array_permisos_nodo) == 1) {
						$cadena_permisos .= "id = " . $value;
					} else {
						$cadena_permisos .= "(id = " . $value;
					}
				} else {

					if (count($array_permisos_nodo) == ($contador + 1)) {
						$cadena_permisos .= " OR id = " . $value . ")";
					} else {
						$cadena_permisos .= " OR id = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_for_vehicles($ids_sindicato)
	{
		if ($ids_sindicato == "%%") {
			$this->string_permisos = "null";
		} else {
			$array_permisos_nodo = explode(",", $ids_sindicato);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_nodo as $value) {
				if ($contador == 0) {

					if (count($array_permisos_nodo) == 1) {
						$cadena_permisos .= "c.sucursal = " . $value;
					} else {
						$cadena_permisos .= "(c.sucursal = " . $value;
					}
				} else {

					if (count($array_permisos_nodo) == ($contador + 1)) {
						$cadena_permisos .= " OR c.sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR c.sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_for_ordenes($ids_sindicato)
	{
		if ($ids_sindicato == "%%") {
			$this->string_permisos = "null";
		} else {
			$array_permisos_nodo = explode(",", $ids_sindicato);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_nodo as $value) {
				if ($contador == 0) {

					if (count($array_permisos_nodo) == 1) {
						$cadena_permisos .= "c.sucursal = " . $value;
					} else {
						$cadena_permisos .= "(c.sucursal = " . $value;
					}
				} else {
					if (count($array_permisos_nodo) == ($contador + 1)) {
						$cadena_permisos .= " OR c.sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR c.sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_facturas($ids_sindicato)
	{
		if ($ids_sindicato == "%%") {
			$this->string_permisos = "null";
		} else {
			$array_permisos_nodo = explode(",", $ids_sindicato);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_nodo as $value) {
				if ($contador == 0) {

					if (count($array_permisos_nodo) == 1) {
						$cadena_permisos .= "c.sucursal = " . $value;
					} else {
						$cadena_permisos .= "(c.sucursal = " . $value;
					}
				} else {

					if (count($array_permisos_nodo) == ($contador + 1)) {
						$cadena_permisos .= " OR c.sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR c.sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_estadisticas($ids_sindicato)
	{
		if ($ids_sindicato == "%%") {
			$this->string_permisos = null;
		} else {
			$array_permisos_nodo = explode(",", $ids_sindicato);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_nodo as $value) {
				if ($contador == 0) {

					if (count($array_permisos_nodo) == 1) {
						$cadena_permisos .= "c.sucursal = " . $value;
					} else {
						$cadena_permisos .= "(c.sucursal = " . $value;
					}
				} else {

					if (count($array_permisos_nodo) == ($contador + 1)) {
						$cadena_permisos .= " OR c.sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR c.sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_gastos($ids_sindicato)
	{
		if ($ids_sindicato == "%%") {
			$this->string_permisos = null;
		} else {
			$array_permisos_nodo = explode(",", $ids_sindicato);
			$cadena_permisos = "";
			$contador = 0;

			foreach ($array_permisos_nodo as $value) {
				if ($contador == 0) {
					if (count($array_permisos_nodo) == 1) {
						$cadena_permisos .= "sucursal = " . $value;
					} else {
						$cadena_permisos .= "(sucursal = " . $value;
					}
				} else {

					if (count($array_permisos_nodo) == ($contador + 1)) {
						$cadena_permisos .= " OR sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_for_transacciones($ids_sindicato)
	{
		$this->string_permisos = "";
		$array_id_user_for_view = array();
		if ($ids_sindicato == "%%") {
		} else {
			$array_permisos_nodo_user_active = explode(",", $ids_sindicato);
			$all_user = $this->mdl_select->get_all_personal();
			foreach ($all_user as $data) {
				if ($data->sucursales != "%%") {
					$array_permisos_nodo_for_user = explode(",", $data->sucursales);
					foreach ($array_permisos_nodo_for_user as $sucursal_one_one_for_user) {

						foreach ($array_permisos_nodo_user_active as $sucursal_one_one_for_user_active) {
							if ($sucursal_one_one_for_user == $sucursal_one_one_for_user_active) {
								array_push($array_id_user_for_view, $data->id_usuario);
							}
						}
					}
				}
			} ////fin first foreach
			//////////////decodifica todos los permisos para pasar a where
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_id_user_for_view as $value) {
				if ($contador == 0) {
					$cadena_permisos .= "u.id_usuario = " . $value;
				} else {
					$cadena_permisos .= " OR u.id_usuario = " . $value;
				}
				$contador++;
			}
			// $cadena_permisos.=" OR u.sucursales = '%%' "; //los que tengan permiso %% lo pueden visualizar cualquiera
			$this->string_permisos = $cadena_permisos;
		} ///fin else	
		return $this->string_permisos;
	}

	function get_permiso_sucursal_for_search($ids_sindicato)
	{
		if ($ids_sindicato == "%%") {
			$this->string_permisos = "null";
		} else {
			$array_permisos_nodo = explode(",", $ids_sindicato);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_nodo as $value) {
				if ($contador == 0) {

					if (count($array_permisos_nodo) == 1) {
						$cadena_permisos .= "c.sucursal = " . $value;
					} else {
						$cadena_permisos .= "(c.sucursal = " . $value;
					}
				} else {

					if (count($array_permisos_nodo) == ($contador + 1)) {
						$cadena_permisos .= " OR c.sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR c.sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_sucursal_for_user($id_usuario)
	{
		$mdl_select = new Model_selectores();
		$row = $mdl_select->get_sucursal_for_user($id_usuario);
		$ids_sindicato = $row->sucursales;

		$option_sucursales = "";
		if ($ids_sindicato == "%%") {
			$oficina = $this->mdl_select->get_all_sucursales();
			if ($oficina) {
				foreach ($this->oficina as $items) {
					$option_sucursales .= "<option value='" . $items->id . "'>" . $items->nombre . "</option>";
				}
			} else {
				$option_sucursales .= "";
			}
			return $option_sucursales;
		} else {
			$array_permisos_nodo = explode(",", $ids_sindicato);

			foreach ($array_permisos_nodo as $value) {

				$row = $mdl_select->get_sucursal_by_id($value);
				if ($row) {
					$option_sucursales .= "<option value='" . $row->id . "'>" . $row->nombre . "</option>";
				} else {
					$option_sucursales .= "";
				}
			}
			return $option_sucursales;
		}
	}

	function get_permiso_sucursal_almacen($ids_sucursal)
	{
		if ($ids_sucursal == "%%") {
			$this->string_permisos = "a.id>0";
		} else {
			$array_permisos_sucursal = explode(",", $ids_sucursal);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_sucursal as $value) {
				if ($contador == 0) {

					if (count($array_permisos_sucursal) == 1) {
						$cadena_permisos .= "a.sucursal = " . $value;
					} else {
						$cadena_permisos .= "(a.sucursal = " . $value;
					}
				} else {

					if (count($array_permisos_sucursal) == ($contador + 1)) {
						$cadena_permisos .= " OR a.sucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR a.sucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_nodo($ids_sucursal)
	{
		if ($ids_sucursal == "%%") {
			$this->string_permisos = "t.id>0";
		} else {
			$array_permisos_sucursal = explode(",", $ids_sucursal);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_sucursal as $value) {
				if ($contador == 0) {

					if (count($array_permisos_sucursal) == 1) {
						$cadena_permisos .= "t.idsucursal = " . $value;
					} else {
						$cadena_permisos .= "(t.idsucursal = " . $value;
					}
				} else {

					if (count($array_permisos_sucursal) == ($contador + 1)) {
						$cadena_permisos .= " OR t.idsucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR t.idsucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}

	function get_permiso_sucursal_server($ids_sucursal)
	{
		if ($ids_sucursal == "%%") {
			$this->string_permisos = "s.id>0";
		} else {
			$array_permisos_sucursal = explode(",", $ids_sucursal);
			$cadena_permisos = "";
			$contador = 0;
			foreach ($array_permisos_sucursal as $value) {
				if ($contador == 0) {

					if (count($array_permisos_sucursal) == 1) {
						$cadena_permisos .= "s.idsucursal = " . $value;
					} else {
						$cadena_permisos .= "(s.idsucursal = " . $value;
					}
				} else {

					if (count($array_permisos_sucursal) == ($contador + 1)) {
						$cadena_permisos .= " OR s.idsucursal = " . $value . ")";
					} else {
						$cadena_permisos .= " OR s.idsucursal = " . $value;
					}
				}
				$contador++;
			}
			$this->string_permisos = $cadena_permisos;
		}

		return $this->string_permisos;
	}
}
