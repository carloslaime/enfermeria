<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Domicilio extends Model
{
    use HasFactory;
    protected $table="domicilios";

    public function obtenerDomicilios($buscar='', $pagina=1)
    {
        $limite=7;        
        $pagina = $pagina ? $pagina : 1;//no modificar (inicia la pagina)
        $inicio =  ($pagina -1)* $limite; // define el inicio

        $filtro="";
        if ($buscar!="") {
            $filtro=" and (p.avenida like '%$buscar%' or p.calle or p.numero like '%$buscar%')  ";
        }

        $sql = "select * from domicilios p
                where p.eliminado = 0 $filtro order by id desc limit $inicio,$limite";
        $domicilios = DB::select($sql);

        $sqlTotal = "select count(*) as total from domicilios p
                    where p.eliminado = 0 $filtro";
        $result = DB::select($sqlTotal); //no tocar 
        $total=$totPaginas=0;
        if (count($result)>0) {
            $total=$result[0]->total;
            $totPaginas = round($total/$limite, 2)>floor($total/$limite)?floor($total/$limite)+1:floor($total/$limite);
        } //hasta aqui
        return [
            'domicilios'=>$domicilios,
            'total'=>$total, //NT
            'parPaginacion'=>['pagActual'=>$pagina,'totPaginas'=>$totPaginas] //NT
        ];
    }

    public function obtenerDomiciliosActivos()
    {
        $sql = "select id, concat('Av. ',coalesce(d.avenida),', Calle ',coalesce(d.calle),', #',d.numero)as direccion 
        from domicilios d 
        where d.eliminado =0 and d.activo=1 ";
        $domicilios = DB::select($sql);
        return $domicilios;
    }

    public static function getDomicilio($id){
        $sql = "select d.*,concat(p.primer_apellido,' ',coalesce(p.segundo_apellido,''),' ',p.nombres) as nombre from domicilios d
                inner join pacientes p on p.id = d.paciente_id
                where d.eliminado = 0 and d.id=$id";
        $domicilios = DB::select($sql);
        if(count($domicilios)>0){
            return $domicilios[0];
        }else{
            return null;
        }
    }
}
