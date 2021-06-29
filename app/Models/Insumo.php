<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Insumo extends Model
{
    use HasFactory;
    protected $table="insumos";

    public function obtenerInsumos($buscar='', $pagina=1)
    {
        $limite=7;        
        $pagina = $pagina ? $pagina : 1;//no modificar (inicia la pagina)
        $inicio =  ($pagina -1)* $limite; // define el inicio

        $filtro="";
        if ($buscar!="") {
            $filtro=" and (p.nombre like '%$buscar%') ";
        }

        $sql = "select * from insumos p
                where p.eliminado = 0 $filtro order by id desc limit $inicio,$limite";
        $insumos = DB::select($sql);

        $sqlTotal = "select count(*) as total from insumos p
                    where p.eliminado = 0 $filtro";
        $result = DB::select($sqlTotal); //no tocar 
        $total=$totPaginas=0;
        if (count($result)>0) {
            $total=$result[0]->total;
            $totPaginas = round($total/$limite, 2)>floor($total/$limite)?floor($total/$limite)+1:floor($total/$limite);
        } //hasta aqui
        return [
            'insumos'=>$insumos,
            'total'=>$total, //NT
            'parPaginacion'=>['pagActual'=>$pagina,'totPaginas'=>$totPaginas] //NT
        ];
    }

    public function obtenerInsumosActivos()
    {
        $sql = "select id,concat(p.nombre, '| Costo Bs: ',p.costo_uso) as nombre from insumos p where p.eliminado =0 and activo=1 order by nombre asc";
        $insumos = DB::select($sql);
        return $insumos;
    }

}
