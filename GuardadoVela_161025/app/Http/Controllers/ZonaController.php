<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zona;

class ZonaController extends Controller
{
    public function obtenerZonas(){

        $Zona = new Zona();

        $satisfactorio = false;
        $estado = 0;
        $mensaje = "";
        $errores = [];
        $valores = [];

        $valores = $Zona::all();

        if(!empty($valores)){
            $satisfactorio = true;
            $estado = 200;
            $mensaje = "Valores encontrados";
            $errores = [
                "code"=> 200,
                "msg" => ""
            ];
        }else{
            $satisfactorio = false;
            $estado = 404;
            $mensaje = "No se han encontrado valores";
            $errores = [
                "code" => 404,
                "msg" => "Datos no encontrados"
            ];
        }

        $respuesta = [
            "success" => $satisfactorio,
            "status" => $estado,
            "msg" => $mensaje,
            "data" => $valores,
            "error" => $errores,
            "total" => sizeof($valores)
        ];

        return response()->json($respuesta,$estado);
    }

    public function obtenerZona(int $idzona = 0){
        
        $satisfactorio = false;
        $estado = 0;
        $mensaje = "";
        $errores = [];
        $valores = [];

        if($idzona > 0){
            $Zona = new Zona();
            $valores = $Zona->where('id_zona',$idzona)->get();

            if(!empty($valores)){
                $satisfactorio = true;
                $estado = 200;
                $mensaje = "Valores encontrados";
                $errores = [
                    "code"=> 200,
                    "msg" => ""
                ];
            }else{
                $satisfactorio = false;
                $estado = 404;
                $mensaje = "No se han encontrado valores";
                $errores = [
                    "code" => 404,
                    "msg" => "Datos no encontrados"
                ];
            }
        }else{
                $satisfactorio = false;
                $estado = 400;
                $mensaje = "No se ha enviado el parametro obligtorio";
                $errores = [
                    "code" => 400,
                    "msg" => "El identificador de la Zona esta vacio"
                ];
        }

    $respuesta = [
            "success" => $satisfactorio,
            "status" => $estado,
            "msg" => $mensaje,
            "data" => $valores,
            "error" => $errores,
            "total" => sizeof($valores)
        ];
        return response()->json($respuesta,$estado);
    }

}
