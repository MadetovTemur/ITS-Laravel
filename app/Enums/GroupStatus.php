<?php


namespace App\Enums;


enum GroupStatus: int {
	case Active = 0;
	case Complite = 1;
	case NoStartup = 2;
	case SuccessComplite = 3;
}



