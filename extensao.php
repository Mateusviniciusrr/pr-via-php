<?php
 session_start();
 // print_r($_SESSION);
 if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
 {
     unset($_SESSION['email']);
     unset($_SESSION['senha']);
     header('Location: index.php');

    
 }
 $logado = $_SESSION['email'];

include("config.php");

$result_horas = "SELECT * FROM extensao WHERE user= '$logado'";
	$resultado_horas = mysqli_query($conexao, $result_horas);
	
	


if(isset($_GET['deletar'])){
    $id = intval($_GET['deletar']);
    $sql_query = $conexao->query("SELECT*FROM extensao WHERE id= '$id' ") or die ($conexao->error);
    $arquivo = $sql_query->fetch_assoc();

    if (unlink($arquivo['path'])) {
       $deu_certo= $conexao->query("DELETE FROM extensao
        WHERE id= '$id' ") or die ($conexao->error);
       if($deu_certo)
          echo "<p>Arquivo excluído com sucesso!</p>";
    }

}

$sql_query = $conexao->query("SELECT*FROM extensao WHERE user= '$logado'") or die ($conexao->error);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EXTENSÃO</title>
    <style>
         body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right,  rgb(167, 174, 184), rgb(67, 85, 185));
            color: white;  
            
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
            font-size: 12px;
            color: dodgerblue;
        }

        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
        table{
            color: white;
            position:relative;
            background-color: rgba(10, 9, 100, 0.9);
            padding: 20px;
            border: none;
            
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 1px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        
        fieldset{
            border: 3px solid dodgerblue;
            color: white;
            background-color: rgba(10, 9, 100, 0.9);
            width: auto;
        }
    

        a{
            text-decoration: none;
            color: white;
            border: 1px solid dodgerblue;
            border-radius: 8px;
            padding: 5px;
        }
        a:hover{
            background-color: dodgerblue;
        }
        tr{
            position: relative;
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
        }
     
    </style>
</head>
<body>
              <legend><H3> <img src="uerr.png." width="40px">Cadastro de Projetos de Extensão</H3>
              
        <br>
    </legend>
             
              <fieldset>
                <br>
              <a href="sistema.php">Voltar</a>
              
            <a href="sair.php" >Encerrar sessão</a>
       
              <?php
              echo "<h4>Usuário: <u>$logado</u></h4>";
              
             
    ?>
              <h4>Clique aqui para cadastrar o projeto:</h4><a href="cadEx1.php">Cadastrar Projeto</a>
              <br><br>
             
              
              
              

              


    <table border="3"cellpadding="6">
           <thead>
                 <th>Titulo do Projeto</th>
               
                 <th>Data de Envio</th>
                 <th>Deletar</th>
                 <th>Visualizar</th>
                 <th>Imprimir</th>
                 
           </thead>
        <tbody>
        <?php
             while ($arquivo = mysqli_fetch_assoc($resultado_horas)) {
              ?>  
              <tr>
                    <td><?php echo $arquivo['titulo']?></td>
                   
                    <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_envio'])); ?></td>
                    <th><a href= "horas.php?deletar=<?php echo $arquivo['id']; ?>">Deletar</a></th>
                    <td><a href= "visualizarProj.php?id=<?php echo $arquivo['id']; ?>">Visualizar</a></td>
                    <td><a href="imprimirProjeto.php?id=<?php echo $arquivo['id'];?>">Relatório</a> </td>
              </tr>
              <?php
             }
             ?>
             
             
        </tbody>
    </table>
   
    <ul>
    <li><a href="resolucoes/resolucaoextensao.pdf" download="resolucaoextensao.pdf"
              type="application/pdf">Clique aqui para baixar a resolução</a></li>
<br>
              <li><a href="resolucoes/formularioextensao.doc" download="formularioextensao.doc"
              type="application/doc">Formulário - projeto de Extensão</a></li>
              </ul>
              </fieldset>
</body>
</html>
