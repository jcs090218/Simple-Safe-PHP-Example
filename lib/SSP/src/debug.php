<?php
/**
 * $File: debug.php $
 * $Date: 2017-11-14 17:03:34 $
 * $Revision: $
 * $Creator: Jen-Chieh Shen $
 * $Notice: See LICENSE.txt for modification and distribution information
 *                   Copyright (c) 2017 by Shen, Jen-Chieh $
 */

namespace SSP;


/**
 * Log out string by SSP standard. (Log)
 *
 * @param { string } : string to log out.
 */
function log($text) {
  $tmpColor = safeGetGlobals('sspLogColor');
  printlnColor(
    "$=============================================$",
      $tmpColor);
  printlnColor("$ Log: " . $text, $tmpColor);
  printlnColor(
    "$=============================================$",
      $tmpColor);
}

/**
 * Log out string by SSP standard. (Warning)
 *
 * @param { string } : string to log out.
 */
function warning ($text) {
  $tmpColor = safeGetGlobals('sspWarningColor');;
  printlnColor(
    "$=============================================$",
      $tmpColor);
  printlnColor("$ Warnings: " . $text, $tmpColor);
  printlnColor(
    "$=============================================$",
      $tmpColor);
}

/**
 * Log out string by SSP standard. (Error)
 *
 * @param { string } : string to log out.
 */
function error ($text) {
  $tmpColor = safeGetGlobals('sspErrorColor');;
  printlnColor(
    "$=============================================$",
      $tmpColor);
  printlnColor("$ Error: " . $text, $tmpColor);
  printlnColor(
    "$=============================================$",
      $tmpColor);
}

?>
