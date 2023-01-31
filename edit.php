<?php
    include_once('config.php');

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM horas WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $aluno = $user_data['aluno'];
                $curso = $user_data['curso'];
                $matricula = $user_data['matricula'];
                $eixo = $user_data['eixo'];
                $tipo = $user_data['tipo'];
                $titulo = $user_data['titulo'];
                $num = $user_data['numero_horas'];
            }
        }
        else
        {
            header('Location: anexarHoras.php');
        }
    }
    else
    {
        header('Location: anexarHoras.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR HORAS</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            
            
           
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


    </style>
</head>
<body>
    
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
            <legend><H4> <img src="uerr.png." width="40px"><a>Editar registro</H4> <a href="visualizar.php">Voltar</a></legend>
                
               
                <br>
                <div class="inputBox">
                    <input type="text" name="aluno" id="aluno" class="inputUser" value="<?php echo $aluno?>" required>
                    <label for="aluno" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                <label for="curso" >Curso</label>
                <select name="curso" id= "curso" value=<?php echo $curso;?> required>
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
                    <input type="tel" name="matricula" id="matricula" class="inputUser"value="<?php echo $matricula?> "required>
                    <label for="matricula" class="labelInput">Matrícula</label>
                </div>
                <br>
               
                <div class="inputBox">
                <label for="eixo" >Eixo da atividade</label>
                <select name="eixo" id= "eixo"required>
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
                    <input type="text" name="titulo" id="titulo" class="inputUser" value="<?php echo $titulo?> "required>
                    <label for="titulo" class="labelInput">Título da atividade</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="tel" name="numero_horas" id="numero_horas" class="inputUser" value="<?php echo $num;?>" required>
                    <label for="numero_horas" class="labelInput">Número de horas</label>
                </div>
                <br><br>
                
				<input type="hidden" name="id" value=<?php echo $id?>>
                <input type="submit" name="update" id="submit">
                
                
               
               
            </fieldset>
        </form>
    </div>
</body>
</html>