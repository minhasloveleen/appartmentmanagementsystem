
<?php
/**
 * Connects to the MySQL database.
 *
 * Provides one global variable: $mysqli
 *
 * Uses the global configuration options.
 */

require_once 'configuration.php';
$GLOBALS['appttypevalue']=['studio','21/2','31/2','41/2','51/2','61/2'];
$GLOBALS['appttype']=['studio','2<sup>1</sup>&frasl;<sub>2</sub>','3<sup>1</sup>&frasl;<sub>2</sub>','4<sup>1</sup>&frasl;<sub>2</sub>','5<sup>1</sup>&frasl;<sub>2</sub>','6<sup>1</sup>&frasl;<sub>2</sub>'];
$GLOBALS['mysqli'] = new mysqli(
    $CONFIG_MYSQL_HOST,
    $CONFIG_MYSQL_USER, $CONFIG_MYSQL_PASSWORD,
    $CONFIG_MYSQL_DATABASE, $CONFIG_MYSQL_PORT);

if ($GLOBALS['mysqli']->connect_errno) {
    echo ("Could not connect to DB." . "\n");
    echo ("Errno: " . $mysqli->connect_errno . "\n");
    echo ("Error: " . $mysqli->connect_error . "\n");
    exit;
}

function test_database_connection()
{
    $sql = "SELECT * FROM user";
    if (!$result = $GLOBALS['mysqli']->query($sql)) {
        echo ("Error: doing SQL query.\n");
        echo ("Query: " . $sql . "\n");
        echo ("Errno: " . $GLOBALS['mysqli']->errno . "\n");
        echo ("Error: " . $GLOBALS['mysqli']->error . "\n");
        exit;
    }

    echo ("<html>\n");
    echo ("<body>\n");
    echo ("<div>\n");
    echo ("<h1>Contents of the subscribers table:</h1>\n");
    echo ("<ul>\n");
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        printf("<li>%s</li>\n", $row["subscriber_email"]);
    }
    echo ("</ul>\n");
    echo ("</div>\n");

    print_configuration_options();

    echo ("</body>\n");
    echo ("</html>\n");

    $result->free_result();
    $GLOBALS['mysqli']->close();
}

// test_database_connection();
?>

