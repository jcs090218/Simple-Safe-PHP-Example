<?php
/**
 * $File: sql.php $
 * $Date: 2017-11-14 16:45:12 $
 * $Revision: $
 * $Creator: Jen-Chieh Shen $
 * $Notice: See LICENSE.txt for modification and distribution information
 *                   Copyright (c) 2017 by Shen, Jen-Chieh $
 */

namespace SSP;


/**
 * SQL connect to database. (Support MySQL only)
 *
 * @param { string } host : host name / internet protocal address.
 * @param { stirng } user : user name.
 * @param { string } pass : password.
 * @param { string } database : database name.
 * @return { void* } : conenction object.
 */
function sql_connect($host, $user, $pass, $database) {
  return mysqli_connect($host, $user, $pass, $database);
}

/**
 * Select a database.
 *
 * @param { void* } conn : connection from database.
 * @param { string } database : database name.
 * @return { void* } : database struct.
 */
function sql_select_db($conn, $database) {
  return mysqli_select_db($conn, $database);
}

/**
 * Sanitize the sql variable.
 *
 * @param { void* } conn : Connection object.
 * @param { void* } var : any data type going to be sanitize.
 * @return { void* } : data been sanitize.
 */
function sql_sanitize($conn, $var) {
  if (function_exists("mysqli_real_escape_string")) {
    $var = mysqli_real_escape_string($conn, $var);
  } else {
    $var = addslashes($var);
  }
  return $var;
}

/**
 * SQL prepare statment object ready to execute.
 *
 * @param { void* } conn : connection object.
 * @param { string } sql : query ready to execute.
 * @return { void* } : Return statment object.
 */
function sql_prepare($conn, $sql) {
  /* Checl connection alright? */
  if ($conn == NULL) {
    error("Cannot prepare statment with null reference connection...");
    return;
  }

  /* Check query alright? */
  if (empty($sql)) {
    error("Cannot prepare statment with empty sql statment...");
    return;
  }

  // return statment object.
  return $conn->prepare($sql);
}

/**
 * Check if prepare statment succcess.
 *
 * @param { void* } stmt : statement object.
 * @return { bool } : True, success. False, failure.
 */
function sql_prepare_success($stmt) {
  return $stmt != NULL;
}

/**
 * Get result from the statment object. Please call this after
 * call execute function.
 *
 * @param { void* } stmt : statement object.
 * @return { void* } : result from this statment.
 */
function stmt_getResult($stmt) {
  $result = $stmt->get_result();  // get data before free.
  $stmt->free_result();  // free it.
  return $result;
}

/**
 * Get one row from the result. Push one index for row pointer.
 */
function result_getOneRow($result) {
  return $result->fetch_assoc();
}

?>
