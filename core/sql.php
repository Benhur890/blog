<?php
function update (string $entidade, array $dados, array $criterio = []) : string
{
    $instrucao = "UPDATE{$entidade}";

    foreach ($dados as $campo => $dados){
        $set[] = "{$campo}" = {$dados}";
    }
    $instrucao .= ' SET ' . implode(',', $set) ;

    if (!empty($criterio)){
        $intrucao .= ' WHERE';
        
        foreach($criterio as $expressao) {
            $instrucao .= ' '. implode (' ',$expressao);
        }
    }
    return $instrucao;
}
?>

function  select (string $entidade, array $campos, array $criterio = [], string $ordem = null) : string
{
    $instrucao = "SELECT" . implode(',',$campos);
    $instrucao .= "FROM {$entidade}";

    if(!empty($criterio)){
        $instrucao .= ' WHERE ';

        foreach ($criterio as $expressao){
            $instrucao .= ' '.implode (' ', $expressao);
        }
    }
    if(!empty($ordem)){
        $instrucao .= " ORDER BY $ordem ";
    }
    return $instrucao;
}
?>