<?php
    session_start();
    // print_r($_SESSION);
    include_once('config.php');
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: index.php');

       
    }
    $logado = $_SESSION['email'];

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right,  rgb(167, 174, 184), rgb(67, 85, 185));
            text-align: center;
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-52%,-48%);
            background-color: rgba(10, 9, 100, 0.9);
            padding: 10px;
            border-radius: 10px;
        }
       
        fieldset{
            border: 0px solid dodgerblue;
            width: auto;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
           
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 10px;
            color: dodgerblue;
        }
        a{
            text-decoration: none;
            color: white;
            border: 3px solid dodgerblue;
            border-radius: 10px;
            padding: 10px;
            width: auto;
        }
        a:hover{
            background-color: dodgerblue;
            width: auto;
        }
    </style>
</head>
<body>
<div class="box">
        <form action="">
            <fieldset>
                <legend><b>Tipo de Atividade</b></legend>
                   <h5>Selecione a atividade desejada:</h5>
            <br>
                <center>
                <a href="horas.php">Horas Complementares</a>
                <br><br><br>
                <a href="extensao.php">Projetos de Extensão</a>
                <br><br><br>
                
                <a href="sair.php">Encerrar sessão</a>
                <br><br><br>
                Universidade Estadual de Roraima- UERR
               
    </center>
            </fieldset>
        </form>
        </div>
        
    </nav>
    <br>
   

    <?php
    include_once('config.php');
    
    
    $result_horas = "SELECT * FROM usuario WHERE titulacao";
	$resultado_horas = mysqli_query($conexao, $result_horas);
	$sql_query = $conexao->query("SELECT*FROM usuario WHERE titulacao") or die ($conexao->error);

 switch($result_horas){
    case "coordenador": header('Location: pesquisar.php');
        
        break;
 }
 
 
  
 

?>










</body>
</html>