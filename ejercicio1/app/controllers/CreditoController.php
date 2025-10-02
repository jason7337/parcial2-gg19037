<?php


namespace app\controllers;


use app\models\SolicitudModel;


class CreditoController{

    public function index(){
        return $this->view('formulario');
    }

    public function calcular(){
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            return $this->view('error', ['mensaje'=>'Metodo no permitido']);
        }

        $nombre = $_POST['nombre'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $dui = $_POST['dui'] ?? '';
        $monto = $_POST['monto'] ?? 0;
        $tasa = $_POST['tasa'] ?? 0;
        $plazo = $_POST['plazo'] ?? 0;

        if(!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)){
            return $this->view('error', ['mensaje'=>'Nombre invalido']);
        }

        if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $correo)){
            return $this->view('error', ['mensaje'=>'Correo invalido']);
        }

        if(!preg_match("/^\d{8}-\d{1}$/", $dui)){
            return $this->view('error', ['mensaje'=>'DUI invalido formato 00000000-0']);
        }

        if($monto <= 0 || $tasa <= 0 || $plazo <= 0){
            return $this->view('error', ['mensaje'=>'Monto, tasa y plazo deben ser mayores a 0']);
        }

        $i = ($tasa / 12) / 100;
        $n = $plazo;
        $P = $monto;

        $cuota = $P * ($i * pow(1 + $i, $n)) / (pow(1 + $i, $n) - 1);

        $tabla = [];
        $capital_pendiente = $P;

        for($mes = 1; $mes <= $n; $mes++){
            $intereses = $capital_pendiente * $i;
            $capital_abonado = $cuota - $intereses;
            $capital_pendiente = $capital_pendiente - $capital_abonado;

            $tabla[] = [
                'mes' => $mes,
                'cuota' => $cuota,
                'intereses' => $intereses,
                'capital' => $capital_abonado,
                'saldo' => $capital_pendiente
            ];
        }

        $modelo = new SolicitudModel();
        $modelo->guardar($nombre, $correo, $dui, $monto, $tasa, $plazo, $cuota);

        return $this->view('resultado', [
            'nombre' => $nombre,
            'correo' => $correo,
            'dui' => $dui,
            'cuota' => $cuota,
            'tabla' => $tabla
        ]);
    }

    public function view($vista, $data=[]){
        extract($data);
        if(file_exists("../app/views/$vista.php")){
            ob_start();
            include "../app/views/$vista.php";
            $content = ob_get_clean();
            return $content;
        }
        else{
            echo "vista no encontrada ../app/views/$vista.php";
        }
    }
}


?>
