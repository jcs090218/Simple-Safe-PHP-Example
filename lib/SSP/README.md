# Simple Safe PHP #

SSP stand for Simple Safe PHP, teach the way to code PHP safe,
simple, fast and lightweight. <br/><br/>

## Example Project ##
* https://github.com/jcs090218/Simple-Safe-PHP-Example

## Usage ##

### Logging / Echo ###
```
SSP\println("Print a Line!");
SSP\printlnColor("Print a Line with color!", "red");
```
<img src="./screen_shot/echo.png"/>

### Debug ###
```
SSP\log("This is normal log...");
SSP\warning("This is warning log...");
SSP\error("This is error log..");
```
<img src="./screen_shot/debug.png" width="360" height="156"/>

### Check Variables ###
```
if (SSP\issetPost($checkVar)) {
  SSP\println("Var is set.");
} else {
  SSP\println("Var is not set.");
}
```

### Increase Readability ###
Often confuse with PHP abbreviation, I am just picky and willing
to rewrap the function into my own understanding. 
```
// Connect database.
$conn = SSP\sql_connect($host, $user, $pass, $database);

// Select database.
SSP\sql_select_db($conn, $database);

// Get the username from another page.
$postUsername = SSP\sql_sanitize($conn, SSP\safeGetPost($checkVar));

// Just search one user here..
$sql = "SELECT * FROM `accounts` WHERE `username` = ?";
$stmt = SSP\sql_prepare($conn, $sql);
if (!SSP\sql_prepare_success($stmt)) {
  SSP\error("Cannot prepare statement...");
  return;
}

$stmt->bind_param('s', $postUsername);
$stmt->execute();

$result = SSP\stmt_getResult($stmt);

$stmt->close();

while ($row = SSP\result_getOneRow($result)) {
  SSP\println('Username: '.$row['username']);
  SSP\println('Email: '.$row['email']);
  SSP\println();
}

```
