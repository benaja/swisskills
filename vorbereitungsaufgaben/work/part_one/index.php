<?php

/**
 *
 *
 * IMPORTANT:
 *
 * DO NOT EDIT THIS DOCUMENT !
 *
 *
 */

// read the competitor name from the directory to set the session
// not very nice but works :)
//
// this is only used for the assessment
$dir = __DIR__;
$dir = str_replace('\\', '/', $dir);
$dir = explode('/', $dir);
$competitorName = $dir[count($dir) - 4];
if (empty($competitorName)) {
    $competitorName = 'default';
}

session_name($competitorName);

$loader = require_once __DIR__ . '/../../vendor/autoload.php';

// load Game namespace
$loader->add('SM2014\\TOH', __DIR__ . '/tasks/Game/src');

$app = new Silex\Application();

use Symfony\Component\HttpFoundation\Request;
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
    'twig.class_path' => __DIR__ . '/vendor/twig/lib',
));
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app['twig']->addExtension(new \Entea\Twig\Extension\AssetExtension($app));

// Display PHP errors and exceptions
$app['debug'] = true;
use Symfony\Component\Debug\ErrorHandler;
// use Symfony\Component\HttpKernel\Debug\ExceptionHandler;
use Symfony\Component\Debug\ExceptionHandler;
ErrorHandler::register();
ExceptionHandler::register();

/**
 * Before Filters
 */
$app->before(function() use ($app) {

    $session = $app['session'];

    // load competitor information
    $competitorInfo = json_decode(file_get_contents(__DIR__ . '/../competitor.json'));

    // check mandatory fields
    $fields = array('prename', 'surname', 'email');
    foreach ($fields as $field) {
        if (empty($competitorInfo->competitor->$field)) {
            throw new Exception('Fill out your ' . $field . ' in competitor.json');
        }
    }

    // add competitor information to globals
    $app['twig']->addGlobal('competitor', $competitorInfo->competitor);

    // load and set flash from session
    $flash = $app['session']->get('flash');
    $session->set('flash', null);

    if (!empty($flash)) {
        $app['twig']->addGlobal('flash', $flash);
    }
});

/**
 * Route for the home page
 */
$app->get('/', function() use ($app) {
    $session = $app['session'];

    return $app['twig']->render('home.twig');
})
->bind('home');

/**
 * Route for task 1
 */
$app->get('/task1/{type}', function(Request $request, $type) use ($app) {
    $session = $app['session'];
    $info = false;

    switch ($type) {
        case 'syntax1':
            $params = array(
                'solvedErrors' => array(
                    'the first syntax error' => false,
                )
            );
            break;
        case 'syntax2':
            $params = array(
                'solvedErrors' => array(
                    'the second syntax error' => false,
                )
            );
            break;
        case 'syntax3':
            $params = array(
                'solvedErrors' => array(
                    'the third syntax error' => false,
                )
            );
            break;
        case 'logical1':
            $params = array(
                'solvedErrors' => array(
                    'the prime error'     => false,
                )
            );
            break;
        case 'logical2':
            $info = false;
            if($request->query->get('accepted') !== '1') {
                $info = 'Info: This page requires a lot of time to load if you have not fixed the error.';
            }
            $params = array(
                'solvedErrors' => array(
                    'the iterator error'     => false,
                )
            );
            break;
        case 'logical3':
            $params = array(
                'solvedErrors' => array(
                    'the message error'     => false,
                )
            );
            break;
        case 'logical4':
            $params = array(
                'solvedErrors' => array(
                    'the class error'     => false,
                )
            );
            break;
        default:
            throw new \Exception('Type ' . $type . ' does not exist for task 1');
    }
    if (!$info) {
        require_once __DIR__ . '/tasks/task1-' . $type . '.php';
    } else {
        $params['info'] = $info;
    }

    return $app['twig']->render('task1.twig', $params);
})
->bind('task1');

/**
 * Route for task 2
 */
// towers of hanoi start page
$app->match('/task2', function(Request $request) use ($app) {
    $session = $app['session'];
    include __DIR__ . '/tasks/task2-towers-of-hanoi-start.php';

    // show message in the gui
    if (!empty($params['game']) && !empty($params['game']['flash'])) {
        $app['twig']->addGlobal('flash', $params['game']['flash']);
    }

    // render the game start page
    return $app['twig']->render('task2-towers-of-hanoi-start.twig', $params);
})
->bind('task2');

// towers of hanoi game
$app->match('/task2/towers-of-hanoi', function(Request $request) use ($app) {
    $session = $app['session'];
    include __DIR__ . '/tasks/task2-towers-of-hanoi.php';

    // show message in the gui
    if (!empty($params['game']) && !empty($params['game']['flash'])) {
        $app['twig']->addGlobal('flash', $params['game']['flash']);
    }

    // redirect to game start page
    if (!empty($params['game'])) {
        if (!empty($params['game']['successful']) && true === $params['game']['successful']) {
            return $app->redirect($app['url_generator']->generate('task2'));
        } else if (!empty($params['game']['restart']) && true === $params['game']['restart']) {
            return $app->redirect($app['url_generator']->generate('task2'));
        }
    }

    // render the game page
    return $app['twig']->render('task2-towers-of-hanoi.twig', $params);
})
->bind('task2-towers-of-hanoi');

$app->run();
