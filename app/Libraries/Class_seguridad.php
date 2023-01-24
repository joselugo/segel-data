<?php

namespace App\Libraries;

use App\Models\Model_seguridad;
use App\Models\Model_configuracion;

class Class_seguridad
{
    //var instancias
    var $mdl_security;
    var $mdl_conf;

    function __construct()
    {
        $this->mdl_conf = new Model_configuracion();
        $this->mdl_security = new Model_seguridad();
    }

    function key_access($modulo = '')
    {
        switch ($modulo) {
            case "HOME":
                $clave = 1;
                break;
            case 'AJUSTES':
                $clave = 2;
                break;
            case 'PERMISOS':
                $clave = 4;
                break;
            case 'GESTION_PERSONAL':
                $clave = 5;
                break;
            case 'BASE_DATOS':
                $clave = 6;
                break;
            case 'OFICINA':
                $clave = 7;
                break;
            case 'LOGS':
                $clave = 8;
                break;
            case 'LICENCIA':
                $clave = 9;
                break;
            case 'GENERAL':
                $clave = 10;
                break;
            case 'FILE':
                $clave = 14;
                break;

            default:
                $clave = 0;
        }
        return $clave;
    }

    function print_menu($id_usuario)
    {
        $menu = '';
        $id_permiso_ant = 0;
        $modulos = $this->mdl_security->traer_menu_sistema($id_usuario, 0);
        if ($modulos != false) {
            $menu = '<ul class="nav">' . PHP_EOL;
            $menu .= '<li class="nav-header">Menú</li>
                    <li class="has-sub active">
                    <a href="#index/home">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                     </a>
                    </li>';
            foreach ($modulos as $padre) {
                if ((int)$padre->id_permiso != $id_permiso_ant) {
                    $show = (((int)$padre->permiso_usuario > 0) || ((int)$padre->permiso_usuario < 0 && (int)$padre->permiso_rol > 0));
                    if ($show) {
                        $onclick = '';
                        $ruta = '<li>Inicio</li><li>' . $padre->modulo . '</li>';
                        if (strlen($padre->url) > 0) {
                            $url = $padre->url;
                            $onclick = '';
                        } else {
                            $url = "javascript:void(0)";
                        }
                        if ($padre->modulo == "Ajustes" ||  $padre->modulo == "Formatos") {

                            $menu .= '  <li class="has-sub"><a href="#' . $url . '" data-toggle="ajax"><i class="' . $padre->clase . '"></i> <span>' . $padre->modulo . '</span></a>' . PHP_EOL;
                        } else {
                            $menu .= '  <li class="has-sub"><a href="' . $url . '"><b class="caret pull-right"></b><i class="' . $padre->clase . '"></i> <span>' . $padre->modulo . '</span></a>' . PHP_EOL;
                        }
                        $permisos = $this->mdl_security->traer_menu_sistema($id_usuario, $padre->id_permiso);
                        if ($permisos != false) {
                            $menu .= $this->print_submenu($id_usuario, $permisos, $ruta);
                        }
                        $menu .= '  </li>' . PHP_EOL;
                        $id_permiso_ant = (int)$padre->id_permiso;
                    }
                }
            }
            $menu .= '<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fas fa-angle-double-left"></i></a></li>' . PHP_EOL;
            $menu .= '</ul>' . PHP_EOL;
        }
        return $menu;
    }

    function print_submenu($id_usuario, $opciones) //nuevaruta
    {
        $submenu = '';
        $id_permiso_ant = 0;

        foreach ($opciones as $opcion) {
            if ((int)$opcion->id_permiso != $id_permiso_ant) {
                $show = (((int)$opcion->permiso_usuario > 0) || ((int)$opcion->permiso_usuario < 0 && (int)$opcion->permiso_rol > 0));
                if ($show) {
                    if (strlen($submenu) == 0) {
                        $submenu .= '    <ul class="sub-menu">' . PHP_EOL;
                    }
                    /* if (strlen($opcion->url) > 0) {
                        //$url = base_url().'index.php/'.$opcion->url;
                        //$onclick = ' onclick="CargarModulo(\''.base_url().'\', \''.$opcion->url.'\', \''.$nuevaruta.'\');"';
                    } */
                    $submenu .= '      <li><a href="#' . $opcion->url . '" data-toggle="ajax">';
                    $submenu .= $opcion->modulo . '</a>' . PHP_EOL;
                    $permisos = $this->mdl_security->traer_menu_sistema($id_usuario, $opcion->id_permiso);
                    if ($permisos != false) {
                        $submenu .= $this->print_submenu($id_usuario, $permisos); //nuevaruta
                    }
                    $submenu .= '      </li>' . PHP_EOL;
                    $id_permiso_ant = (int)$opcion->id_permiso;
                }
            }
        }
        if (strlen($submenu) > 0) {
            $submenu .= '    </ul>' . PHP_EOL;
        }
        return $submenu;
    }

    function paint_role_permission($id_rol)
    {
        $arbol = '';
        $modulos = $this->mdl_security->traer_permisos_rol($id_rol, 0);
        if ($modulos != false) {
            $arbol = '<ul>' . PHP_EOL;
            foreach ($modulos as $padre) {
                $arbol .= '  <li>' . PHP_EOL;
                $permisos = $this->mdl_security->traer_permisos_rol($id_rol, $padre->id_permiso);
                if ($permisos != false) {
                    $arbol .= '    <span><i class="fa fa-lg fa-plus-circle"></i> ' . $padre->modulo . '</span>' . PHP_EOL;
                    $arbol .= $this->kids_permission($id_rol, $permisos);
                } else {
                    $arbol .= '    <span>' . $padre->modulo . '</span>' . PHP_EOL;
                    $checked = "";
                    if ((int)$padre->permiso_rol == 0) $checked = ' checked="checked"';
                    $arbol .= '    <label><input type="checkbox" name="chkdenegado[]" id="den' . $padre->id_permiso . '" value="' . $padre->id_permiso . '" onchange="VerificarCheckbox(this.id);" disabled="disabled"' . $checked . '><i></i> Denegado</label>' . PHP_EOL;
                    $checked = "";
                    if ((int)$padre->permiso_rol == 1) $checked = ' checked="checked"';
                    $arbol .= '    <label><input type="checkbox" name="chklectura[]" id="lec' . $padre->id_permiso . '" value="' . $padre->id_permiso . '" onchange="VerificarCheckbox(this.id);" disabled="disabled"' . $checked . '><i></i> Lectura</label>' . PHP_EOL;
                    $checked = "";
                    if ((int)$padre->permiso_rol == 2) $checked = ' checked="checked"';
                    $arbol .= '    <label><input type="checkbox" name="chkescritura[]" id="esc' . $padre->id_permiso . '" value="' . $padre->id_permiso . '" onchange="VerificarCheckbox(this.id);" disabled="disabled"' . $checked . '><i></i> Escritura</label>' . PHP_EOL;
                }
                $arbol .= '  </li>' . PHP_EOL;
            }
            $arbol .= '</ul>' . PHP_EOL;
        }
        return $arbol;
    }

    function kids_permission($id_rol, $opciones)
    {
        $hijos = '    <ul>';
        foreach ($opciones as $opcion) {
            $hijos .= '      <li style="display:none">' . PHP_EOL;
            $hijos .= '        <span>' . $opcion->modulo . '</span>' . PHP_EOL;
            $permisos = $this->mdl_security->traer_permisos_rol($id_rol, $opcion->id_permiso);
            if ($permisos != false) {
                $hijos .= $this->kids_permission($id_rol, $permisos);
            } else {
                $checked = "";
                if ((int)$opcion->permiso_rol == 0) $checked = ' checked="checked"';
                $hijos .= '        <label><input type="checkbox" name="chkdenegado[]" id="den' . $opcion->id_permiso . '" value="' . $opcion->id_permiso . '" onchange="VerificarCheckbox(this.id);" disabled="disabled"' . $checked . '><i></i> Denegado</label>' . PHP_EOL;
                $checked = "";
                if ((int)$opcion->permiso_rol == 1) $checked = ' checked="checked"';
                $hijos .= '        <label><input type="checkbox" name="chklectura[]" id="lec' . $opcion->id_permiso . '" value="' . $opcion->id_permiso . '" onchange="VerificarCheckbox(this.id);" disabled="disabled"' . $checked . '><i></i> Lectura</label>' . PHP_EOL;
                $checked = "";
                if ((int)$opcion->permiso_rol == 2) $checked = ' checked="checked"';
                $hijos .= '        <label><input type="checkbox" name="chkescritura[]" id="esc' . $opcion->id_permiso . '" value="' . $opcion->id_permiso . '" onchange="VerificarCheckbox(this.id);" disabled="disabled"' . $checked . '><i></i> Escritura</label>' . PHP_EOL;
            }
            $hijos .= '      </li>' . PHP_EOL;
        }
        $hijos .= '    </ul>';
        return $hijos;
    }

    function paint_permission_roles_user($id_usuario, $editar = 0)
    {
        $arbol = '';
        $modulos = $this->mdl_security->traer_permisos_por_padre(0);
        if ($modulos != false) {
            $arbol = '<ul>' . PHP_EOL;
            foreach ($modulos as $padre) {
                $arbol .= '  <li>' . PHP_EOL;
                $permisos = $this->mdl_security->traer_permisos_por_padre($padre->id_permiso);
                if ($permisos != false) {
                    $arbol .= '    <span><i class="fa fa-lg fa-plus-circle"></i> ' . $padre->modulo . '</span>' . PHP_EOL;
                    $arbol .= $this->kids_permission_users($id_usuario, $permisos, $editar);
                } else {
                    $arbol .= '    <span>' . $padre->modulo . '</span>' . PHP_EOL;
                    $tipo_acceso = $this->check_permissions_role($id_usuario, $padre->id_permiso);
                    $arbol .= '    <label>' . $this->access_name($tipo_acceso) . '</label>' . PHP_EOL;
                    if ($editar > 0) {
                        $arbol .= '    <a class="btn-default" href="javascript:void(0);" title="Asignar permiso especial" onclick="AsignarPermisoEspecial(' . $id_usuario . ', ' . $padre->id_permiso . ', \'' . $padre->modulo . '\');"> <i class="fa fa-pencil"></i> </a>' . PHP_EOL;
                    }
                }
                $arbol .= '  </li>' . PHP_EOL;
            }
            $arbol .= '</ul>' . PHP_EOL;
        }
        return $arbol;
    }

    function kids_permission_users($id_usuario, $opciones, $editar = 0)
    {
        $hijos = '    <ul>';
        foreach ($opciones as $opcion) {
            $hijos .= '      <li style="display:none">' . PHP_EOL;
            $hijos .= '        <span>' . $opcion->modulo . '</span>' . PHP_EOL;
            $permisos = $this->mdl_security->traer_permisos_por_padre($opcion->id_permiso);
            if ($permisos != false) {
                $hijos .= $this->kids_permission_users($id_usuario, $permisos, $editar);
            } else {
                $tipo_acceso = $this->check_permissions_role($id_usuario, $opcion->id_permiso);
                $hijos .= '        <label>' . $this->access_name($tipo_acceso) . '</label>' . PHP_EOL;
                if ($editar > 0) {
                    $hijos .= '      <a class="btn-default" href="javascript:void(0);" title="Asignar permiso especial" onclick="AsignarPermisoEspecial(' . $id_usuario . ', ' . $opcion->id_permiso . ', \'' . $opcion->modulo . '\');"> <i class="fa fa-pencil"></i> </a>' . PHP_EOL;
                }
            }
            $hijos .= '      </li>' . PHP_EOL;
        }
        $hijos .= '    </ul>';
        return $hijos;
    }

    function check_permissions_role($id_usuario, $id_permiso)
    {
        $tipo_acceso = 0;
        $permisos = $this->mdl_security->check_permission($id_usuario, $id_permiso);
        if ($permisos != false) {
            foreach ($permisos as $permiso) {
                $tipo_acceso_temp = (int)$permiso->permiso_rol;
                if ($tipo_acceso_temp > $tipo_acceso) {
                    $tipo_acceso = $tipo_acceso_temp;
                }
            }
        }
        return $tipo_acceso;
    }

    function connect_modules_father($modulo, $id_padre)
    {
        $ruta_modulo = $modulo;
        while ($id_padre > 0) {
            $permisos = $this->mdl_security->traer_permisos($id_padre);
            if ($permisos != false) {
                foreach ($permisos as $permiso) {
                    $modulo_padre = $permiso->modulo;
                    $id_padre = $permiso->padre;
                }
                $ruta_modulo = $modulo_padre . ' --> ' . $ruta_modulo;
            } else {
                break; //forzar cierre while
            }
        }
        return $ruta_modulo;
    }

    function access_name($tipo_acceso)
    {
        $access_name = "";
        switch ($tipo_acceso) {
            case 0:
                $access_name = "Denegado";
                break;
            case 1:
                $access_name = "Lectura";
                break;
            case 2:
                $access_name = "Escritura";
                break;
            default:
                $access_name = "No definido";
        }
        return $access_name;
    }

    function check_permission($id_usuario, $id_permiso)
    {
        $tipo_acceso = 0;
        $permisos = $this->mdl_security->verificar_permiso($id_usuario, $id_permiso);
        if ($permisos != false) {
            foreach ($permisos as $permiso) {
                $tipo_acceso_temp = 0;
                if ($permiso->permiso_usuario < 0) {
                    $tipo_acceso_temp = (int)$permiso->permiso_rol;
                } else {
                    $tipo_acceso_temp = (int)$permiso->permiso_usuario;
                }
                if ($tipo_acceso_temp > $tipo_acceso) {
                    $tipo_acceso = $tipo_acceso_temp;
                }
            }
        }
        return $tipo_acceso;
    }

    function check_permission1($id_usuario, $id_permiso)
    {
        $tipo_acceso = 0;
        $permisos = $this->mdl_security->check_permission($id_usuario, $id_permiso);
        if ($permisos != false) {
            foreach ($permisos as $permiso) {
                $tipo_acceso_temp = 0;
                if ($permiso->permiso_usuario < 0) {
                    $tipo_acceso_temp = (int)$permiso->permiso_rol;
                } else {
                    $tipo_acceso_temp = (int)$permiso->permiso_usuario;
                }
                if ($tipo_acceso_temp > $tipo_acceso) {
                    $tipo_acceso = $tipo_acceso_temp;
                }
            }
        }
        return $tipo_acceso;
    }

    public function access($NombreDeAcceso = "", $tipoDeAcceso = "escritura", $session = null)
    {
        $tipoDeAcceso = strtolower($tipoDeAcceso);
        if (isset($_SESSION['iduser19'])) {
            $tipoacceso = $this->check_permission($_SESSION['iduser19'], $this->key_access($NombreDeAcceso));
            if ($tipoacceso == 1 and $tipoDeAcceso == "lectura") {
                return $tipoacceso;
            } elseif ($tipoacceso >= 2 and ($tipoDeAcceso == "escritura" or $tipoDeAcceso == "lectura")) {
                return $tipoacceso;
            } else {
                echo "<p>NO CUENTA CON EL PERMISO, COMUNICARSE CON EL ADMIN PARA SOLICITAR ACCESO AL MODULO.</p>";
                return false;
            }
        } else {
            $ids = array(64);
            $img_db = $this->mdl_conf->get_configuracion($ids);
            $data['img'] = $img_db[0];
            echo view('login/login', $data);
            return false;
        }
    }
    public function access_full($NombreDeAcceso = "", $tipoDeAcceso = "escritura", $session = null)
    {
        $tipoDeAcceso = strtolower($tipoDeAcceso);
        if (isset($_SESSION['iduser19'])) {
            $tipoacceso = $this->check_permission($_SESSION['iduser19'], $this->key_access($NombreDeAcceso));
            if ($tipoacceso == 1 and $tipoDeAcceso == "lectura") {
                return $tipoacceso;
            } elseif ($tipoacceso >= 2 and ($tipoDeAcceso == "escritura" or $tipoDeAcceso == "lectura")) {
                return $tipoacceso;
            } elseif ($tipoacceso >= 3 and ($tipoDeAcceso == "escritura" or $tipoDeAcceso == "lectura" or $tipoDeAcceso == "eliminar")) {
                return $tipoacceso;
            } else {
                echo "<p>NO CUENTA CON EL PERMISO, COMUNICARSE CON EL ADMIN PARA SOLICITAR ACCESO AL MODULO.</p>";
                return false;
            }
        } else {
            $ids = array(64);
            $img_db = $this->mdl_conf->get_configuracion($ids);
            $data['img'] = $img_db[0];
            echo view('login/login', $data);
            return false;
        }
    }
    public function access_void($NombreDeAcceso = "", $tipoDeAcceso = "escritura", $session = null)
    {
        $tipoDeAcceso = strtolower($tipoDeAcceso);
        if (isset($_SESSION['iduser19'])) {
            $tipoacceso = $this->check_permission($_SESSION['iduser19'], $this->key_access($NombreDeAcceso));
            if ($tipoacceso == 1 and $tipoDeAcceso == "lectura") {
                return $tipoacceso;
            } elseif ($tipoacceso >= 2 and ($tipoDeAcceso == "escritura" or $tipoDeAcceso == "lectura")) {
                return $tipoacceso;
            } elseif ($tipoacceso >= 3 and ($tipoDeAcceso == "escritura" or $tipoDeAcceso == "lectura" or $tipoDeAcceso == "eliminar")) {
                return $tipoacceso;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    public function login_back()
    {
        $ids = array(64);
        $img_db = $this->mdl_conf->get_configuracion($ids);
        $data['img'] = $img_db[0];
        echo view('login/login', $data);
        return false;
    }
}
