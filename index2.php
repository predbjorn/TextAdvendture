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
            <div id="room">
                <div id="room_description">
                    <h1>Overskrift</h1>
                    <p>Her er et room</p>

                    <div id="west" class="door">west</div>
                    <div id="north" class="door">north</div>
                    <div id="east" class="door">east</div>
                    <div id="south" class="door">south</div>
                </div>
            </div>
            <div id="info">
                
            </div>
            <div id="commands">
                <div class="command_box">
                    <h3>Move:</h3>
                    <form>
                        <input type="hidden" name="argument" value="move">
                        <input type="submit" name="argument" value="west"> 
                        <input type="submit" name="argument" value="north"> 
                        <input type="submit" name="argument" value="east"> 
                        <input type="submit" name="argument" value="south"> 
                    </form>
                </div>
                <div class="command_box">
                    <h3>Pickup item:</h3>
                    <form>
                        <input type="hidden" name="command" value="pickup">
                        <input type="submit" name="argument" value="west"> 
                        <input type="submit" name="argument" value="north"> 
                        <input type="submit" name="argument" value="east"> 
                        <input type="submit" name="argument" value="south"> 
                    </form>
                </div>
                <div class="command_box">
                    <h3>Drop Item: </h3>
                    <form>
                        <input type="hidden" name="argument" value="drop">
                        <input type="submit" name="argument" value="west"> 
                        <input type="submit" name="argument" value="north"> 
                        <input type="submit" name="argument" value="east"> 
                        <input type="submit" name="argument" value="south"> 
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php 

if (isset($_REQUEST['command'])) {
    if (isset($_REQUEST['argument'])) {
        
    } else {

    }

}
