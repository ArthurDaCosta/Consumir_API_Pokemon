<?php

require_once __DIR__ ."/criarInfoPokemon.php";
require_once __DIR__ ."/criarJSONPokemon.php";

$urlApi = "https://pokeapi.co/api/v2/pokemon/";
$RequisicaoCompleta = true;

do{
    if(!file_exists("InfoPokemon.txt")){
        criarInfoPokemon($urlApi);
    } else{
        if(!file_exists("InfoPokemonJSON.json")){
            criarJSONPokemon();
        } else{
            
        }
    }
} while($RequisicaoCompleta);









