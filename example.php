<?php

require_once 'vendor/autoload.php';

$api = new DatingVIP\API\Client;
$api->setUrl ('http://www.domain.com/api/');
$api->setAuth ('username', 'p4$$w0rd');

$data =
[
	'aff_id'	=> 'someThing',
	'aff_pg'	=> '123',
	'_domain'	=> 'www.foo.bar',
];

$aff = new DatingVIP\API\Affiliates ($api);
$result = $aff->sendClickUnique ($data);
print_r ($result->get ());

$result = $aff->sendClick ($data);
print_r ($result->get ());
