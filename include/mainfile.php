 <?Php include('dbconnect.php');
 //Get Xampp Path
 ob_start();
phpinfo(INFO_MODULES);
$info = ob_get_contents();
ob_end_clean();
$info = stristr($info, 'Server Root');
preg_match('/[A-Z]:+\/xampp\/apache/', $info, $match);
$xampp = $match[0];

 // Xampp Configuration File
 $portfile = "$xampp/conf/httpd.conf";
 $vhostfile = "$xampp/conf/extra/httpd-vhosts.conf";
 
 
 
 // Database Count
 if(isset($_REQUEST['dbquery'])){
$a = mysqli_query($connection,"select count(*) As cnt from information_schema.SCHEMATA where schema_name not in('mysql','information_schema','phpmyadmin','performance_schema')");
$b = mysqli_fetch_assoc($a);
$db_count = $b['cnt'];
echo $db_count;
 }

// Port Count
if(isset($_REQUEST['portquery'])){
$count_array = ["Listen" => 0];

$file = fopen($portfile, "r");

while(!feof($file))
{
    $line = trim(fgets($file));

    $words = explode(" ", $line);

    foreach($words as $word) {
        if (array_key_exists($word, $count_array)) {
            $count_array[$word]++;
        }
    }
}

foreach ($count_array as $word => $pnumber) {
  echo  $pnumber;
}
}

// Virtual Host Count
if(isset($_REQUEST['vhquery'])){
$count_array = ["#Created" => 0];

$file = fopen($vhostfile, "r");

while(!feof($file))
{
    $line = trim(fgets($file));

    $words = explode(" ", $line);

    foreach($words as $word) {
        if (array_key_exists($word, $count_array)) {
            $count_array[$word]++;
        }
    }
}

foreach ($count_array as $word => $snumber) {
   echo $snumber;
}
}

// Maximum Execution Time
if(isset($_REQUEST['exequery'])){
$max_time = ini_get("max_execution_time");
echo $max_time;

}

// Fetch Database Names
if (isset($_REQUEST['fetchdbname'])) {
$a = mysqli_query($connection,"select count(*) As cnt from information_schema.SCHEMATA where schema_name not in('mysql','information_schema','phpmyadmin','performance_schema')");
$b = mysqli_fetch_assoc($a);
$db_count = $b['cnt'];

$i = 1;

    $c = "select * from information_schema.SCHEMATA where schema_name not in('mysql','information_schema','phpmyadmin','performance_schema')";
$result = $connection->query($c);

if ($result->num_rows > 0) {
                                      while($row = $result->fetch_assoc()) {


$return_db[] = array("sl" => $i,
                    "db" => $row['SCHEMA_NAME']);

 
 $i++;

   }
}
 echo json_encode($return_db);                                       

}

// Fetch Sql Version
if(isset($_REQUEST['sqlversion'])){
 ob_start();
phpinfo(INFO_MODULES);
$info = ob_get_contents();
ob_end_clean();
$info = stristr($info, 'Client API version');
preg_match('/[1-9].[0-9].[1-9][0-9]/', $info, $match);
$gd = $match[0];
echo json_encode($gd);
}

// Remove Port
if(isset($_REQUEST['removeport'])){
$row_number = $_POST['port']-1;   
$file_out = file($portfile); 


unset($file_out[$row_number]);


file_put_contents($portfile, implode("", $file_out));
echo 0;
}


// Remove Database
if(isset($_REQUEST['removedb'])){
	$dbname = $_POST['db'];
	$query = "DROP DATABASE ".$dbname;
if ($connection->query($query) === TRUE) {
    echo 2;
} else{ echo 0;}
}

// Add Port
if(isset($_REQUEST['addport'])){
$port = $_POST['port'];
$lno = $_POST['lno'];
$dir = $_POST['dir'];
$file=$portfile;
$open=fopen($file, "rb");
$content = file($file); 
foreach($content as $lineNumber => &$lineContent) { 
    if($lineNumber == $lno) { 
        $lineContent .= "\n Listen ".$port."\n"; 
    }
}

$allContent = implode("", $content); 
file_put_contents($file, $allContent); 
fclose($open);


 $file_name = "$vhostfile";
$fp = fopen($file_name, 'a');

$qdir =  '"' . $dir . '"';
$firstline = "<VirtualHost *:" .$port. ">\r\n";
$secondline = "DocumentRoot " .$dir. "\r\n";
$thirdline = "<Directory ".$qdir.">\r\n";

$fourthline = "Options Indexes FollowSymLinks MultiViews \r\n AllowOverride all \r\nOrder Deny,Allow \r\n Allow from all \r\nRequire all granted\r\n";
$fifthline = "</Directory> \r\n";
$sixthline = "</VirtualHost> \r\n";
$seventhline = "#Created \r\n";
$nl = "\r\n";
fwrite($fp, $nl);
fwrite($fp, $firstline);  
fwrite($fp, $secondline);
fwrite($fp, $thirdline);
fwrite($fp, $fourthline);
fwrite($fp, $fifthline);
fwrite($fp, $sixthline);
fwrite($fp, $seventhline);
fwrite($fp, $nl);

fclose($fp);
echo 3;
}

// Fetch Port Details
if(isset($_REQUEST['fetchportdata'])){
error_reporting(0);
$string = "Listen";
$file=$portfile;
$linecount = 0;
$handle = fopen($file, "r");
$i = 1;

while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
  if(strpos($line, $string) !== false) { 
  $return_data[] = array("sl" => $i,
                    "port" => $line,
                    "lineno" => $linecount);
$i++;
}
}
echo json_encode($return_data);

}


// Remove Database
if(isset($_REQUEST['createdb'])){
	$dbname = $_POST['db'];
	$query = "CREATE DATABASE ".$dbname;
if ($connection->query($query) === TRUE) {
    echo 2;
} else{ echo 0;}
}
?> 