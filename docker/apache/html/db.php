<?php
$dbhost = 'db';
$dbuser = 'root';
$dbpassword = getenv('DB_PASSWORD');
$dbname = 'docker';

$connection = mysql_connect($dbhost, $dbuser, $dbpassword) or die ('Error connecting to mysql');
mysql_select_db($dbname);

$query = "SELECT * FROM records";
$result = mysql_query($query);

echo '<table style="border:1px solid yellowgreen;">
<tr>
<th style="border:1px solid yellowgreen;">Name</th><th style="border:1px solid yellowgreen;">Description</th>
</tr>
<table>';
while($row = mysql_fetch_array($result)){
echo '<tr><td style="border:1px solid yellowgreen;">' . $row['name'] . '</td><td style="border:1px solid yellowgreen;">' . $row['description'] . '</td></tr>';
}
echo '</table>';

mysql_close(); //Make sure to close out the database connection
?>
