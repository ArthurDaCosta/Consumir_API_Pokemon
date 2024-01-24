<?php
function showStatsPokemon(string $pesquisa): string
{
    $InfoPoke = file("./Pokemons/$pesquisa.txt", FILE_IGNORE_NEW_LINES);
    $temp = $InfoPoke[0];
    unset($InfoPoke[0]);
    $InfoPoke = array_chunk($InfoPoke, 2);
    $InfoPoke = array_map(function($InfoPoke){
        return [$InfoPoke[0]=> $InfoPoke[1]];
    }, $InfoPoke);
    $InfoPokeFinalTemp['Nome']=$temp;
    $InfoPokeFinalTemp['Status']=$InfoPoke;
    $InfoPoke = json_encode($InfoPokeFinalTemp, JSON_PRETTY_PRINT);

    return $InfoPoke;
}

