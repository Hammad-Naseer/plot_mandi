<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\DB;

class StoredProcedureHelper extends Facade
{
    public static function executeStoredProcedure(string $procedureName,array $parameters,int $procedureType = 0)
    {
        $placeholders = implode(',', array_fill(0, count($parameters), '?'));
        $procedureSyntax = 'EXEC '.$procedureName. ' ' .$placeholders.' ';
        if($procedureType == 1):
            $results = DB::select($procedureSyntax, $parameters);
        else:
            $results = DB::statement($procedureSyntax, $parameters);
        endif;
        return $results;
    }
}