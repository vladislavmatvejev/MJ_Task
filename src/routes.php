<?php
// Routes

/*$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});*/


/*$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write(' Hello ');

    return $response;
});*/


$app->get('/api/{type}/{value}', '\Controller:getCustomer');
$app->post('/api/add', '\Controller:addCustomer');