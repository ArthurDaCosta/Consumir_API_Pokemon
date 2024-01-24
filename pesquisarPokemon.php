<?php

session_start();

require_once __DIR__ ."/getStatsPokemon.php";
require_once __DIR__ ."/showStatsPokemon.php";

if(isset($_GET['pokemon'])) {
    if(trim($_GET['pokemon'])!='') {

        $listaPokemons = file("InfoPokemon.txt", FILE_IGNORE_NEW_LINES);
        $pesquisa = trim(strtolower($_GET['pokemon']));
        
        if(in_array($pesquisa, $listaPokemons)) {
            $pesquisaURL = "https://pokeapi.co/api/v2/pokemon/" . $pesquisa . "";
            if(!file_exists("./Pokemons/$pesquisa.txt")){
                getStatsPokemon($pesquisa, $pesquisaURL);
            }
            $InfoPokeJSON = showStatsPokemon($pesquisa);
        } else {
            $_SESSION['message'] = "Este Pokemon não existe!";
            header("Location:index.php?page=". $_SESSION['page2']. "");
        }
    } else{
        $_SESSION['message'] = "O campo não pode ser vazio.";
        header("Location:index.php?page=". $_SESSION['page2']. "");
    }    
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
    <title><?=$pesquisa?></title>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Status de <?=ucfirst($pesquisa)?></h1>
    </div>
    <div class="separator">
    </div>
    <div class="pokemon-info">
        <?php
            echo "<ul>";
            echo "<pre>" . $InfoPokeJSON . "</pre>";
            echo "<ul>";
        ?>
        
    </div>
    <div class="voltar">
        <input type="button" value="Voltar" onClick="history.go(-1)"> 
    </div>
    <div class="footer">
        <p>Desenvolvido por Arthur Brixius da Costa</p>
    </div>
</div>




