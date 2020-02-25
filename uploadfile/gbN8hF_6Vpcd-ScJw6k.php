<?php
$servername = "localhost";
$username = "fempsu_data";
$password = "sMYzXyqF2wpWlhK";
$database = "fempsu_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

/* create a compressed zip file */
function createZip($files = array(), $destination = '', $overwrite = false) {


   if(file_exists($destination) && !$overwrite) { return false; }


   $validFiles = [];
   if(is_array($files)) {
      foreach($files as $file) {
         if(file_exists($file)) {
			// echo '<br>..'.$file;
            $validFiles[] = $file;
			 
         }
      }
   }


   if(count($validFiles)) {
      $zip = new ZipArchive();
      if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
         return false;
      }


      foreach($validFiles as $file) {
         $zip->addFile($file,$file);
      }


      $zip->close();
      return file_exists($destination);
   }else{
      return false;
   }
}
$query="SELECT * FROM `tbl_doc_file` WHERE outbound_id = '".$_GET['id']."' ";
		$result1 = mysqli_query($conn,$query);	
		
$files_to_zip = array();
while($file=mysqli_fetch_assoc($result1)){
    
    $file['file_name'] = substr($file['file_name'],11);
    array_push($files_to_zip,$file['file_name']);
    
}

$fileName = 'Filedownload_'.date("dmY_H.i").'.zip';
//$files_to_zip = ['uploadfile/13.docx', 'uploadfile/149624.jpg', 'uploadfile/G-Shock_Baby-G7.pdf'];
$result = createZip($files_to_zip, $fileName);


header("Content-Disposition: attachment; filename=\"".$fileName."\"");
header("Content-Length: ".filesize($fileName));
readfile($fileName);
@unlink($fileName);
echo '<script language="javascript">';
echo 'window.close();';
echo '</script>';
?>