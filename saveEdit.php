<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $aluno = $_POST['aluno'];
        $curso = $_POST['curso'];
        $matricula = $_POST['matricula'];
        $eixo = $_POST['eixo'];
        $tipo = $_POST['tipo'];
        $titulo = $_POST['titulo'];
        $num = $_POST['numero_horas'];
        
        $sqlInsert = "UPDATE horas 
        SET aluno='$aluno',curso='$curso',matricula='$matricula',eixo='$eixo',tipo='$tipo',titulo='$titulo',numero_horas='$num'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: horas.php');

?>