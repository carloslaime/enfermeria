<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Enfermera extends Model{

    use HasFactory;
    protected $table="enfermeras";

    
    public function obtenerEnfermeras($buscar='', $pagina=1)
    {
        $limite=15;
        $pagina = $pagina ? $pagina : 1;//no modificar (inicia la pagina)
        $inicio =  ($pagina -1)* $limite; // define el inicio

        $filtro="";
        if ($buscar!="") {
            $filtro=" and (p.nombres like '%$buscar%' or p.primer_apellido or p.segundo_apellido or p.ci like '%$buscar%') ";
        }

        $sql = "select * from enfermeras p
                where p.eliminado = 0 $filtro order by id desc limit $inicio,$limite";
        $enfermeras = DB::select($sql);

        $sqlTotal = "select count(*) as total from enfermeras p
        where p.eliminado = 0 $filtro";
        $result = DB::select($sqlTotal); //no tocar 
        $total=$totPaginas=0;
        if (count($result)>0) {
            $total=$result[0]->total;
            $totPaginas = round($total/$limite, 2)>floor($total/$limite)?floor($total/$limite)+1:floor($total/$limite);
        } //hasta aqui
        return [
            'enfermeras'=>$enfermeras,
            'total'=>$total, //NT
            'parPaginacion'=>['pagActual'=>$pagina,'totPaginas'=>$totPaginas] //NT
        ];
    }

   /* public function buscarPersonas($buscar){
        $sql="select id,concat(p.primer_apellido,' ',coalesce(p.segundo_apellido,''),' ',p.nombres) as nombre  from personas p 
            where concat(p.primer_apellido,' ',coalesce(p.segundo_apellido,''),' ',p.nombres) like '%$buscar%' and p.eliminado =0
            and not exists (select u.id from enfermeras u where u.id=p.id )";

        $personas = DB::select($sql);
        return $personas;
    }

   public function obtenerEnfermerasActivos()
    {
        $sql = "select id
                from enfermeras gr
                where gr.eliminado =0 and activo=1 order by id asc";
        $enfermeras = DB::select($sql);
        return $enfermeras;
    }
*/
    public Static function getNombreCompleto($id){
        $sql="select u.*,p.nombre as perfil, concat(pe.primer_apellido,' ',coalesce(pe.segundo_apellido,''),' ',pe.nombres) as persona from enfermeras u 
        left join perfiles p on p.id =u.perfil_id
        inner join enfermeras pe on pe.id=u.id
        where u.id=$id";

        $enfermeras= DB::select($sql);

        if(count($enfermeras)>0){
            return $enfermeras[0];
        }else{
            return null;
        }
    }

    public static function getIdPerfilEnfermera(){
        return 2;
    }


    public static function getEstado(){
        $sql="select estado_id from enfermeras e";
        $enfermeras= DB::select($sql);
        if($sql==1){
            return 1;
        }else if($sql==2){
            return 2;
        }else if($sql==2){
            return 3;
        }else{
            return 4;
        }
    }
}