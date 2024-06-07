<?php 


namespace App\Enums;



enum Role: int {
	case Meneger = 0;
	case Admin = 1;
	case Teacher = 2;
	case Student = 3;
}
