<?php
function showStatsPokemon(string $pesquisa): array
{
    $InfoPoke = file("./Pokemons/$pesquisa.txt", FILE_IGNORE_NEW_LINES);
    $InfoPoke = array_chunk($InfoPoke, 2);
    $InfoPoke = array_map(function($InfoPoke){
        return [$InfoPoke[0]=> $InfoPoke[1]];
    }, $InfoPoke);

    return $InfoPoke;
}

