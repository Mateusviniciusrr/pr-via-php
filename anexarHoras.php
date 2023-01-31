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




function enviarArquivo($error, $size, $name, $tmp_name){
    include("config.php");

    if($error)
        die("falha ao enviar o arquivo");

if($size > 2097152)
      die("Arquivo muito grande!! Max: 2MB");

$pasta= "horas/";
$nomeDoArquivo = $name;
$novoNomeDoArquivo = uniqid();
$extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));


if($extensao != "jpg" && $extensao != 'png' && $extensao != 'pdf')
      die("Tipo de arquivo não aceito");

$path = $pasta . $novoNomeDoArquivo . "." . $extensao;
      $deu_certo = move_uploaded_file($tmp_name, $path);

      

      
if(isset($_POST['submit']))
{
    
include_once('config.php');

$aluno = $_POST['aluno'];
$curso = $_POST['curso'];
$matricula = $_POST['matricula'];
$eixo = $_POST['eixo'];
$tipo = $_POST['tipo'];
$titulo = $_POST['titulo'];
$num = $_POST['numero_horas'];


   header("Location: horas.php");
}
      
      if($deu_certo){
        $email= $_SESSION['email'];
     $conexao->query("INSERT INTO horas (nome, path, user, aluno, curso,matricula, eixo, tipo, titulo, numero_horas) 
     VALUES('$nomeDoArquivo', '$path', '$email','$aluno', '$curso','$matricula', '$eixo','$tipo', '$titulo', '$num' )") or die ($conexao->error);
     return true;
}  else 
     return false;
}

if(isset($_FILES['arquivos'])){
    $arquivos = $_FILES['arquivos'];
    $tudo_certo = true;
    foreach($arquivos['name'] as $index=> $arq){
      $deu_certo= enviarArquivo($arquivos['error'][$index], $arquivos['size'][$index], $arquivos['name'][$index], $arquivos['tmp_name'][$index]);
    if(!$deu_certo)
      $tudo_certo = false;
    }
    
}




$sql_query = $conexao->query("SELECT*FROM horas WHERE user= '$logado'") or die ($conexao->error);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anexar Horas</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right,  rgb(167, 174, 184), rgb(67, 85, 185));
        }
        .box{
            color: white;
            position: relative;
           width: 67%;
           left: 15%;
          
            background-color: rgba(10, 9, 100, 0.9);
            padding: 15px;
            border-radius: 15px;
          
            
        }
        fieldset{
            border: 3px solid dodgerblue;
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
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
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
        a{
            color: white;
            
        }
    </style>
</head>
<body>

    <div class="box">
        <form action="anexarHoras.php" method="POST" enctype="multipart/form-data">
            <fieldset>
            <legend><H4> <img src="uerr.png." width="40px"><a>Cadastrar Horas</H4></legend>
            <a href="horas.php">Voltar</a>
                <br>
                <p><label for= "">Selecione o arquivo</label>
        <input multiple name="arquivos[]" type="file"></p>
        
        <br>
                <div class="inputBox">
                    <input type="text" name="aluno" id="aluno" class="inputUser" required>
                    <label for="aluno" class="labelInput">Nome completo</label>
                </div>
                <br>
                <div class="inputBox">
                <label for="curso" >Curso</label>
                <select name="curso" id= "curso" required>
                <option selected disabled value="">Selecione</option>
                <option value= "Administração">Administração</option>
                <option value= "Ciências Biológicas">Ciências Biológicas</option>
                <option value= "Ciências da Computação">Ciências da Computação</option>
                <option value= "Ciências da Natureza e Matemática">Ciências da Natureza e Matemática</option>
                <option value= "Comércio Exterior">Comércio Exterior</option>
                <option value= "Direito">Direito</option>
                <option value= "Enfermagem">Enfermagem</option>
                <option value= "Educação Física">Educação Física</option>
                <option value= "Física">Física</option>
                <option value= "Filosofia">Filosofia</option>
                <option value= "Geografia">Geografia</option>
                <option value= "História">História</option>
                <option value= "Letras/Literatura">Letras/Literatura</option>
                <option value= "Letras/Espanhol">Letras/Espanhol</option>
                <option value= "Letras/Inglês">Letras/Inglês</option>
                <option value= "Matemática">Matemática</option>
                <option value= "Pedagogia">Pedagogia</option>
                <option value= "Química">Química</option>
                <option value= "Serviço Social">Serviço Social</option>
                <option value= "Segurança Pública">Segurança Pública</option>
                <option value= "Sociologia">Sociologia</option>
                <option value= "Turismo">Turismo</option>

                </select>
                
            </div>
                
                <br>
                <div class="inputBox">
                    <input type="tel" name="matricula" id="matricula" class="inputUser" required>
                    <label for="matricula" class="labelInput">Matrícula</label>
                </div>
                <br>
               
                <div class="inputBox">
                <label for="eixo" >Eixo da atividade</label>
                <select name="eixo" id= "eixo" required>
                <option selected disabled value="">Selecione</option>
                <option value= "Iniciação científica">Iniciação científica</option>
                <option value= "Eventos técnicos científicos">Eventos técnicos-científicos</option>
                <option value= "vivência profissional">Vivência profissional complementar</option>
                <option value= "cursos e disciplinas livres">Cursos e disciplinas livres</option>
                <option value= "publicações">Publicações</option>
                

                </select>
                
            </div>

            
                <br>
                <div class="inputBox">
                <label for="tipo" >Tipo da atividade</label>
                <select name="tipo" id= "tipo" required>
                <option selected disabled value="">Selecione</option>
                <option value= "Curso de capacitação">Curso de capacitação</option>
                <option value= "Curso de curta duração">Curso de curta duração</option>
                <option value= "Evento cultural">Evento cultural</option>
                <option value= "Eventos científicos">Eventos científicos</option>
                <option value= "Iniciação científica">Iniciação científica</option>
                <option value= "Monitoria">Monitoria</option>
                <option value= "Estagio">Estágio</option>
                <option value= "liderança de turma">Liderança de turma</option>
                <option value= "Participação em campeonatos">Participação em campeonatos</option>
                <option value= "Projetos de extensão">Projetos de extensão</option>
                <option value= "Publicação em mostras">Publicação em mostras</option>
                <option value= "Outro">Outro</option>
               

                </select>
                
            </div>


                <br>
                <div class="inputBox">
                    <input type="text" name="titulo" id="titulo" class="inputUser" required>
                    <label for="titulo" class="labelInput">Título da atividade</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="tel" name="numero_horas" id="numero_horas" class="inputUser" required>
                    <label for="numero_horas" class="labelInput">Número de horas</label>
                </div>
                
                
               
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>