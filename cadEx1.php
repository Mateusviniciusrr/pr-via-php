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

if($size > 5242880)
      die("Arquivo muito grande!! Max: 5MB");

$pasta= "extensao/";
$nomeDoArquivo = $name;
$novoNomeDoArquivo = uniqid();
$extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));

if($extensao != "doc" && $extensao != 'docx' && $extensao != 'pdf')
      die("Tipo de arquivo não aceito");

$path = $pasta . $novoNomeDoArquivo . "." . $extensao;
      $deu_certo = move_uploaded_file($tmp_name, $path);
      





if(isset($_POST['submit']))
{
    

include_once('config.php');


$professor = $_POST['professor'];
$curso = $_POST['curso'];
$profcolaboradores = $_POST['prof_colaboradores'];
$alunoscolaboradores = $_POST['alunos_colaboradores'];
$tipo= $_POST['tipo'];
$inicio = $_POST['inicio'];
$final = $_POST['final'];
$titulo = $_POST['titulo'];
$area = $_POST['area'];
$tematica = $_POST['tematica'];
$natureza = $_POST['natureza'];
$resumo = $_POST['resumo'];
$tema = $_POST['tema'];
$objgeral = $_POST['obj_geral'];
$objespecifico = $_POST['obj_especifico'];
$justificativa = $_POST['justificativa'];
$metodologia = $_POST['metodologia'];
$fundamentacao = $_POST['fundamentacao'];
$cronograma = $_POST['cronograma'];
$resultados = $_POST['resultados'];
$insumos = $_POST['insumos'];
$cargasemanal = $_POST['carga_semanal'];
$cargatotal = $_POST['carga_total'];
$apoio = $_POST['apoio'];
$local = $_POST['local'];
$observacao = $_POST['observacao'];

   
header("Location: extensao.php");

}


     
if($deu_certo){
    $email= $_SESSION['email'];
    $conexao->query("INSERT INTO extensao(nome,path,user,professor,curso,prof_colaboradores,alunos_colaboradores,tipo,inicio,final,titulo,area,tematica,natureza,resumo,tema,obj_geral,obj_especifico,justificativa,metodologia,fundamentacao,cronograma,resultados,carga_semanal,carga_total,insumos,apoio,local,observacao) 
        VALUES ('$nomeDoArquivo', '$path','$email','$professor','$curso','$profcolaboradores','$alunoscolaboradores', '$tipo','$inicio','$final','$titulo','$area','$tematica','$natureza', '$resumo', '$tema', '$objgeral','$objespecifico', '$justificativa','$metodologia','$fundamentacao','$cronograma','$resultados','$cargasemanal','$cargatotal','$insumos','$apoio','$local','$observacao')") or die ($conexao->error);
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
$sql_query = $conexao->query("SELECT*FROM extensao WHERE user= '$logado'") or die ($conexao->error);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadEx1</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right,  rgb(167, 174, 184), rgb(67, 85, 185));
            color: white;
            
           height: 100%;
           width: auto;
        }
        .box{
            color: white;
            
            
        }
        fieldset{
            border: 1px solid dodgerblue;
            color: white;
            background-color: rgba(10, 9, 100, 0.9);
            height: 100%;
           width: auto;
            
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 8px;
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
            color: white;
            
        }

        .modal {
  position: absolute;
 
  height: 92%;
 width: 60%;
  bottom: 0;
  
  font-family: Arial, Helvetica, sans-serif;
  background:dodgerblue ;
  color: black;
  z-index: 99999;
  opacity:0;
  -webkit-transition: opacity 400ms ease-in;
  -moz-transition: opacity 400ms ease-in;
  transition: opacity 400ms ease-in;
  pointer-events: none;
}

.modal:target {
  opacity: 1;
  pointer-events: auto;
}

.modal > div {
  width: 10px;
  position: relative;
  margin: 10% auto;
  padding: 15px 20px;
  background: #fff;
}

.fechar {
  position: absolute;
  width: 30px;
  right: -15px;
  top: -20px;
  text-align: center;
  line-height: 30px;
  margin-top: 5px;
  background: #ff4545;
  border-radius: 50%;
  font-size: 16px;
  color: #8d0000;
}

         
    </style>
</head>
<body>


             


    <div class="box">
        <form action="cadEx1.php" method="POST" enctype="multipart/form-data">
           
        
        
        <fieldset>
            <legend><H4> <img src="uerr.png." width="40px"><a>Cadastrar Projetos</H4>  
              </legend>
              <a href="extensao.php">Voltar</a>   
              <center>
              <a href="#abrirModal">Orientações para cadastro</a>
              </center>
      <div id="abrirModal" class="modal">
      <a href="#fechar" title="Fechar" class="fechar">x</a>
      <h4>Orientações</h4>
      <p>1-Prencha todos os dados com atenção;</p>
      
       <p>2-Digite os nomes dos colaboradores separados por ";"  EX:"João Fernando; Mateus Vinícius";</p>

       <p>3-É possível enviar um documento como anexo de comprovação;</p>

       <p>4-Insira as datas de início e término do projeto no formato: "xx/xx/xxxx";</p>

       <p>5-Os campos de abordagem científica possuem limite de 200 caracteres;</p>

       <p>6- Ao selecionar "Outros", especifique no campo "Observação".</p>


        </div>
              <br><br>


              <p><label for= "">Enviar anexo</label>
        <input multiple name="arquivos[]" type="file"></p>
        
        <br>
              
                <div class="inputBox">
                    <input type="text" name="professor" id="professor" class="inputUser" required>
                    <label for="professor" class="labelInput">Professor Proponente</label>
                </div>
                <br>

                <div class="inputBox">
                <label for="curso" >Curso vinculado</label>
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
                    <input type="text" name="prof_colaboradores" id="prof_colaboradores" class="inputUser" required>
                    <label for="prof_colaboradores" class="labelInput">Professores Colaboradores</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="alunos_colaboradores" id="alunos_colaboradores" class="inputUser" required>
                    <label for="alunos_colaboradores" class="labelInput">Alunos Colaboradores</label>
                </div>
                
             
             

            
                <br>
               
                <div class="inputBox">
                <label for="tipo" >Tipo da atividade</label>
                <select name="tipo" id= "tipo" required>
                <option selected disabled value="">Selecione</option>
                <option value= "Projeto de pesquisa">Projeto de pesquisa</option>
                <option value= "Projeto de extensão">Projeto de extensão</option>
                

                </select>
                
            </div>


                <br>

                <div class="inputBox">
                    <input type="text" name="inicio" id="inicio" class="inputUser" required>
                    <label for="inicio" class="labelInput">Data de inicio</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="final" id="final" class="inputUser" required>
                    <label for="final" class="labelInput">Data de término</label>
                </div>
                <br>
                
                <div class="inputBox">
                    <input type="text" name="titulo" id="titulo" class="inputUser" required>
                    <label for="titulo" class="labelInput">Título da atividade</label>
                </div>
                <br>
                <div class="inputBox">
                <label for="area" >Área do conhecimento</label>
                <select name="area" id= "area" required>
                <option selected disabled value="">Selecione</option>
                <option value= "Ciências Exatas e da Terra">Ciências Exatas e da Terra</option>
                <option value= "Ciências Biológicas">Ciências Biológicas</option>
                <option value= "Engenharia/Tecnologia">Engenharia/Tecnologia</option>
                <option value= "Ciências da Saúde">Ciências da Saúde</option>
                <option value= "Ciências Agrárias">Ciências Agrárias</option>
                <option value= "Ciências Sociais">Ciências Sociais</option>
                <option value= "Ciências Humanas">Ciências Humanas</option>
                <option value= "Linguistica">Linguistica</option>
                <option value= "Letras e Artes">Letras e Artes</option>

                </select>
                
            </div>
          
            
                <br>
               

                <div class="inputBox">
                <label for="tematica" >Área Temática</label>
                <select name="tematica" id= "tematica" required>
                <option selected disabled value="">Selecione</option>
                <option value= "Comunicação">Comunicação</option>
                <option value= "Cultura">Cultura</option>
                <option value= "Direitos Humanos e Justiça">Direitos Humanos e Justiça</option>
                <option value= "Educação">Educação</option>
                <option value= "Meio Ambiente">Meio Ambiente</option>
                <option value= "Sáude">Sáude</option>
                <option value= "Tecnologia e Produção">Tecnologia e Produção</option>
                <option value= "Trabalho">Trabalho</option>
                <option value= "Pesquisa Científica">Pesquisa Científica</option>

                </select>
                
            </div>

            
                <br>
               
                <div class="inputBox">
                <label for="natureza" >Natureza da ação</label>
                <select name="natureza" id= "natureza" required>
                <option selected disabled value="">Selecione</option>
                <option value= "Curso">Curso</option>
                <option value= "Minicurso">Minicurso</option>
                <option value= "Congresso">Congresso</option>
                <option value= "Conferência">Conferência</option>
                <option value= "Palestra">Palestra</option>
                <option value= "Workshop">Workshop</option>
                <option value= "Seminário">Seminário</option>
                <option value= "Jornada">Jornada</option>
                <option value= "Exposição">Exposição</option>
                <option value= "Visita Técnica">Visita Técnica</option>
                <option value= "Torneio Esportivo">Torneio Esportivo</option>
                <option value= "Feira Técnica">Feira Técnica</option>
                <option value= "Fórum">Fórum</option>
                <option value= "Prestação de serviço">Prestação de serviço</option>
                <option value= "Sarau">Sarau</option>
                <option value= "Pesquisa Científica">Pesquisa Científica</option>
                <option value= "Outros">Outros</option>

                </select>
                
            </div>
        
            <div class="inputBox">
               <H4>Resumo do projeto (até 200 caracteres):</H4>
               <textarea name="resumo" rows="5" cols="68"></textarea required>
                 <label for="resumo" ></label>
                 </div>


                

                
              <div class="inputBox">
             <H4>Tema do projeto (até 200 caracteres):</H4>
              <textarea name="tema" rows="5" cols="68"></textarea required>
              <label for="tema" ></label>
              </div>
              
             
              <div class="inputBox">
              <label for="obj_geral" ><h4>Objetivo Geral (até 200 caracteres):</h4></label>
              <textarea name="obj_geral" rows="5" cols="68"></textarea required>
             
              </div>
              

              <div class="inputBox">
              <label for="obj_especifico" ><h4>Objetivos Específicos (até 200 caracteres):</h4></label>
              <textarea name="obj_especifico" rows="5" cols="68"></textarea required>
             
              </div>
              

              <div class="inputBox">
              <label for="justificativa" ><h4>Justificativa (até 200 caracteres):</h4></label>
              <textarea name="justificativa" rows="5" cols="68"></textarea required>
             
              </div>
              <br>
              <div class="inputBox">
              <label for="metodologia" ><h4>Metodologia (até 200 caracteres):</h4></label>
              <textarea name="metodologia" rows="5" cols="68"></textarea required>
             
              </div>
              <br>

              <div class="inputBox">
              <label for="fundamentacao" ><h4>Fundamentação Teórica (até 200 caracteres):</h4></label>
              <textarea name="fundamentacao" rows="5" cols="68"></textarea required>
             
              </div>
              <br>
              <div class="inputBox">
              <label for="cronograma" ><h4>Cronograma (até 200 caracteres):</h4></label>
              <textarea name="cronograma" rows="5" cols="68"></textarea required>
             
              </div>
              <br>
              <div class="inputBox">
              <label for="resultados" ><h4>Resultados Esperados (até 200 caracteres):</h4></label>
              <textarea name="resultados" rows="5" cols="68"></textarea required>
             
              </div>
              


            <br>
                <div class="inputBox">
                    <input type="tel" name="carga_semanal" id="carga_semanal" class="inputUser" required>
                    <label for="carga_semanal" class="labelInput">Carga Semanal</label>
                </div>
                <br>
                
                <div class="inputBox">
                    <input type="tel" name="carga_total" id="carga_total" class="inputUser" required>
                    <label for="carga_total" class="labelInput">Carga Total</label>
                </div>
                <br>
                
                <br>
              <div class="inputBox">
              <label for="insumos" ><h4>Insumos para Realização (até 200 caracteres):</h4></label>
              <textarea name="insumos" rows="5" cols="68"></textarea required>
             
              </div>
              <br>
                <div class="inputBox">
                    <input type="text" name="apoio" id="apoio" class="inputUser" required>
                    <label for="apoio" class="labelInput">Apoio</label>
                </div>
                <br>

                <div class="inputBox">
                    <input type="text" name="local" id="local" class="inputUser" required>
                    <label for="local" class="labelInput">Local</label>
                </div>
                <br>

                <div class="inputBox">
              <label for="observacao" ><h4>Observação (até 200 caracteres):</h4></label>
              <textarea name="observacao" rows="5" cols="68"></textarea required>
             
              </div>

                <br><br>
                <input type="submit" name="submit" id="submit">
                
            </fieldset>
        </form>
    </div>
</body>
</html>