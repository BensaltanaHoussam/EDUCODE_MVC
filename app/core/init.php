<?php

spl_autoload_register(function($classname){

    require "../app/model/".ucfirst($classname).".php";

});


require "config.php";
require "functions.php";
require "database.php";
require "Model.php";
require "Controller.php";
require "App.php";  



?>