<html>
<LINK REL=StyleSheet HREF="style.css" TYPE="text/css" MEDIA=screen>
<div class="container">
<form name="convert" method="POST" action="">
<input type="text" name="link" value="" id="link" required><br><br>
<input type="submit" name="submit" value="convert">
</form>
</div>
</html>

<?php
require 'pdfcrowd.php';
$lnk=$_POST['link'];
if(isset($_POST['submit'])){
try
{
    // create the API client instance
    $client = new \Pdfcrowd\HtmlToPdfClient("Username", "Enter your API key");

    // run the conversion and write the result to a file
    $client->convertUrlToFile("https://www.".$lnk, "example.pdf");
	echo"Successfully";
}
catch(\Pdfcrowd\Error $why)
{
    // report the error
    echo"Pdfcrowd Error\n";

    // rethrow or handle the exception
    throw $why;
}
}
?>