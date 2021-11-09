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
            $dayText = __('calendar.tuesday');
            break;
        case 3:
            $dayText = __('calendar.wednesday');
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
