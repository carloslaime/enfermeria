<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Servicio extends Model
{
    use HasFactory;
    protected $table="servicios";

    public function obtenerServicios($buscar='', $pagina=1)
    {
        $limite=7;        
        $pagina = $pagina ? $pagina : 1;//no modificar (inicia la pagina)
        $inicio =  ($pagina -1)* $limite; // define el inicio

        $filtro="";
        if ($buscar!="") {
            $filtro=" and (p.nombre like '%$buscar%') ";
        }

        $sql = "select * from servicios p
                where p.eliminado = 0 $filtro order by id desc limit $inicio,$limite";
        $servicios = DB::select($sql);

        $sqlTotal = "select count(*) as total from servicios p
                    where p.eliminado = 0 $filtro";
        $result = DB::select($sqlTotal); //no tocar 
        $total=$totPaginas=0;
        if (count($result)>0) {
            $total=$result[0]->total;
            $totPaginas = round($total/$limite, 2)>floor($total/$limite)?floor($total/$limite)+1:floor($total/$limite);
        } //hasta aqui
        return [
            'servicios'=>$servicios,
            'total'=>$total, //NT
            'parPaginacion'=>['pagActual'=>$pagina,'totPaginas'=>$totPaginas] //NT
        ];
    }

    public function obtenerServiciosActivos()
    {
        $sql = "select id, concat(p.nombre, '| Costo Bs: ',p.costo ) as nombre from servicios p where p.eliminado =0 and activo=1";
        $servicios = DB::select($sql);
        return $servicios;
    }

    public static function getServicio($id){
        $sql = "select s.*, m.tipo as modalidad from servicios s
                inner join modalidades m on m.id = s.modalidad_id
                where s.eliminado = 0 and s.id=$id ";
        $servicios = DB::select($sql);
        if(count($servicios)>0){
            return $servicios[0];
        }else{
            return null;
        }
    }
}
