<?php

require_once __DIR__ ."/getStatsPokemon.php";
require_once __DIR__ ."/showStatsPokemon.php";

if(isset($_POST['pesquisar_pokemon'])) {
    $InfoTXT = file_get_contents("InfoPokemon.txt");
    $pesquisa = $_POST['pesquisar_pokemon'];

    $saveAPIJSON = file("InfoPokemon.txt", FILE_IGNORE_NEW_LINES);
    $saveAPIJSON = array_chunk(array_chunk($saveAPIJSON, 2), 15);
    for($x=0; $x<count($saveAPIJSON); $x++) {
        for($y=0; $y<count($saveAPIJSON[0]); $y++) {
            if($saveAPIJSON[$x][$y][0]==$pesquisa){
                $pesquisaURL = $saveAPIJSON[$x][$y][1];
            }
        }
    }

    if(str_contains($InfoTXT, "$pesquisa\n")) {
        if(!file_exists("./Pokemons/$pesquisa.txt")){
            getStatsPokemon($pesquisa, $pesquisaURL);
            showStatsPokemon($pesquisa);
        } else { 
            showStatsPokemon($pesquisa);
        }
    } else {
        echo "Este Pokemon não Existe";
    }

    unset($_POST['pesquisar_pokemon']);
}

function pesquisarPokemon() {
    $InfoTXT = file_get_contents("InfoPokemon.txt");
    $pesquisa = $_POST['pesquisar_pokemon'];

    $saveAPIJSON = file("InfoPokemon.txt", FILE_IGNORE_NEW_LINES);
    $saveAPIJSON = array_chunk(array_chunk($saveAPIJSON, 2), 15);
    for($x=0; $x<count($saveAPIJSON); $x++) {
        for($y=0; $y<count($saveAPIJSON[0]); $y++) {
            if($saveAPIJSON[$x][$y][0]==$pesquisa){
                $pesquisaURL = $saveAPIJSON[$x][$y][1];
            }
        }
    }

    if(str_contains($InfoTXT, "$pesquisa\n")) {
        if(!file_exists("./Pokemons/$pesquisa.txt")){
            getStatsPokemon($pesquisa, $pesquisaURL);
            showStatsPokemon($pesquisa);
        } else { 
            showStatsPokemon($pesquisa);
        }
    } else {
        echo "Este Pokemon não Existe";
    }
}


