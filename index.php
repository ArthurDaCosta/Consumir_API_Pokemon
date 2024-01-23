<?php

require_once __DIR__ ."/variables.php";
require_once __DIR__ ."/criarInfoPokemon.php";
require_once __DIR__ ."/criarJSONPokemon.php";
require_once __DIR__ ."/pesquisarPokemon.php";
require_once __DIR__ ."/getStatsPokemon.php";
require_once __DIR__ ."/showStatsPokemon.php";

do{
    if(!file_exists("InfoPokemon.txt")){
        criarInfoPokemon($urlApi);
    } else {
            $infoPokemonJSON = criarJSONPokemon();
            $RegistroCompleto=true;
    }
} while($RegistroCompleto==false);

$totalPaginas = count($infoPokemonJSON);

// pesquisarPokemon();


if(isset($_GET['page'])){
    $page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
}

if(!$page) {
    $page = 0;
}



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
        <form action="pesquisarPokemon.php" method="POST" enctype="multiplart/form-data">
            <input type="hidden" name="insert" value="insert">
            <label for="pesquisar_pokemon">Procure um Pokemon:</label>
            <input type="text" name="pesquisar_pokemon" placeholder="Nome de Pokemon">
            <button type="submit">Procurar</button>
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

            for( $i = 0; $i < 15; $i++ ) {
                echo "<li>
                    <dt>Nome do Pokemon: " . ucfirst($infoPokemonJSON[$page][$i][0]) . " </dt>
                    <dt>URL: " . $infoPokemonJSON[$page][$i][1] . "</dt>
                 </li>";
            }
            echo "<ul>";
        ?>
        
    </div>
    <div class="pagination_section">
        <?php
            if($page>0){
                echo "<a href='?page=" . $page-1 . "'><< Previous</a>";
            }
            foreach ($infoPokemonJSON as $key => $value) {
                echo "<a href='?page=$key'>" . $key+1 . "</a>";
            }
            if($page<$totalPaginas){
                echo "<a href='?page=" . $page+1 . "'>Next >></a>";
            }     
        ?>
    </div>
    <div class="footer">
        <p>Desenvolvido por Arthur Brixius da Costa</p>
    </div>
</div>





