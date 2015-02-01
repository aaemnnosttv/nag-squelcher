<?php
/**
 * Plugin Name: Nag Squelcher
 * Author: Evan Mattson
 * Description: Shush with the nagging!
 */


class NagSquelcher
{
	function __construct( $hook, $callback, $priority = 10 )
	{
		$this->hook = $hook;
		$this->callback = $callback;
		$this->priority = $priority;

		add_action( $this->hook, array($this, 'callback_handler'), 0 );
	}

	function callback_handler()
	{
		remove_action( $this->hook, $this->callback, $this->priority );
	}

	public static function shh( $hook, $callback, $priority = 10 )
	{
		return new self( $hook, $callback, $priority );
	}
}
