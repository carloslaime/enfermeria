<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Modalidad extends Model
{
    use HasFactory;
    protected $table="modalidades";

    public function obtenerModalidades($buscar='', $pagina=1)
    {
        $limite=7;        
        $pagina = $pagina ? $pagina : 1;//no modificar (inicia la pagina)
        $inicio =  ($pagina -1)* $limite; // define el inicio

        $filtro="";
        if ($buscar!="") {
            $filtro=" and (p.tipo like '%$buscar%') ";
        }

        $sql = "select * from modalidades p
                where p.eliminado = 0 $filtro order by id desc limit $inicio,$limite";
        $modalidades = DB::select($sql);

        $sqlTotal = "select count(*) as total from modalidades p
                    where p.eliminado = 0 $filtro";
        $result = DB::select($sqlTotal); //no tocar 
        $total=$totPaginas=0;
        if (count($result)>0) {
            $total=$result[0]->total;
            $totPaginas = round($total/$limite, 2)>floor($total/$limite)?floor($total/$limite)+1:floor($total/$limite);
        } //hasta aqui
        return [
            'modalidades'=>$modalidades,
            'total'=>$total, //NT
            'parPaginacion'=>['pagActual'=>$pagina,'totPaginas'=>$totPaginas] //NT
        ];
    }

    public function obtenerModalidadesActivos()
    {
        $sql = "select id,tipo from modalidades p where p.eliminado =0 and activo=1 order by tipo asc";
        $modalidades = DB::select($sql);
        return $modalidades;
    }

}
