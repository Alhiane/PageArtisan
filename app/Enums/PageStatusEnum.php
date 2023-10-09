<?php

namespace App\Enums;

enum PageStatusEnum:string
{
    case Queued = 'queued';
    case Processing = 'processing';
    case Ready = 'ready';
    case Error = 'error';
    case Deleted = 'deleted';

}
