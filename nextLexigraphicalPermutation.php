function nextPermutation(&$array) {

    $last = count($array) - 1;
    // Find non-increasing suffix
    $i = $last;
    while ($i > 0 && $array[$i - 1] >= $array[$i]) {
        $i--;
    }

    if ($i <= 0) {
        return false;
    }

    // Find successor to pivot
    $j = $last;
    while ($array[$j] <= $array[$i - 1]) {
        $j--;
    }
    $temp = $array[$i - 1];
    $array[$i - 1] = $array[$j];
    $array[$j] = $temp;

    // Reverse suffix
    $j = $last;
    while ($i < $j) {
        $temp = $array[$i];
        $array[$i] = $array[$j];
        $array[$j] = $temp;
        $i++;
        $j--;
    }
    return true;
}
