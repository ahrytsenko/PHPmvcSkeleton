<?php

/**
 * Removes all occurences of $subString in given $string
 * @param string $string
 * @param string $subString
 * @return string
 */
function removeSubstr ( $string, $subString )
{
    while ( !(strpos ( $string, $subString ) === false ) )
    {
        $string = str_replace ( $subString, '', $string );
    }
    return $string;
}

/**
 * Removes all doubled slashes in given $string
 * @param string $string
 * @return string
 */
function removeDoubledSlashes ( $string )
{
    while ( !(strpos ( $string, '//' ) === false ) )
    {
        $string = str_replace ( '//', '/', $string );
    }
    return $string;
}
