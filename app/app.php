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

    //Route and Controller
    $app->get("/", function() use ($app) {
      $all_contacts = Contact::getAll();
      return $app['twig']->render('contacts.html.twig', array('contacts' => $all_contacts));
    });

    //contacts POST Method
    $app->post("/contacts", function() use ($app) {
      $contact = new Contact($_POST['name'], $_POST['number'], $_POST['address']);
      $contact->save();
      return $app['twig']->render('create_contacts.html.twig', array('newcontact' => $contact));
    });

    //contacts POST Delete Method
    $app->post("/delete_contacts", function() use ($app) {
      Contact::deleteAll();
      return $app['twig']->render('delete_contacts.html.twig');
    });

    return $app;

?>
