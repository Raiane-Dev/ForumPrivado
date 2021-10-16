<?php   
    session_start();
    include('MySql.php');
    include('config.php');
    require('controllers/Controller.php');
    require('models/Model.php');

    $Controller = new Controller();

    include('views/templates/header.php');

    $Controller::index();

    include('views/templates/footer.php');

?>