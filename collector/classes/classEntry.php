<?php
abstract class Entry{
	protected $connection;
	protected $date;
	protected $time;
	protected $server;
	protected $sessionId;

	abstract public function insert();

	abstract public function printIt();
}
