<?php
$dirName = dirname(__FILE__, 13);
$test = '/classes/api/tickets/rest';

$result = $dirName . $test;


$resourceDir = '/Users/joelsvensson/Documents/development/TicketSystem/classes/api/tickets/rest/';
require_once('/Users/joelsvensson/Documents/development/TicketSystem/vendor/autoload.php');
require '/Users/joelsvensson/Documents/development/TicketSystem/classes/api/tickets/rest/baseresource.class.php';
$load = array();

if (is_dir($resourceDir)) {
    if ($dh = opendir($resourceDir)) {
        while (($file = readdir($dh)) !== false) {
            if (preg_match('/class.php$/', $file)) {
                $load[] = $resourceDir . $file;
            }
        }
        closedir($dh);
    }
}

$app = new Tonic\Application(array(
    'load' => $load
));

$request = new Tonic\Request();

try {
    $resource = $app->getResource($request);
    $response = $resource->exec();
    $response->output();
} catch (\Tonic\Exception $exception) {
    $response = new Tonic\Response();
    $response->code = $exception->getCode();
    $response->body = $exception->getMessage();
    $response->contentMD5 = md5($response->body);
    $response->output();
} catch (Exception $exception) {
    $response = new Tonic\Response();
    $response->code = Tonic\Response::INTERNALSERVERERROR;
    $response->body = 'Server error';
    $response->contentMD5 = md5($response->body);
    $response->output();
}
