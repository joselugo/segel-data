<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_dashboard extends Model
{
    public $db1;
    public function __construct()
    {
        $db1 = \Config\Database::connect('default');
        $this->db1 = $db1;
    }
    public function get_nombre_user(String $id){
      $builder = $this->db1->table('login');
      $builder->select('nombre username');
      $builder->where('id',$id);
      $query = $builder->get();
    return $query ? $query->getRow() : false;
    }
    public function get_servicios_online(){
      $builder = $this->db1->table('tblservicios t');
      $builder->select('count(t.id) online');
      $builder->join('usuarios2 u','u.id=t.idcliente','left');
      $builder->where('t.status_user','ONLINE');
      $builder->where('u.estado','ACTIVO');
      $query = $builder->get();
      return $query ? $query->getRow() : false;
    }
    public function get_pagoshoy(String $anio, String $mes,$dia){
      $builder = $this->db1->table('operaciones');
      $builder->select('SUM(cobrado) pagos');
    $builder->where('MONTH(fecha_pago)', $mes);
    $builder->where('YEAR(fecha_pago)', $anio);
    $builder->where('DAY(fecha_pago)', $dia);
      $query = $builder->get();
      return $query ? $query->getRow() : false;
    }
    public function facturas_no_pagadas(){
      $builder = $this->db1->table('facturas');
      $builder->select('count(id) facturas');
      $builder->where('estado', 'No pagado');
      $query = $builder->get();
      return $query ? $query->getRow() : false;
    }
    public function soporte_activo(){
      $builder = $this->db1->table('soporte');
      $builder->select('count(id)  ticket');
      $builder->where('estado','abierto');//respondido
      $query = $builder->get();
      return $query ? $query->getRow() : false;
    }
    public function servicios_registrados(){
      $builder = $this->db1->table('tblservicios t');
      $builder->select('count(t.id) servicios');
      $builder->join('usuarios2 u','u.id=t.idcliente','left');
      $builder->where('u.estado','SUSPENDIDO');
      $builder->orWhere('u.estado','ACTIVO');
      $query = $builder->get();
    return $query ? $query->getRow() : false;
    }
    public function pagos_del_mes(String $anio,String $mes){
      $builder = $this->db1->table('operaciones');
      $builder->select('SUM(cobrado) pagos,count(id) total_pagos');
      $builder->where('MONTH(fecha_pago)',$mes);
      $builder->where('YEAR(fecha_pago)',$anio);
      $query = $builder->get();
      return $query ? $query->getRow() : false;
    }
    public function get_facturas_vencidas(String $hoy){
      $builder = $this->db1->table('facturas');
      $builder->select('COUNT(id) vencidas');
      $builder->where('vencimiento<',$hoy);
      $builder->where('estado','No pagado');
      $query = $builder->get();
    return $query ? $query->getRow() : false;
    }
    public function soporte_abierto(){
      $builder = $this->db1->table('soporte');
      $builder->select('count(id) ticket');
      $builder->where('estado','abierto');
      $builder->orWhere('estado','respondido');
      $query = $builder->get();
    return $query ? $query->getRow() : false;
    }
    public function routers_activos(){
      $builder = $this->db1->table('server');
      $builder->select('count(id) activos');
      $builder->where('estado_netium','1');
      $query = $builder->get();
    return $query ? $query->getRow() : false;
    }
    public function routers_desconectados(){
      $builder = $this->db1->table('server');
      $builder->select('count(id) desconectados');
      $builder->where('estado_netium','0');
      $query = $builder->get();
    return $query ? $query->getRow() : false;
    }
    public function clientes_activos(){
      $builder = $this->db1->table('usuarios2');
      $builder->select('count(id) activos');
      $builder->where('estado','ACTIVO');
      $query = $builder->get();
    return $query ? $query->getRow() : false;
    }
    public function clientes_suspendidos(){
      $builder = $this->db1->table('usuarios2');
      $builder->select('count(id) suspendidos');
      $builder->where('estado','SUSPENDIDO');
      $query = $builder->get();
    return $query ? $query->getRow() : false;
    }
    public function emisores_activos(){
      $builder = $this->db1->table('emisores');
      $builder->select('count(id) activos');
      $builder->where('estado_netium',1);
      $query = $builder->get();
    return $query ? $query->getRow() : false;
    }
    public function emisores_caidos(){
      $builder = $this->db1->table('emisores');
      $builder->select('count(id) caidos');
      $builder->where('estado_netium',0);
      $query = $builder->get();
    return $query ? $query->getRow() : false;
    }
    public function ultimos_pagos(){
      $builder = $this->db1->table('operaciones o');
      $builder->select('u.id idcliente,u.nombre cliente,o.cobrado,l.nombre,o.fecha_pago fecha');
      $builder->join('usuarios2 u', 'o.idcliente=u.id','left');
      $builder->join('login l', 'l.id=o.operador','left');
      $builder->limit(11);
      $builder->orderBy('o.fecha_pago DESC');
      $query = $builder->get();
    return $query ? $query->getResult() : false;
    }
    public function ultimos_conectados(){
      $builder = $this->db1->table('logsistema l');
      $builder->select('u.id idcliente,u.nombre,fechalog fecha');
      $builder->join('usuarios2 u', 'l.idcliente=u.id','left');
      $builder->like('log', 'Servicio Cliente ONLINE');
      $builder->limit(12);
      $builder->orderBy('l.id DESC');
      $query = $builder->get();
    return $query ? $query->getResult() : false;
    }
    public function facturas_mes(String $anio,String $mes){
      $builder = $this->db1->table('facturas');
      $builder->select('COUNT(id) facturas,SUM(cobrado) total_facturas');
      $builder->where('MONTH(vencimiento)',$mes);
      $builder->where('YEAR(vencimiento)',$anio);
      $builder->where('estado','pagado');
      $query = $builder->get();
      return $query ? $query->getRow() : false;
    }
    public function facturas_mes_sin_pagar(String $anio,String $mes){
      $builder = $this->db1->table('facturas');
      $builder->select('COUNT(id) facturas,SUM(total) total_facturas');
      $builder->where('MONTH(vencimiento)',$mes);
      $builder->where('YEAR(vencimiento)',$anio);
      $builder->where('estado','No pagado');
      $query = $builder->get();
    return $query ? $query->getRow() : false;
    }
    public function get_emisores(){
      $builder = $this->db1->table('emisores');
      $builder->select('id,nombre,equipo,ip,estado_netium');
      $query = $builder->get();
    return $query ? $query->getResult() : false;
    }
   public function get_data_grafico(Array $fechas){
      $unGb=pow(1024,4);
      $builder = $this->db1->table('traficodata');
      $builder->select("CONCAT(DAY(datestart), \"/\", MONTH(datestart),\"/\", YEAR(datestart)) period,SUM(IFNULL(upload,0)) rx,SUM(IFNULL(dowload,0)) tx");
      $builder->where("datestart between '$fechas[0]' and DATE_ADD('$fechas[6]',INTERVAL 1 DAY)");
      $builder->groupBy('period');
      $builder->orderBy("datestart ASC");
      $query = $builder->get();
    return $query ? $query->getResult() : false;
    }   
    public function get_total_trafico_ultimos_7_dias(array $fechas){
      $builder = $this->db1->table('traficodata');
      $builder->select('IFNULL(SUM(upload),0) subida, IFNULL(SUM(dowload),0) descarga');
      $builder->where("datestart between '$fechas[6]' and DATE_ADD('$fechas[6]',INTERVAL 1 DAY)");
      $query = $builder->get();
    return $query ? $query->getRow() : false;
    }
}
