<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reserva extends Model
{
    use HasFactory;
    protected $table="reservas";

    public function obtenerReservas($buscar='', $pagina=1)
    {
        $limite=7;        
        $pagina = $pagina ? $pagina : 1;//no modificar (inicia la pagina)
        $inicio =  ($pagina -1)* $limite; // define el inicio

        $filtro="";
        if ($buscar!="") {
            $filtro=" and (concat(pe.primer_apellido,' ',coalesce(pe.segundo_apellido,''),' ',pe.nombres) like '%$buscar%' or pe.ci or m.fecha like '%$buscar%') ";
        }

        $sql = "select m.*,concat(pe.primer_apellido,' ',coalesce(pe.segundo_apellido,''),' ',pe.nombres) as paciente,
        g.nombre as servicio, i.nombre as insumo, d.id as domicilio, pg.tipo as formas_pagos
        from reservas m
        inner join pacientes pe on pe.id =m.paciente_id 
        inner join servicios g on g.id = m.servicio_id
        inner join insumos i on i.id = m.insumo_id 
        inner join domicilios d on d.id = m.domicilio_id
        inner join formas_pagos pg on pg.id = m.pago_id
        where m.activo=1 $filtro order by m.id desc limit $inicio,$limite";
        $reservas = DB::select($sql);

        $sqlTotal = "select count(*) as total 
        from reservas m
        inner join pacientes pe on pe.id =m.paciente_id 
        inner join servicios g on g.id = m.servicio_id
        inner join insumos i on i.id = m.insumo_id 
        inner join domicilios d on d.id = m.domicilio_id
        inner join formas_pagos pg on pg.id = m.pago_id
        where m.activo =1 $filtro ";
        $result = DB::select($sqlTotal); //no tocar 
        $total=$totPaginas=0;
        if (count($result)>0) {
            $total=$result[0]->total;
            $totPaginas = round($total/$limite, 2)>floor($total/$limite)?floor($total/$limite)+1:floor($total/$limite);
        } //hasta aqui
        return [
            'reservas'=>$reservas,
            'total'=>$total, //NT
            'parPaginacion'=>['pagActual'=>$pagina,'totPaginas'=>$totPaginas] //NT
        ];
    }

    public function obtenerReservasActivos()
    {
        $sql = "select id,concat(m.fecha,'',m.hora)as reservacion from reservas m where m.eliminado =0 and activo=1 ";
        $reservas = DB::select($sql);
        return $reservas;
    }

    public function obtenerReservasActivas()
    {
        $sql = "select id,concat(m.fecha,'',m.hora)as reservacion from reservas m where m.eliminado =0 and activo=1 ";
        $reservas = DB::select($sql);
        if(count($reservas)>0){
            return $reservas[0];
        }else{
            return null;
        }
    }

    public static function getReserva($id){
        $sql ="select m.*,concat(pe.primer_apellido,' ',coalesce(pe.segundo_apellido,''),' ',pe.nombres) as paciente , 
            g.nombre as servicio, i.nombre as insumo, concat('Av. ',d.avenida, ', Calle ', d.calle,' # ', d.numero) as domicilio, 
            pg.tipo as formas_pagos
            from reservas m
            inner join pacientes pe on pe.id =m.paciente_id 
            inner join servicios g on g.id = m.servicio_id
            inner join insumos i on i.id = m.insumo_id 
            inner join domicilios d on d.id = m.domicilio_id
            inner join formas_pagos pg on pg.id = m.pago_id
            where m.activo =1 and m.id=$id";
        $reservas = DB::select($sql);
        if(count($reservas)>0){
            return $reservas[0];
        }else{
            return null;
        }
    }

    public static function getTotal(){
        $sql="select (monto_insumos + monto_servicios)as total 
            from reservas,servicios,insumos where servicio_id = servicios.id and insumo_id = insumos.id ";
        $reservas = DB::select($sql);
        return $reservas;
    }

    public static function getMontoServicio(){
        $sql="select costo from reservas, servicios where servicio_id = servicios.id ";
        $reservas = DB::select($sql);
        return $reservas;
    }

    public static function getMontoInsumo(){
        $sql="select costo_uso from reservas, insumos where insumo_id = insumos.id ";
        $reservas = DB::select($sql);
        return $reservas;
    }
}

