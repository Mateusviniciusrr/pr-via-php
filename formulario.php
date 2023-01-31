<?php

if(isset($_POST['submit']))
{
    
include_once('config.php');

$nome = $_POST['nome'];
$senha = md5($_POST['senha']);
$email = $_POST['email'];
$titulacao = $_POST['genero'];
$data_nasc = $_POST['data_nascimento'];
$campus = $_POST['campus'];
$curso = $_POST['curso'];
$matricula = $_POST['matricula'];




$result = mysqli_query($conexao, "INSERT INTO usuario(nome,senha,email,titulacao,data_nasc,campus,curso,matricula) 
        VALUES ('$nome','$senha','$email','$titulacao','$data_nasc','$campus','$curso','$matricula')");


   header("Location: index.php");


  

}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário </title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right,  rgb(167, 174, 184), rgb(67, 85, 185));
            
        }
        .box{
            color: white;
            top: 50%;
            left: 15%;
            width: 65%;
            position: relative;
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
            width: center;
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
            color:white
        }
    </style>
</head>
<body>

    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Identificação de usuário</b></legend>
                <br>
                <a href="index.php">Voltar</a>
                <br>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br>
                   
                <p>Perfil:</p>
                <input type="radio" id="aluno" name="genero" value="aluno" required>
                <label for="aluno">Aluno</label>
                <br>
                <input type="radio" id="professor" name="genero" value="professor" required>
                <label for="professor">Professor</label>
                <br>
                <input type="radio" id="coordenador" name="genero" value="coordenador" required>
                <label for="coordenador">Coordenador</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="campus" id="campus" class="inputUser" required>
                    <label for="campus" class="labelInput">Campus</label>
                </Div>
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
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>



</body>
</html>