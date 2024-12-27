<?php

/**
 * Checks if the last element of `$x` crosses over the last element of `$y`.
 *
 * @param array $x The first array.
 * @param array $y The second array.
 * @return bool Returns `true` if a crossover occurs, otherwise `false`.
 */
if (!function_exists('crossover')) {
    function crossover(array $x, array $y): bool
    {
        if (empty($y) || empty($x)) {
            return false;
        }

        return prev($x) <= prev($y) && end($x) > end($y);
    }
}

/**
 * Checks if the last element of `$x` crosses under the last element of `$y`.
 *
 * @param array $x The first array.
 * @param array $y The second array.
 * @return bool Returns `true` if a cross under occurs, otherwise `false`.
 */
if (!function_exists('crossunder')) {
    function crossunder(array $x, array $y): bool
    {
        if (empty($y) || empty($x)) {
            return false;
        }

        return prev($x) >= prev($y) && end($x) < end($y);
    }
}
