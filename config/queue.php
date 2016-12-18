<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Default Queue Driver
	|--------------------------------------------------------------------------
	|
	| The Laravel queue API supports a variety of back-ends via an unified
	| API, giving you convenient access to each back-end using the same
	| syntax for each one. Here you may set the default queue driver.
	|
	| Supported: "null", "sync", "beanstalkd", "sqs", "iron", "redis"
	|
	*/

	'default' => env('QUEUE_DRIVER', 'sqs'),

	/*
	|--------------------------------------------------------------------------
	| Queue Connections
	|--------------------------------------------------------------------------
	|
	| Here you may configure the connection information for each server that
	| is used by your application. A default configuration has been added
	| for each back-end shipped with Laravel. You are free to add more.
	|
	*/

	'connections' => [

		'sync' => [
			'driver' => 'sync',
		],

		'beanstalkd' => [
			'driver' => 'beanstalkd',
			'host'   => 'localhost',
			'queue'  => 'default',
			'ttr'    => 60,
		],

		'sqs' => [
			'driver' => 'sqs',
			'key'    => 'AKIAJ3TWHTR2F3GZDOOA',
			'secret' => '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',
			'queue'  => 'https://sqs.ap-northeast-1.amazonaws.com/859263760906/laravel-5-sendmail-queue',
			'http'    => [
				'verify' => storage_path().'/cacert.pem'
			],
			'region' => 'ap-northeast-1',
		],
		'iron' => [
			'driver'  => 'iron',
			'host'    => 'mq-aws-us-east-1.iron.io',
			'token'   => 'your-token',
			'project' => 'your-project-id',
			'queue'   => 'your-queue-name',
			'encrypt' => true,
		],

		'redis' => [
			'driver' => 'redis',
			'queue'  => 'default',
			'expire' => 60,
		],

	],

	/*
	|--------------------------------------------------------------------------
	| Failed Queue Jobs
	|--------------------------------------------------------------------------
	|
	| These options configure the behavior of failed queue job logging so you
	| can control which database and table are used to store the jobs that
	| have failed. You may change them to any database / table you wish.
	|
	*/

	'failed' => [
		'database' => 'mysql', 'table' => 'failed_jobs',
	],

];
