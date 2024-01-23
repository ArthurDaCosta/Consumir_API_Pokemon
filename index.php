<?php

require_once __DIR__ ."/variables.php";
require_once __DIR__ ."/criarInfoPokemon.php";
require_once __DIR__ ."/criarJSONPokemon.php";

do{
    if(!file_exists("InfoPokemon.txt")){
        criarInfoPokemon($urlApi);
    } else {
            $infoPokemonJSON = criarJSONPokemon();
            $RegistroCompleto=true;
    }
} while($RegistroCompleto==false);

$totalPaginas = count($infoPokemonJSON);


if(isset($_GET['page'])){
    $page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
}

if(!$page||$page<0||$page>$totalPaginas-1){
    $page = 0;
}

$mostrarPokemonsJSON = json_encode(["Pokemons" => $infoPokemonJSON[$page] ], JSON_PRETTY_PRINT);

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
    <title>Pokemons</title>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Lista de Pokemons</h1>
    </div>
    <div class="form">
        <form action="pesquisarPokemon.php" method="GET" enctype="multiplart/form-data">
            <input type="hidden" name="insert" value="insert">
            <label for="pokemon">Procure um Pokemon:</label>
            <input type="text" name="pokemon" placeholder="Nome do Pokemon">
            <button type="submit">Search</button>
        </form>
        <?php
            if ( isset( $_SESSION['message'])) {
                echo "<p style='color: #ef5350';>" . $_SESSION['message'] . "</p>";
                unset($_SESSION['message']);
            }
        ?>
    </div>
    <div class="separator">
    </div>
    <div class="list-pokemons">
        <?php
            echo "<ul>";
            echo "<pre>" . $mostrarPokemonsJSON . "</pre>";
            echo "<ul>";
        ?>
        
    </div>
    <div class="pagination_section">
        <?php
            if($page>0){
                echo "<nobr><a href='?page=" . $page-1 . "'> << Previous </a>";
            } else {
                echo "<nobr><a style='visibility: hidden'> << Previous </a>";
            }
            foreach ($infoPokemonJSON as $key => $value) {
                if($key==$page){
                    $verifyActive= "active";
                } else{
                    $verifyActive= "noactive";
                }
                echo "<a href='?page=$key' class='$verifyActive'>" . $key+1 . "</a>";
            }
            if($page<$totalPaginas-1){
                echo "<a href='?page=" . $page+1 . "'>Next >></a></nobr>";
            }  else {
                echo "<a style='visibility: hidden';>Next >></a></nobr>";
            }   

        ?>
    </div>
    <div class="footer">
        <p>Desenvolvido por Arthur Brixius da Costa</p>
    </div>
</div>





