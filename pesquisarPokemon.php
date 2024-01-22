<?php

$InfoTXT = file_get_contents("InfoPokemon.txt");
$pesquisa = strtolower(readline(" Qual pokemon você quer ver? "));

if(str_contains($InfoTXT, $pesquisa)) {
    if(!file_exists("$pesquisa.txt")){
        mkdir("Pokemons");
        fopen("./Pokemons/$pesquisa.txt", "w");
    }
} else {
    echo "Este Pokemon não Existe";
}

