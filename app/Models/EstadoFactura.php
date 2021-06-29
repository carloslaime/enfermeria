<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EstadoFactura extends Model
{
    use HasFactory;
    protected $table="estadofacturas";

    public function obtenerEstadoFacturas($buscar='', $pagina=1)
    {
        $limite=7;        
        $pagina = $pagina ? $pagina : 1;//no modificar (inicia la pagina)
        $inicio =  ($pagina -1)* $limite; // define el inicio

        $filtro="";
        if ($buscar!="") {
            $filtro=" and (p.estado like '%$buscar%') ";
        }

        $sql = "select * from estadofacturas p
                where p.eliminado = 0 $filtro order by id desc limit $inicio,$limite";
        $estadofacturas = DB::select($sql);

        $sqlTotal = "select count(*) as total from estadofacturas p
                    where p.eliminado = 0 $filtro";
        $result = DB::select($sqlTotal); //no tocar 
        $total=$totPaginas=0;
        if (count($result)>0) {
            $total=$result[0]->total;
            $totPaginas = round($total/$limite, 2)>floor($total/$limite)?floor($total/$limite)+1:floor($total/$limite);
        } //hasta aqui
        return [
            'estadofacturas'=>$estadofacturas,
            'total'=>$total, //NT
            'parPaginacion'=>['pagActual'=>$pagina,'totPaginas'=>$totPaginas] //NT
        ];
    }

    public function obtenerEstadoFacturasActivos()
    {
        $sql = "select id,nombre from estadofacturas p where p.eliminado =0 and activo=1 order by nombre asc";
        $estadofacturas = DB::select($sql);
        return $estadofacturas;
    }

}
