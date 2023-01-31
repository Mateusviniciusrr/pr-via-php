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
	include_once("config.php");
	$result_horas = "SELECT * FROM horas WHERE user= '$logado'";
	$resultado_horas = mysqli_query($conexao, $result_horas);
	$sql_query = $conexao->query("SELECT*FROM horas WHERE user= '$logado'") or die ($conexao->error);
	
?>
<style>
 body{
	        font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
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
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
		}

		tr{
            position: relative;
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
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
        fieldset{
            
          
            background-color: rgba(10, 9, 100, 0.9);
            position: center;
            width: auto;
           
            
        }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal </title>
		
	</head>
	<body>
	<div class="legend">
		<legend>
        <img src="uerr.png." width="40px">
    <?php
        echo  "<h3>Registros de <u>$logado</u></h3>";
    ?>
     <br>
              <a href="horas.php">Voltar</a> 
              <a href="relatorioHoras.php">Imprimir relatório</a> 
        </legend>
        <table border="2"cellpadding="2">

            <thead>
                
                <tr>
                    
                    <th scope="col">Aluno</th>
                    <th scope="col">Email</th>
                    <th scope="col">Matricula</th>
					<th scope="col">Curso</th>
					<th scope="col">Eixo da atividade</th>
                    <th scope="col">Titulo da atividade</th>
					<th scope="col">Tipo da atividade</th>
					<th scope="col">Número de horas</th>
					<th scope="col">Data de Envio</th>
                    <th scope="col">Status</th>
                    <th scope="col">Editar</th>
                   



                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($resultado_horas)) {
                        echo "<tr>";
                        
                        echo "<td>".$user_data['aluno']."</td>";
                        echo "<td>".$user_data['user']."</td>";
                        echo "<td>".$user_data['matricula']."</td>";
						echo "<td>".$user_data['curso']."</td>";
						echo "<td>".$user_data['eixo']."</td>";
                        echo "<td>".$user_data['titulo']."</td>";
						echo "<td>".$user_data['tipo']."</td>";
						echo "<td>".$user_data['numero_horas']."</td>";
						echo "<td>".$user_data['data_upload']."</td>";
                        echo "<td>".$user_data['status']."</td>";
                        echo "<td> <a href='edit.php?id=$user_data[id]' title='Editar'>Editar</a></td>";
                    }
                    ?>
            </tbody>
        </table>
						
					 </table>
				</div>
			</div>		
		</div>
		
    
  </body>
</html>