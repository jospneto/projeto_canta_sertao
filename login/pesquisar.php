<?php

require_once "../login/conexao.php";
   
   ?>
   
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Buscar</title>
   
   </head>
   <body>
       <form action:"">
           <input name = "pesquisa" type = "text">
           <button type= "submit">Pesquisar</button>
   
       </form>
   
       <table width = "500px" >
         <?php
         if(!isset($_GET['pesquisa'])){
           ?>
           <tr>
               <td>Digite algo por favor...</td>
           </tr>
           <?php
         }else{
             $mysqli = new mysqli('localhost:3307','root','','cantasertao');
             $pesquisa = $mysqli->real_escape_string($_GET["pesquisa"]);
   
           $sql_code = "SELECT *
           FROM user_musico
           WHERE nome_fantasia LIKE '%$pesquisa%'
           OR genero_musical LIKE '%$pesquisa%'";
           
       
           $sql_query = $mysqli->query($sql_code) or die("Erro ao fazer a consulta.".$mysqli->error);
           
           if($sql_query->num_rows == 0){
           ?>
           <tr>
               <td>Não há resultados para sua pesquisa.</td>
           </tr>
           <?php
           }else{
               while($dados = $sql_query->fetch_assoc()){
                header("Location: Perfil_Artista.php");
                   ?>
                   <tr>
                       <td><?php echo $dados['nome_fantasia']; ?></td>
                       <td><?php echo $dados['genero_musical']; ?></td>
                       
                   </tr>
                   <?php
               }
           }
           ?>
           <?php
           } ?> 
      
       </table>
   </body>
   </html>