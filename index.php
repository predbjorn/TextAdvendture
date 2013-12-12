<?php session_start(); 

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('max_execution_time', 300);

 include_once 'Model/Direction.php';
 include_once 'Model/GameManager.php';
 include_once 'Model/Items.php';
 include_once 'Model/Level.php';
 include_once 'Model/Player.php';
 include_once 'Model/Room.php';
 include_once 'Model/TextBuffer.php';
 
 include_once 'View/html.php';

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="container">
            <?php
            
                $command = null;
                $arguments = null;    

                if (isset($_SESSION['level'])) {
                    if (isset($_REQUEST['command'])) 
                        $command = $_REQUEST['command'];    
                    if (isset($_REQUEST['argument']))
                        $arguments = $_REQUEST['argument'];
                }
                
                GameManager::goGame($command, $arguments);
                echo GameManager::displayGame();

            ?>
        </div>
    </body>
</html>

<?php 


