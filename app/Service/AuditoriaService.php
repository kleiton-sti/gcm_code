<?php

namespace App\Service;

use App\DTO\AuditoriaDTO;
use App\Models\Auditoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuditoriaService
{
    public  function registrarAcao (AuditoriaDTO $auditoria)
    {
        try {
            DB::beginTransaction();
            Auditoria::create([
                'status' => $auditoria->status,
                'usuario' => $auditoria->usuario,
                'ip' => $auditoria->ip,
                'descricao' => $auditoria->descricao,
                'objeto_alterado' => $auditoria->objeto_alterado,
                'objeto_id' => $auditoria->objeto_id
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollBack();
            throw $exception;
        }
    }
}