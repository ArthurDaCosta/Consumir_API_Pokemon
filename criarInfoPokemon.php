<?php

function criarInfoPokemon(string $urlApi)
{
    $new=15;
    $ch = curl_init("$urlApi?limit=$new");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $pokemon = json_decode(curl_exec($ch));
        
    $saveAPI = fopen("InfoPokemon.txt", "w");
        
    foreach($pokemon->results as $postar) {
        fwrite($saveAPI, "$postar->name");
        fwrite($saveAPI, "\n$postar->url\n");
    }
    $new=15;
}
