<?php
$resourceDir = dirname(__FILE__, 5) . '/classes/api/tickets/rest/';
require_once(dirname(__FILE__, 5) . '/vendor/autoload.php');

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
