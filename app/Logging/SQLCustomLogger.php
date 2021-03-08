<?php

namespace App\Logging;

use Monolog\Logger;

class SQLCustomLogger{
	public function __invoke(array $config){
		$logger = new Logger("SQLLoggingHandler");
		return $logger->pushHandler(new SQLLoggingHandler());
	}
}
