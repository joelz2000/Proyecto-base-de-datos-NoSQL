<?php
    declare(strict_types=1);

    date_default_timezone_set('UTC');

    
    require_once ('controllers/plantilla.controller.php');
    require_once ('controllers/prediccionBD.controller.php');
    require_once ('model/prediccion.model.php');
    require 'libs/SDK-PHP-AWS/aws/aws-autoloader.php';
    include 'libs/ML/vendor/autoload.php';
    
    $plantilla = new ControllerPlantilla();
    $plantilla->mostrarPlantilla();