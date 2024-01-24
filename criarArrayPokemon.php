<?php

function criarArrayPokemon(): array
{
    $saveAPIJSON = file("InfoPokemon.txt", FILE_IGNORE_NEW_LINES);
    $saveAPIJSON = array_chunk($saveAPIJSON, 15);

    return $saveAPIJSON;
} 