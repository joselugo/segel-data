<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_seguridad extends Model
{
	var  $db1;
	function __construct()
	{
		$db1 = \Config\Database::connect('default');
		$this->db1 = $db1;
	}

	public function iniciar_sesion($login = "", $password = "")
	{
		$builder = $this->db1->table('login l');
		$builder->select('l.*,r.rol as nombre_rol');
		$builder->join('rol r', 'r.id = l.rol');
		$builder->where('l.username', $login);
		$builder->where('l.password', $password);
		$builder->where('l.estado', 1);
		$query = $builder->get();
		if ($query != false)	return $query->getResult();
		else return false;
	}

	public function verificar_permiso($id_usuario, $id_permiso)
	{
		$builder = $this->db1->table('permiso cp');
		$builder->select('cup.tipo_acceso AS permiso_usuario,cup.id_permiso');
		$builder->join('login_permiso cup', 'cup.id_permiso = cp.id_permiso AND cup.id_usuario = ' . $id_usuario, 'left');
		$builder->where('cup.id_permiso', $id_permiso);
		$builder->where('cup.id_usuario', $id_usuario);
		$query = $builder->get();
		if ($query != false)	return $query->getResult();
		else return false;
	}

	public function traer_menu_sistema($id_usuario = 0, $padre = 0)
	{
		$builder = $this->db1->table('permiso cp');
		$builder->select('cp.id_permiso, cp.modulo, cp.url, cp.clase, IFNULL(cup.tipo_acceso, -1) AS permiso_usuario, IFNULL(cup.tipo_acceso, 0) AS permiso_rol', FALSE);
		$builder->join('login_permiso cup', 'cup.id_permiso = cp.id_permiso AND cup.id_usuario = ' . $id_usuario, 'left');
		$builder->where('cp.tipo', 1);
		$builder->where('cp.padre', $padre);
		$builder->where('cp.activo', 1);
		$builder->orderBy('cp.orden, cp.id_permiso');
		$query = $builder->get();
		if ($query != false)	return $query->getResult();
		else return false;
	}

	function get_permisos($id_usuario)
	{
		$builder = $this->db1->table('login');
		$builder->select('*');
		$builder->where('id', $id_usuario);
		$query = $builder->get();
		if ($query != false)	return $query->getRow();
		else return false;
	}

	public function get_usuario_contrasenia($idusuario)
	{
		$builder = $this->db1->table('login');
		$builder->select('password,oldPassword');
		$builder->where('id', $idusuario);
		$query = $builder->get();
		return $query ? $query->getRow() : false;
	}

	public function cambiar_contrasenia($id, $data)
	{
		$builder = $this->db1->table('login');
		$builder->where('id', $id);
		$builder->update($data);
		$result = $this->db1->affectedRows();
		return $result > 0 ? true : false;
	}
}
