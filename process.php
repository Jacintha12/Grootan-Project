<?php
mysql_connect("localhost","root","");
mysql_select_db("grootan");
$row = 1;
$doc=$_FILES['f1']['name'];
$target_path="C:/wamp/www/Grootan Project/";
$target_path1=$target_path.basename($_FILES['f1']['name']);
//echo $target_path;
if(!file_exists($target_path.$doc))
{

if(@move_uploaded_file($_FILES['f1']['tmp_name'],$target_path1))
{
if (($handle = fopen($doc, "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 100000, ",")) !== FALSE) {
    $num = count($data);
if($row==1) 
{
   
$query = "CREATE TABLE tb ( ";
for($i=0; $i<$num ;$i=$i+1)
{
  $query .= "$data[$i]" . " varchar" . "(15),"  ;
}
$query .= " ); ";
echo $query; // Execute the query

}

    $row++;

$query1 = "INSERT INTO tb ( ";
for($j=0; $j<$num ;$j=$j+1)
{
  $query1 .= "$data[$j]" . ","  ;
}
$query1 .= " ); ";
echo $query1; // Execute the query

  }
  fclose($handle);
}
}}

else echo "File already exists! Choose another file"

?>