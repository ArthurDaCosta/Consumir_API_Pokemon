<?php 

    session_start();

?>

<div class="details-container">
    <div class="header">
        <h1> <?php echo $data['task_name']; ?></h1>
    </div>
    <div class="row"> 
        <div class="details">
            <dl>
                <dt>Nome do -------------Pokemon:</dt>
                <dd><?php echo $infoPokemonJSON[0][$key][$x][0]; ?></dd>
                <dt>URL:</dt>
                <dd><?php echo $infoPokemonJSON[0][$key][$x][1] ?></dd>
            </dl>
        </div>
    </div>
    <div class="footer">
        <p>Desenvolvido por Arthur Brixius da Costa</p>
    </div>
</div>