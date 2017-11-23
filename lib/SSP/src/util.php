<?php
/**
 * $File: jcs-util.php $
 * $Date: 2017-10-09 08:42:51 $
 * $Revision: $
 * $Creator: Jen-Chieh Shen $
 * $Notice: See LICENSE.txt for modification and distribution information
 *                   Copyright (c) 2017 by Shen, Jen-Chieh $
 */

namespace SSP;

/**
 * Write out the text with line break sign.
 */
function println($text = "") {
  echo $text . "<br/>";
}

function printlnColor($text, $color) {
  echo '<div style="color:'.$color.'">';
  println($text);
  echo '</div>';
}

/**
 * Safe way to start the session.
 */
function safeSessionStart() {
  if(isset($_SESSION))
    return;

  session_start();
}

/**
 * Check if the file is forbidden file.
 * If yes prompt 403 error.
 *
 * @param { string } fileNmae : file header to check.
 * @return { bool } : true, is forbidden. false, vice versa.
 */
function isForbiddenFile($fileName) {
  if (basename($_SERVER["PHP_SELF"]) != $fileName)
    return false;

  die("Error 403 - Forbidden");
  return true;
}

/**
 * Check if the variable is set in system POST array.
 *
 * @param { string } var : variable name.
 * @return { bool } : true, isset. false, vice versa.
 */
function issetPost($var)
{
  return isset($_POST[$var]);
}

/**
 * Check if the variable is set in system GET array.
 *
 * @param { string } var : variable name.
 * @return { bool } : true, isset. false, vice versa.
 */
function issetGet($var) {
  return isset($_GET[$var]);
}

/**
 * Check if the variable is set in system SESSION array.
 *
 * @param { string } var : variable name.
 * @return { bool } : true, isset. false, vice versa.
 */
function issetSession($var) {
  return isset($_SESSION[$var]);
}

/**
 * Check if the variable is set in system GLOBALS array.
 *
 * @param { string } var : variable name.
 * @return { bool } : true, isset. false, vice versa.
 */
function issetGlobals($var) {
  return isset($GLOBALS[$var]);
}

/**
 * Get data from system $_POST array.
 */
function getPost($var) {
  return $_POST[$var];
}

/**
 * Get data from system $_GET array.
 */
function getGet($var) {
  return $_GET[$var];
}

/**
 * Set data to system $_SESSION array.
 */
function setSession($varPtr, $varRef) {
  $_SESSION[$varPtr]= $varRef;
}

/**
 * Get data from system $_SESSION array.
 */
function getSession($var) {
  return $_SESSION[$var];
}

/**
 * Get global vraibles.
 */
function getGlobals($var) {
  return $GLOBALS[$var];
}

/**
 * Safe way to get $_POST datra.
 */
function safeGetPost($var) {
  if (issetPost($var))
    return getPost($var);

  warning("POST data you trying to get is null... : " . $var);
  return NULL;
}

/**
 * Safe way to get $_GET datra.
 */
function safeGetGet($var) {
  if (issetGet($var))
    return getGet($var);

  warning("GET data you trying to get is null... : " . $var);
  return NULL;
}

/**
 * Safe way to get $_SESSION datra.
 */
function safeGetSession($var) {
  if (issetSession($var))
    return getSession($var);

  warning("SESSION data you trying to get is null... : " . $var);
  return NULL;
}

/**
 * Safe way to get $GLOBALS data.
 */
function safeGetGlobals($var) {
  if (issetGlobals($var))
    return getGlobals($var);

  warning("GLOBALS data you trying to get is null... : " . $var);
  return NULL;
}

/**
 * Reload page to this file.
 *
 * @param { string } path: return path.
 */
function locate($path) {
  header("Location: ".$path);
}

/**
 * Reload page with complete format.
 *
 * @note between $path and $flags will have '?' character between,
 * be aware of the format.
 *
 * @example
 * $path = "./index.php";
 * $flags = "page=home&error=log";
 *
 * FORMAT will be ->>> "./index.php?page=home&error=log";
 *
 * @param { string } path : return path.
 * @param { string } flags : flags or variables.
 */
function locateComplete($path, $flags) {
  header("Location: ".$path."?".$flags);
}

?>
