<?php

//minutes to hours helper
function minutesToHours($minutes): string
{
    $hours = floor($minutes / 60);
    $minutes = $minutes % 60;
    return $hours . " ساعة " . $minutes . " دقيقة";
}
