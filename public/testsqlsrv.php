<?php
// $serverName = "beprodatabase.ce91ht8cr7sy.ap-southeast-1.rds.amazonaws.com";
// $connectionOptions = array(
//     "database" => "beprodb",
//     "uid" => "admin",
//     "pwd" => "beprogg1234$#"
// );
// $serverName = "122.154.18.156";
// $connectionOptions = array(
//     "database" => "dairy_web",
//     "uid" => "sa",
//     "pwd" => "@PPscadaDT1"
// );
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "164.115.25.125";
$connectionOptions = array(
    "database" => "dairyweb2022",
    "uid" => "Kondesign1",
    "pwd" => "K!12345",
);

echo $serverName;

function exception_handler($exception) {
    echo "<h1>Failure</h1>";
    echo "Uncaught exception: ", $exception->getMessage();
    echo "<h1>PHP Info for troubleshooting</h1>";
    phpinfo();
}

set_exception_handler('exception_handler');

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    echo 'ERROR !!!';
    die(formatErrors(sqlsrv_errors()));
}

// Select Query
$tsql = "SELECT @@Version AS SQL_VERSION";

// Executes the query
$stmt = sqlsrv_query($conn, $tsql);

// Error handling
if ($stmt === false) {
    die(formatErrors(sqlsrv_errors()));
}
?>

<h1> Success Results : </h1>

<?php
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo $row['SQL_VERSION'] . PHP_EOL;
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

function formatErrors($errors) {
    // Display errors
    echo "<h1>SQL Error:</h1>";
    echo "Error information: <br/>";
    foreach ($errors as $error) {
        echo "SQLSTATE: " . $error['SQLSTATE'] . "<br/>";
        echo "Code: " . $error['code'] . "<br/>";
        echo "Message: " . $error['message'] . "<br/>";
    }

    echo "<br><br><br>";
    echo "<pre>";
    print_r($errors);
    echo "</pre>";
}
?>