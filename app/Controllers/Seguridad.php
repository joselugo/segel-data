<?php

namespace App\Controllers;
//ini_set( "session.gc_maxlifetime", 30 );
use App\Models\Model_seguridad;
use App\Models\Model_configuracion;
use App\Libraries\Class_seguridad;
use App\Models\Model_log;

//JWT
require_once './app/Libraries/JWT/autoload.php';

use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Firebase\JWT\JWT;

class Seguridad extends BaseController
{
	var $nmodel_log;
	var $model_configuracion;
	var $mdl_seg;
	public function __construct()
	{
		$this->model_log = new Model_log();
		$this->model_configuracion = new Model_configuracion();
		$this->seguridad = new Class_seguridad();
		$this->mdl_seg = new Model_seguridad();
	}

	public function logout()
	{
		session_start();
		session_destroy();
		$this->seguridad->login_back();
	}



	public function iniciar_sesion()
	{
		$user = $this->request->getPost("login");
		$password = md5($this->request->getPost("password"));

		$usuario = $this->mdl_seg->iniciar_sesion($user, $password);
		$ids = array(64);
		$img_db = $this->model_configuracion->get_configuracion($ids);

		if ($usuario != false) {
			if ($usuario[0]->random == 0) {
				$change = $this->request->getPost("change");
				if ($change) {
					$oldpass = $usuario[0]->oldPassword;
					$pass = $usuario[0]->password;
					$explode = explode(",", $oldpass);
					$bool = false;
					$newmd5 = md5($change);
					foreach ($explode as $value) {
						if ($value == $newmd5) {
							$bool = true;
						}
					}
					if (!$bool && $pass != $newmd5) {
						$explode[] = $pass;
						$dataNew = [
							"password" => $newmd5,
							"random" => 1,
							"oldPassword" => implode(",", $explode)
						];
						$result = $this->mdl_seg->cambiar_contrasenia($usuario[0]->id, $dataNew);
						if (!$result) {
							echo "error";
							return;
						}
					} else {
						echo "passold";
						return;
						return;
					}
				} else {
					echo "change";
					return;
				}
			}
			foreach ($usuario as $value) {
				$id_usuario = $value->id;
				$usuario = $this->request->getPost('usuario', TRUE);
				$nombre_usuario = $value->nombre;
				$avatar = $value->avatar;
				$color_avatar = $value->color_avatar;
				$nodos = $value->nodo;
				$sucursales = $value->sucursal;
				$rol = $value->nombre_rol;
			}

			if ($avatar == "") {
				$avatar = '<img class="avataradmin" data-name="' . $nombre_usuario . '" data-color="' . $color_avatar . '">';
			} else {
				$avatar = '<img src="data:image/jpeg;base64,' . base64_encode($avatar) . '" style="border-radius: 100%" width="34" height="34"/>';
			}

			session_start();
			$_SESSION['iduser19'] = $id_usuario;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['nombre'] = $nombre_usuario;
			$_SESSION['avatar'] = $avatar;
			$_SESSION['nodos'] = $nodos;
			$_SESSION['sucursales'] = $sucursales;
			$_SESSION['rol'] = $rol;
			$_SESSION['background'] =  $img_db[0];;
			$hora = date('H:i');
			$session_id = session_id();
			$_SESSION['token19'] = substr(base64_encode(md5($session_id)), 0, -1);

			$key = Services::getSecretKey();
			$time_a = time(); //2 horas
			$payload = [
				'cliente' => $id_usuario,
				'nombre' => $nombre_usuario,
				'alias' => $usuario,
				'iat' => $time_a,
				'exp' => $time_a + 7200,
			];
			$token = JWT::encode($payload, $key, 'RS256');
			$this->response->setCookie('token', $token, 3600, "app.netium.com.mx");
			$this->response->setHeader('token', $token);
			$user_ip = $this->getUserIP();
			$insert_log_login = $this->model_log->insert_log_login($_SESSION['iduser19'], $_SESSION['nombre'], $user_ip, "Acceso exitoso");
			echo "success";
		} else {
			echo "error";
			$user_ip = $this->getUserIP();
			$insert_log_login = $this->model_log->insert_log_login($user, $user, $user_ip, "Usuario o contraseña invalido");
		}
	}

	public function cerrar_sesion()
	{
		session_start();
		session_unset("id_usuario");
		session_unset("usuario");
		session_unset("nombre_usuario");
		session_unset("tmpcodigoseg");
		$this->seguridad->login_back();
	}


	function getUserIP()
	{
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if (getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if (getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if (getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if (getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if (getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';

		return $ipaddress;
	}

	/* public function traer_usuarios()
	{
		if (isset($_SESSION['iduser19'])) {
			$tipoacceso = $this->seguridad->check_permission($_SESSION['id_usuario'], $this->seguridad->key_access('GESTION_PERSONAL'));
			if ($tipoacceso > 0) {
				$usuarios = $this->mdl_seg->traer_usuarios(0);
				$id_usuario_aux = 0;
				$contador = -1;
				foreach ($usuarios as $usuario) {
					if ($usuario->id_usuario > $id_usuario_aux) {
						$contador++;
						$usuarios_completo[$contador] = $usuario;
						$id_usuario_aux = $usuario->id_usuario;
					} else {
						$usuarios_completo[$contador]->nombre_rol .= '<br/>' . $usuario->nombre_rol;
					}
				}
				$datos['permiso'] = $tipoacceso;
				$datos['usuarios'] = $usuarios_completo;
				$this->load->view('login/listado_usuarios', $datos);
			} else echo "<p>NO CUENTA CON EL PERMISO, COMUNICARSE CON EL ADMIN PARA SOLICITAR ACCESO AL MODULO.</p>";
		} else echo "<p>NO CUENTA CON EL PERMISO, COMUNICARSE CON EL ADMIN PARA SOLICITAR ACCESO AL MODULO.</p>";
	} */

	/* public function modificar_rol()
	{
		if (isset($_SESSION['id_usuario'])) {
			$tipoacceso = $this->seguridad->check_permission($_SESSION['id_usuario'], $this->seguridad->key_access('ROLES'));
			if ($tipoacceso > 0) {
				$id_rol = $this->input->post('idrol', TRUE);
				if ($id_rol === false) {
					echo "<p>ERROR AL CARGAR LOS DATOS DEL ROL.</p>";
				} else {
					$roles = $this->mdl_seg->traer_roles($id_rol);
					if ($roles != false) {
						$datos['permiso'] = $tipoacceso;
						foreach ($roles as $rol) {
							$datos['id_rol'] = $rol->id_rol;
							$datos['nombre'] = $rol->nombre;
							$datos['fijo'] = $rol->fijo;
						}
						$usuarios = $this->mdl_seg->traer_usuarios_por_rol($id_rol);
						$permisos_rol = $this->seguridad->pintar_permisos_rol($id_rol);
						$datos['usuarios'] = $usuarios;
						$datos['permisos_rol'] = $permisos_rol;
						$this->load->view('seguridad/modificar_rol', $datos);
					} else {
						echo "<p>ERROR AL CARGAR LA PANTALLA DE CAPTURA DE ROLES.</p>";
					}
				}
			} else echo "<p>NO CUENTA CON EL PERMISO, COMUNICARSE CON EL ADMIN PARA SOLICITAR ACCESO AL MODULO.</p>";
		} else echo "<p>NO CUENTA CON EL PERMISO, COMUNICARSE CON EL ADMIN PARA SOLICITAR ACCESO AL MODULO.</p>";
	} */

	public function cambiar_mi_contrasenia()
	{
		session_start();
		$oldpaddpassword = $this->request->getPost('oldpaddpassword');
		$change = $this->request->getPost('newpassword');
		$idusuario = $_SESSION['iduser19'];

		$usuario = $this->mdl_seg->get_usuario_contrasenia($idusuario);
		if ($usuario) {

			$contrasenia = $usuario->password;
			if (md5($oldpaddpassword) == $contrasenia) {
				$oldpass = $usuario->oldPassword;
				$pass = $usuario->password;
				$explode = explode(",", $oldpass);
				$bool = false;
				$newmd5 = md5($change);
				foreach ($explode as $value) {
					if ($value == $newmd5) {
						$bool = true;
					}
				}
				if (!$bool && $pass != $newmd5) {
					$explode[] = $pass;
					$dataNew = [
						"password" => $newmd5,
						"random" => 1,
						"oldPassword" => implode(",", $explode)
					];
					$result = $this->mdl_seg->cambiar_contrasenia($idusuario, $dataNew);
					if ($result) {
						echo 1;
					} else {
						echo 2;
					}
				} else {
					echo 4;
				}
			} else {
				echo 3;
			}
		} else {
			echo 2;
		}
	}
}
