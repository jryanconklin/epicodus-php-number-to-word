<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/NumberToWords.php";
    $app = new Silex\Application();
    $app['debug'] = true;
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
    $app->get("/", function() use ($app) {
        return $app['twig']->render('homepage.html.twig');
    });
    $app->post("/word", function() use ($app) {
        $user_word_number = new NumberToWords();
        $user_word_number = $user_word_number->convertWholeString($_POST['input']);
        return $app['twig']->render('results.html.twig', array('score' => $user_word_number));
    });
    return $app;
?>
