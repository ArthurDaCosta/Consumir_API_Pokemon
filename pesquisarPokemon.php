<?php

require_once __DIR__ ."/getStatsPokemon.php";
require_once __DIR__ ."/showStatsPokemon.php";

if(isset($_POST['pesquisar_pokemon'])) {
    $InfoTXT = file_get_contents("InfoPokemon.txt");
    $pesquisa = strtolower($_POST['pesquisar_pokemon']);

    $listaPokemons = file("InfoPokemon.txt", FILE_IGNORE_NEW_LINES);
    $listaPokemons = array_chunk($listaPokemons, 15);
    for($x=0; $x<count($listaPokemons); $x++) {
        for($y=0; $y<count($listaPokemons[0]); $y++) {
            if($listaPokemons[$x][$y]==$pesquisa){
                $pesquisaURL = "https://pokeapi.co/api/v2/pokemon/" . $listaPokemons[$x][$y] . "";
            }
        }
    }

    if(str_contains($InfoTXT, "$pesquisa\n")) {
        if(!file_exists("./Pokemons/$pesquisa.txt")){
            getStatsPokemon($pesquisa, $pesquisaURL);
            $InfoPokeJSON = showStatsPokemon($pesquisa);
        } else { 
            $InfoPokeJSON = showStatsPokemon($pesquisa);
        }
    } else {
        echo "Este Pokemon não Existe";
    }

    unset($_POST['pesquisar_pokemon']);
}

$TESTE = $_GET['teste'];

$InfoPokeJSON = json_encode(["Status" => $InfoPokeJSON], JSON_PRETTY_PRINT);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <META NAME="viewport" content="width=device-width, intial-scale=10">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <title><?=$pesquisa?></title>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Status de <?=ucfirst($pesquisa)?></h1>
    </div>
    <div class="separator">
    </div>
    <div class="list-info">
        <?php
            echo "<ul>";
            echo "<pre>" . $InfoPokeJSON . "</pre>";
            echo "<ul>";
        ?>
        
    </div>
    <div class="footer">
        <p>Desenvolvido por Arthur Brixius da Costa</p>
    </div>
</div>




