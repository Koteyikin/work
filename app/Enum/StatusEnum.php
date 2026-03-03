<?php

namespace App\Enum;

enum StatusEnum: string
{
    case new = "новая";
    case atWork = "в работе";
    case completed = "выполнена";

}
