<?php
$realPath = substr(str_replace('\\', '/', realpath(dirname(dirname(__FILE__)))), strlen(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']))));

session_start();

require 'user/assets/setup/env.php';
require 'user/assets/setup/db.inc.php';
require 'user/assets/includes/auth_functions.php';
require 'user/assets/includes/security_functions.php';

if (isset($_SESSION['auth']))
  $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

generate_csrf_token();
check_remember_me();


$sql = "SELECT SUM(`code_lines`) FROM `projects`";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
      $_SESSION['ERRORS']['sqlerror'] = 'SQL ERROR';
      header("Location: ../error/404/");
      exit();
  }
  else {

      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
      $_SESSION['stats']['code_lines'] = $row['SUM(`code_lines`)'];
  }
}