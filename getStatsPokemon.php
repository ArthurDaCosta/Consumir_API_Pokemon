<?php

function getStatsPokemon(string $pesquisa, string $pesquisaURL) {
    mkdir("Pokemons");
    $InfoPoke = fopen("./Pokemons/$pesquisa.txt", "w");

    $ch = curl_init("$pesquisaURL");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $pokemon = json_decode(curl_exec($ch));



    foreach($pokemon->stats as $postar) {
        fwrite($InfoPoke, "". $postar->stat->name ."\n");
        fwrite($InfoPoke, "$postar->base_stat\n");
    }
}