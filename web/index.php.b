<?php
//echo $_POST['out_trade_no'];
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
//$txt = $_POST['out_trade_no']."\n";
//fwrite($myfile, $txt);
//fclose($myfile);

//print_r($_POST);
//if($_REQUEST['POST']) {
foreach($_POST as $index => $value)

{
 echo $index.'='.$value."\n";
$t = "post".$index.'='.$value."\n";
	fwrite($myfile, $t);
}

$xml =  file_get_contents('php://input');
fwrite($myfile, $xml);
foreach ($_GET as $key=>$value)  
  {
      fwrite($myfile, "Key: $key; Value: $value\n");
 }
foreach (getallheaders() as $name => $value) {
    fwrite($myfile, "header"."$name: $value\n");
}


//fwrite($myfile, $xml);
fclose($myfile);
//}



