<?php
function renderStar($rating)
{
    $fullStars = floor($rating);
    $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
    $emptyStars = 5 - ($fullStars + $halfStar);
    $output = '';
    for ($i = 0; $i < $fullStars; $i++) {
        $output .= ' <i class="bi bi-star-fill text-warning"></i> ';
    }
    if ($halfStar) {
        $output .= ' <i class="bi bi-star-half text-warning"></i> ';
    }
    for ($i = 0; $i < $emptyStars; $i++) {
        $output .= ' <i class="bi bi-star text-warning"></i> ';
    }
    return $output;
}
