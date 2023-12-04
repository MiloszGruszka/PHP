<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>INNER JOIN add Mysqli by PHP</title>
</head>
<body>
   <?php
   $host = "localhost";
   $user = "root";
   $passwd = "";
   $db_name = "data";
   $port = 3306;

   $polaczenie = new mysqli($host,$user,$passwd,$db_name,$port);

   if(!mysqli_errno($polaczenie)){
      echo("Momy to ez - polaczony");
   }
   else{
      echo("Nie działa".mysqli_error($polaczenie));
   }
   
   $zapytanie = $polaczenie ->query("SELECT autorzy.nazwa,klient.nazwa FROM autorzy INNER JOIN klient ON autorzy.ida = klient.ida;");
   echo("<ul>");
   while(list($autor,$klient)=mysqli_fetch_row($zapytanie)){
      echo("<li>autor: $autor, klient: $klient</li>");
   }
   echo("</ul>");
   $polaczenie ->close();
   

   $zap1 = $polaczenie->query("SELECT ida,nazwa FROM autorzy;");

   while(list($ida,$autor)=mysqli_fetch_row($zap1)){
      $zap2 = $polaczenie->query("SELECT ida,nazwa FROM klient WHERE ida = $ida;");
      while(list($klient)=mysqli_fetch_row($zap2)){
         echo("<li>autor: $autor, klient: $klient</li>");
      }
   }

   echo("</ul>");
   $polaczenie ->close();
   //$zap2 = $polaczenie->query("SELECT ida,nazwa FROM klient WHERE ida = $ida;");

   ?>

</body>
</html>