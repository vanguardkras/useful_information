<?php

// Binary search
function GetCeilIndex($arr, $T, $l, $r, $key)
{
    while ($r - $l > 1)
    {
        $m = (int)($l + ($r - $l)/2);
        if ($arr[$T[$m]] >= $key)
            $r = $m;
        else
            $l = $m;
    }

    return $r;
}

function longestIncreasingSubsequence($arr)
{
    // Add boundary case, when array n is zero
    // Depend on smart pointers
    $n = count($arr);
    $tailIndices=array_fill(0, $n+1, 0); // Initialized with 0
    $prevIndices=array_fill(0, $n+1, -1); // initialized with -1

    $len = 1; // it will always point to empty location
    for ($i = 1; $i < $n; $i++)
    {
        if ($arr[$i] < $arr[$tailIndices[0]])
        {
            // new smallest value
            $tailIndices[0] = $i;
        }
        else if ($arr[$i] > $arr[$tailIndices[$len-1]])
        {
            // arr[i] wants to extend largest subsequence
            $prevIndices[$i] = $tailIndices[$len-1];
            $tailIndices[$len++] = $i;
        }
        else
        {
            // arr[i] wants to be a potential condidate of
            // future subsequence
            // It will replace ceil value in tailIndices
            $pos = GetCeilIndex($arr, $tailIndices, -1,
                $len-1, $arr[$i]);

            $prevIndices[$i] = $tailIndices[$pos-1];
            $tailIndices[$pos] = $i;
        }
    }

    return $len;
}
