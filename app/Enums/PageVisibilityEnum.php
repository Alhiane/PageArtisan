<?php

namespace App\Enums;

enum PageVisibilityEnum:string
{
    case Public = 'public';
    case Private = 'private';
    case Hidden = 'hidden';
}
