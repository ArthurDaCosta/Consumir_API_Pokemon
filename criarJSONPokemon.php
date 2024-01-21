<?php

function criarJSONPokemon()
{
    $infoPokemonJSON = fopen("InfoPokemonJSON.json", "w");
            $saveAPIJSON = file("InfoPokemon.txt", FILE_IGNORE_NEW_LINES);
            $saveAPIJSON = array_map("trim", $saveAPIJSON);
            fwrite($infoPokemonJSON, json_encode(["Pokemons" => array_chunk($saveAPIJSON, 2)], JSON_PRETTY_PRINT));
            $RequisicaoCompleta=false;
}