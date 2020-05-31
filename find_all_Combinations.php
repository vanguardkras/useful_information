<?php

function allCombinations(array $input_values)
{
    $combinations = [[]];

    foreach ($input_values as $element) {
        foreach ($combinations as $combination) {
            array_push($combinations, array_merge($combination, [$element]));
        }
    }

    return $combinations;
}
