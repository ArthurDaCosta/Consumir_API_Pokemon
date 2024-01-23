<?php

function criarJSONPokemon(): array
{
    $infoPokemonSaveJSON = fopen("InfoPokemonJSON.json", "w");
    $saveAPIJSON = file("InfoPokemon.txt", FILE_IGNORE_NEW_LINES);
    //$saveAPIJSON = array_map("trim", $saveAPIJSON);
    $saveAPIJSON = array_chunk(array_chunk($saveAPIJSON, 2), 15);
    fwrite($infoPokemonSaveJSON, json_encode(["Pokemons" => $saveAPIJSON ], JSON_PRETTY_PRINT));

    return $saveAPIJSON;
} 