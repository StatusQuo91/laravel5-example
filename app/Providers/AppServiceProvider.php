<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use App\Services\Validation;
use Queue;
use Illuminate\Support\Facade\Log;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobFailed;


class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Validator::resolver(function($translator, $data, $rules, $messages)
		{
		    return new Validation($translator, $data, $rules, $messages);
		});

		// Logging after send Mail
		Queue::after(function(JobProcessed $event){
			Log:info("Queue completed" . ($event->connectionName) . '/n' . json_encode($event->data));
		});

		Queue::before(function (JobProcessing $event) {
			Log:info("Connection name:" . $event->connectionName);
		});

		Queue::failing(function(JobFailed $event){
			echo("Failed job" . $event->failedId . " " . json_encode($event->data));
			// Log::info("Failed job" . $event->failedId . " " . json_encode($event->data));
		});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
