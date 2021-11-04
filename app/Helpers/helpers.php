<?php

function daysWeekText($day)
{
    $dayText = '';
    switch ($day)
    {
        case 1:
            $dayText = __('calendar.monday');
            break;
        case 2:
            $dayText = __('calendar.thuesday');
            break;
        case 3:
            $dayText = __('calendar.wendsday');
            break;
        case 4:
            $dayText = __('calendar.thursday');
            break;
        case 5:
            $dayText = __('calendar.friday');
            break;
        case 6:
            $dayText = __('calendar.saturday');
            break;
        case 0:
            $dayText = __('calendar.sunday');
            break;
    }

    return $dayText;
}
