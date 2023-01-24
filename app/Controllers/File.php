<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Files\UploadedFile;
use App\Libraries\Class_seguridad;
use App\Models\Model_ajustes;
use App\Models\Model_selectores;

require_once './app/Libraries/PhpSpreadsheet-master/src/PhpSpreadsheet/IOFactory.php';

class File extends BaseController
{
    var $model_log2;
    var $model_ajustes;
    var $model_selectores;
    var $model_configuracion;
    var $seguridad;


    public function __construct()
    {
        $this->seguridad = new Class_seguridad();
        $this->model_ajustes = new Model_ajustes();
        $this->model_selectores = new Model_selectores();
        date_default_timezone_set('America/Mexico_City');
        session_start();
    }

    public function index()
    {
        if (isset($_SESSION['iduser19'])) {
            $tipoacceso = $this->seguridad->check_permission($_SESSION['iduser19'], $this->seguridad->key_access('FILE'));
            if ($tipoacceso >= 1) {
                //$data['tables'] = $this->model_selectores->get_all_tables();
                echo view('file/index');
            } else {
                echo "<p>NO CUENTA CON EL PERMISO, COMUNICARSE CON EL ADMIN PARA SOLICITAR ACCESO AL MODULO.</p>";
            }
        } else {
            $this->seguridad->login_back();
        }
    }

    public function upload_file()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $spreadsheet = IOFactory::load($path);
            $worksheet = $spreadsheet->getActiveSheet();
            $table_name = $worksheet->getCell('A1')->getValue(); // obtener el nombre de la tabla desde la celda A1
            $this->upload_model->create_table($table_name, $worksheet); // pasar el nombre de la tabla y el worksheet al modelo para crearla
            $highestRow = $worksheet->getHighestRow();
            for ($row = 2; $row <= $highestRow; $row++) {
                $data = [];
                $highestColumn = $worksheet->getHighestColumn();
                for ($col = 'A'; $col <= $highestColumn; $col++) {
                    $data[$worksheet->getCell($col . '1')->getValue()] = $worksheet->getCell($col . $row)->getValue();
                }
                $this->upload_model->insert($data, $table_name);
            }
            redirect('upload');
        }
    }
}
