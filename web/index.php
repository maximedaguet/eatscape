<?php

// --------------------------------------------------- //
/* //////////////////// INCLUDES ///////////////////// */
// -------------------------------------------------- //

require_once 'config.php';
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;

// -- DISPLAY ERRORS -- //
$app->error(function (\Exception $e, $code)
{
    global $app;

    $data = array(
        'title' => 'Erreur '.$code,
        'error' => $code
    );
    if($code == 404)
        return $app['twig']->render('404.twig',$data);
});


// --------------------------------------------------- //
/* //////////////////// PAGES USER /////////////////// */
// -------------------------------------------------- //


$app->match('/', function(Request $request) use ($app){

    $data = array(
        'title' => 'Accueil'
    );

    return $app['twig']->render('home.twig',$data);
})
->bind('home');


// $app->match('/best-of-delete/{photo}-{event}', function(Request $request, $photo, $event) use ($app, $img_model){

//     $user = $app['session']->get('user');
//     if ($user['auth'] != true)
//         return $app->redirect($app['url_generator']->generate('home'));

//     $img_model->best_of(1, $user, $photo);

//     return $app->redirect($app['url_generator']->generate('album', array('tag' => $event)));
// })
// ->bind('best-of-delete');


// --------------------------------------------------- //
/* /////////////////// RUN APP ////////////////////// */
// -------------------------------------------------- //

$app->run();
