<?php

// --------------------------------------------------- //
/* /////////////// CONSTANTS DB & APIs /////////////// */
// -------------------------------------------------- //

define('DB_HOST','localhost');
define('DB_NAME','hetic_eatscape');
define('DB_USER','hetic_eatscape');
define('DB_PASS','hetic_eatscape_2014');

// --------------------------------------------------- //
/* ///////////////// INFOS WEBSITE /////////////////// */
// -------------------------------------------------- //

$CONFIG_MAIL = array(
    'website_mail' => 'hello@eatscape.fr',
    'website_name' => 'Eatscape',
    'websitesite_url' => 'http://www.eascape.fr/'
);

// --------------------------------------------------- //
/* //////////////// DATABASE CONNECT ///////////////// */
// -------------------------------------------------- //

try
{
    $pdo = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST,DB_USER,DB_PASS);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_NAMED);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e)
{
    die($e);
}

// --------------------------------------------------- //
/* //////////// SILEX & SERVICES PROVIDERS /////////// */
// -------------------------------------------------- //

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(),
));
$app->register(new Silex\Provider\SessionServiceProvider());


// --------------------------------------------------- //
/* ////////////////////// APIs /////////////////////// */
// -------------------------------------------------- //

// require MANDRILL_PHP_DIR.'/Mandrill.php';
// $mandrill = new Mandrill(MANDRILL_API_KEY);


// --------------------------------------------------- //
/* //////////////////// MODELS /////////////////////// */
// -------------------------------------------------- //

// include 'models/mail.class.php';
// $mail_model = new MailModel($pdo, $CONFIG_MAIL, $mandrill);

?>