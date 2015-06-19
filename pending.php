<?php


include "config.php";
$date = $_GET['report'];

	$postcheck=mysql_query("SELECT * FROM pending WHERE date='$date'");
	$getcheck= mysql_fetch_array($postcheck);

	$getlon =$getcheck['phone_longitude'];
	$getlat =$getcheck['phone_latitude'];
	$getip =$getcheck['ip']; 

if (isset($_POST['save'])) {

	$sql = "INSERT INTO reports (title, imageurl, users, rating, category, location, city, upvotes, downvotes, flags, ip, notes, date)
	VALUES ('".$date."', '".$date."', '".$getlon."', '".$getlat."', '".$getip."')";
	$result=mysql_query($sql);

	$create = "CREATE TABLE ".$date."_data (ID MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY, votesip VARCHAR(50), flagsip VARCHAR(50), ip VARCHAR(50), date VARCHAR(50));";
	$create_user = mysql_query($create);
}

?> 

<?php
include "header.php";
?>

<img src="uploads/<?php print $date;?>_200.jpg" width="200px">

<?php



echo "<br>";
echo "<br>";


$filename = "uploads/flower.jpg";

if (file_exists($filename)) {
$exif = exif_read_data($filename, 0, true);
echo "File Name: ".$exif['FILE']['FileName']."<br>";
echo "File Size: ".$exif['FILE']['FileSize']."<br>";
echo "File Date Time: ".date ("F d Y H:i:s.",$exif['FILE']['FileDateTime']);
echo "File Mime Type: ".$exif['FILE']['MimeType']."<br>";
echo "Device Make: ".$exif['IFD0']['Make']."<br>";
echo "Device Model: ".$exif['IFD0']['Model']."<br>";
echo "Image Width: ".$exif['COMPUTED']['Width']."<br>";
echo "Image Height: ".$exif['COMPUTED']['Height']."<br>";
echo "Image Resolution: ".$exif['IFD0']['XResolution']."<br>";
echo "Image Orientation: ".$exif['IFD0']['Orientation']."<br>";
echo "Software Used: ".$exif['IFD0']['Software']."<br>";
echo "Date Edited: ".$exif['IFD0']['DateTime']."<br>";
echo "Original Created Date: ".$exif['EXIF']['DateTimeOriginal']."<br>";

$GPSLongitude = $exif['GPS']['GPSLongitude'];
$GPSLongitudeRef = $exif['GPS']['GPSLongitudeRef'];
$GPSLatitude = $exif['GPS']['GPSLatitude'];
$GPSLatitudeRef = $exif['GPS']['GPSLatitudeRef'];


//var_dump($exif['GPS']['GPSLongitude'])."<br>";

$get1 = implode(" ",$GPSLongitude);
$get2 = $exif['GPS']['GPSLongitudeRef']."<br>";

$get3 = $get1.$get2;

//echo implode(" ",$GPSLatitude);
//echo ", ".$exif['GPS']['GPSLatitudeRef'];


$onlyconsonants = str_replace("", "", $get3);
print $onlyconsonants;
}

?>


<form action="" method="post" enctype="multipart/form-data">
<input type="hidden"  name="report" value="<?php echo time(); ?>">
<td>
<?php 

echo "date".$date;
echo "<br>";
echo "getlon".$getlon;
echo "<br>";
echo "getlat".$getlat;
echo "<br>";
echo "getip".$getip;

?>

</td>
</tr>

<tr>
<td>
<select>
<option value=""> category </option>
<option value=""> graffiti </option>
<option value=""> potholes </option>
<option value=""> damage properties </option>
<option value=""> broken glass </option>
<option value=""> light out </option>
<option value=""> broken pile </option>
<option value=""> dead animal </option>
</select>
</td>
</tr>

<tr>
<td><input type="hidden" id="getlon" name="getlon" value="" width="100%" DISABLED></td>
</tr>

<tr>
<td><input type="hidden" value="" name="getlat" id="getlat" placeholder="" width="100%" DISABLED></td>
</tr>

<tr>
<td><input type="submit" name="save" value="submit report"></form></td>
</tr>
</table>
</form>

</body>
</html>
