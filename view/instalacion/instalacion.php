<!DOCTYPE html>
            <html>
            <head>
            <?php
             define("URL", "http://localhost/PSP0/view/instalacion/Datos.sql");
             define("Home", "http://localhost/PSP0/");

            ?>
                <title>Asistente de instalacion de base de datos</title>
                <link rel="stylesheet" href="../../assets/css/instalacion.css" />
            </head>
            <body>
            <h1>En este equipo no existe una base de datos relacionada con este sistema</h1>
              <img src="../../assets/img/BDX.jpg">
             <p>Siga las Siguientes instrucciones para instalar la base de datos </p>
             <ol>
              <li>Tener instalado el  gestor de base de datos MYSQL</li>
              <li>Cree una base de datos con el nombre "pspbd"</li>
              <li>Descargar este Archivo <a href="<?php echo URL;?>">Datos.sql</a></li>
              <li>Importalo a la base de datos que creaste</li>
              <li>Regrese a la pagina principal <a href="<?php echo Home;?>">Home</a></li> 
            </ol>
            </body>
            </html>


 

           