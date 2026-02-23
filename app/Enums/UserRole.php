<?php

namespace App\Enums;

enum UserRole : string
{
    case USER = 'user';
    case ORGANIZER = 'organizer';
    case ADMIN = 'admin';
}
