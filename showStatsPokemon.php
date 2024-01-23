<?php

function showStatsPokemon(string $pesquisa) 
{
    $saveAPIJSON = file("./Pokemons/$pesquisa.txt", FILE_IGNORE_NEW_LINES);
    $saveAPIJSON = array_chunk($saveAPIJSON, 3);
    $saveAPIJSON = json_encode(["Status" => $saveAPIJSON], JSON_PRETTY_PRINT);

    print($saveAPIJSON);
}