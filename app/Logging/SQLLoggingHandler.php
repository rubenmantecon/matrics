<?php

namespace App\Logging;

use DB;
use Illuminate\Support\Facades\Auth;
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

class SQLLoggingHandler extends AbstractProcessingHandler{

	public function __construct($level = Logger::DEBUG, $bubble = true){
		$this->table = 'logs';
		parent::__construct($level, $bubble);
	}
	
	protected function write(array $record):void{

		$json = json_encode(array("message" => $record['message'], "extra" => $record['context']));

		$data = array(
			'user_id' => $record['context']['user_id'],
			'message' => $json,
			'level' => $record['level'],
			'created_at' => $record['datetime'],
			'updated_at' => $record['datetime'],
		);
		
		try{
			//DB::enableQueryLog();
			DB::connection()->table($this->table)->insert($data);
			//dd(DB::getQueryLog());
		}
		catch(\Illuminate\Database\QueryException $ex){
			//dd($ex->getMessage());	
		}
	}

}
