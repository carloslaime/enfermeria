<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Domicilio extends Model
{
    use HasFactory;
    protected $table="coordenadas";

    public function obtenerCoordenadas($buscar='', $pagina=1)
    {
        $limite=7;        
        $pagina = $pagina ? $pagina : 1;//no modificar (inicia la pagina)
        $inicio =  ($pagina -1)* $limite; // define el inicio

        $filtro="";
        if ($buscar!="") {
            $filtro=" and (p.latitud like '%$buscar%' or p.longitud or p.domicilio_id like '%$buscar%') ";
        }

        $sql = "select * from coordenadas p
                where p.eliminado = 0 $filtro order by id desc limit $inicio,$limite";
        $coordenadas = DB::select($sql);

        $sqlTotal = "select count(*) as total from coordenadas p
                    where p.eliminado = 0 $filtro";
        $result = DB::select($sqlTotal); //no tocar 
        $total=$totPaginas=0;
        if (count($result)>0) {
            $total=$result[0]->total;
            $totPaginas = round($total/$limite, 2)>floor($total/$limite)?floor($total/$limite)+1:floor($total/$limite);
        } //hasta aqui
        return [
            'coordenadas'=>$coordenadas,
            'total'=>$total, //NT
            'parPaginacion'=>['pagActual'=>$pagina,'totPaginas'=>$totPaginas] //NT
        ];
    }

    public function obtenerCoordenadasActivos()
    {
        $sql = "select id,longitud,latitud from coordenadas p where p.eliminado =0 and activo=1 order by id asc";
        $coordenadas = DB::select($sql);
        return $coordenadas;
    }

    public function getCoordenadasDomicilio($id=''){
        $sql = "select longitud, latitud from coordenadas where domicilio_id = '%$id%'";
        $coordenadas = DB::select($sql);
        return $coordenadas;
    }
}
