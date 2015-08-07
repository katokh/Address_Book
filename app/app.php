<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contact.php";

    //_SESSION - Starts a session and stores cookies
    session_start();
    if (empty($_SESSION['list_of_contacts'])) {
      $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();

    //Twig Path
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
      'twig.path' => __DIR__.'/../views'
    ));
