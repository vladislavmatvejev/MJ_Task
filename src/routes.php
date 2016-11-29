<?php
// Routes




$app->get('/api/{type}/{value}', '\Controller:getCustomer');
$app->post('/api/add', '\Controller:addCustomer');
