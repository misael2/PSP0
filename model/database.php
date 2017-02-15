<?php


class Database
{

    
    public static function StartUp()
    {
    	try {
    	$pdo = new PDO('mysql:host=localhost;dbname=pspbd;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
        return $pdo;
        $connected = true;
    	} catch (Exception $e) {
    	
      
            $connected = false;
            if ($connected!=true) {
               // define("URL", "http://localhost/PSP0/view/instalacion/instalacion.php");
                //http_redirect("http://localhost/PSP0/view/instalacion/");

                header('Location: view/instalacion/test.php');
            }


  
    	}

        



        
    }
}

