<?php

session_start();

require_once __DIR__ ."/variables.php";
require_once __DIR__ ."/criarTXTPokemon.php";
require_once __DIR__ ."/criarArrayPokemon.php";

do{
    if(!file_exists("InfoPokemon.txt")){
        criarTXTPokemon($urlApi);
    } else {
            $arrayPokemon = criarArrayPokemon();
            $RegistroCompleto=true;
    }
} while($RegistroCompleto==false);

$totalPaginas = count($arrayPokemon);

if(isset($_GET['page'])){
    $page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT)-1;
    $_SESSION['page2'] = $page+1;
}

if(!$page||$page<0||$page>$totalPaginas-1){
    $page = 0;
    $_SESSION['page2'] = $page;
}

$mostrarPokemonsJSON = json_encode(["Pokemons" => $arrayPokemon[$page] ], JSON_PRETTY_PRINT);

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
            <button type="submit">Procurar</button>
        </form>
        <?php
            if (isset( $_SESSION['message'])) {
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
                echo "<nobr><a href='?page=" . $page . "'> << Anterior </a>";
            } else {
                echo "<nobr><a style='visibility: hidden'> << Anterior </a>";
            }
            foreach ($arrayPokemon as $key => $value) {
                if($key==$page){
                    $verifyActive= "active";
                } else{
                    $verifyActive= "noactive";
                }
                echo "<a href='?page=" . $key+1 . "' class='$verifyActive'>" . $key+1 . "</a>";
            }
            if($page<$totalPaginas-1){
                echo "<a href='?page=" . $page+2 . "'>Próxima >></a></nobr>";
            }  else {
                echo "<a style='visibility: hidden';>Próxima >></a></nobr>";
            }   

        ?>
    </div>
    <div class="footer">
        <p>Desenvolvido por Arthur Brixius da Costa</p>
    </div>
</div>





