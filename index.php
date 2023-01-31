


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, rgb(167, 174, 184), rgb(67, 85, 185));
        }
        div{
            background-color: rgba(10, 9, 100, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 10px;
            color: #fff;
            
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        .inputSubmit{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        .inputSubmit:hover{
            background-color: deepskyblue;
            cursor: pointer;
        }
       
        a{

        color: white;
        }
    </style>
</head>
<body>
    

    <div>
        <center>
            <img src="uerr.png.">
            <h2>Efetuar login</h2>
        </center>
        
        <form action="testeLogin.php" method="POST">
        <input type="text" name=email placeholder="Email">
        <br><br>
        <input type="password" name=senha placeholder="Senha">
        <br><br>
       
        <input class="inputSubmit" type="submit" name="submit" value="Acessar">
        </form>
          <br>
        Não é cadastrado?
        <a href="formulario.php">Cadastre-se</a>
    </div>
   

</body>
    
</div>
</html>