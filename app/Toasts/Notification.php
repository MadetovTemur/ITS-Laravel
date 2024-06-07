<?php

namespace App\Toasts;

use ProtoneMedia\Splade\Facades\Toast;

class Notification
{
	protected static $backdrop = 10;

	public static function warning(string $message)
	{
		Toast::title('Whoops!')->warning($message)->center()
            ->backdrop(self::$backdrop);
	}


	public static function siccses(string $message)
	{
		Toast::title($message);
	}

	public static function info(string $message)
	{
		Toast::message($message)->info();
	}

	public static function danger(string $message)
	{
		Toast::message($message)->danger();
	}

}