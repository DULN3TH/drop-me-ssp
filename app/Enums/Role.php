<?php
namespace App\Enums;

enum Role: int {
    case SuperAdministrator = 1;
    case Vendor = 2;

    case Customer = 3;
}
