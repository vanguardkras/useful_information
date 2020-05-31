<?php

function allCombinationsWithRepetitions($arr, $k)
{
    $results = [];

    if ($k > 0) {
        $previous = allCombinationsWithRepetitions($arr, $k - 1);
        foreach ($arr as $value) {
            if ($k === 1) {
                $results[] = [$value];
            } else {
                foreach ($previous as $prev) {
                    $results[] = array_merge([$value], $prev);
                }
            }
        }
    }
    return $results;
}
