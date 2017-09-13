<?php
/*
 * @Murgency - Common functions class...
 * All input validation contained this class..
 * created By : Manoj Velyalan
 * created On : 16/04/2015
 * 
 */
?>
<?php
namespace murCommon;
class CommonFunction{
    //function which reduce the size of the image before uloading the file in  parse server..
    
    public function processFile($file){
        $url = 'blogImage.jpg';
        $file_path = $file['tmp_name'];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = "file.".$ext;
        if($file['type'] != "application/pdf"){
            $filename = $this->compress_image($file_path, $url, 20);
            $buffer = file_get_contents($url);
            $file = \Parse\ParseFile::createFromData($buffer,$filename);
        }else{
            
            $fileContent = file_get_contents(htmlspecialchars($file_path),"rb");
            $file = \Parse\ParseFile::createFromData($fileContent,$filename); 
        }
        if($file->save()){
            //echo "fileUrl:".$file->getURL();
            return $file;
            
        }else{
            return false;
        }
    }
    public function processMultipleFile($name , $tmpName, $type){
        $url = 'destination.jpg';
        $file_path = $tmpName;
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        $filename = "file.".$ext;      
        if($type != "application/pdf"){
            $filename = $this->compress_image($file_path, $url, 20);
            $buffer = file_get_contents($url);
            $file = \Parse\ParseFile::createFromData($buffer,$filename);
        }else{
            
            $fileContent = file_get_contents(htmlspecialchars($file_path),"rb");
            $file = \Parse\ParseFile::createFromData($fileContent,$filename); 
        }
        if($file->save()){
            //echo "fileUrl:".$file->getURL();
            return $file;
            
        }else{
            return false;
        }
    }
    
    function compress_image($source_url, $destination_url, $quality) {
            ini_set('memory_limit', '512M'); //Raise to 512 MB
		$info = getimagesize($source_url);
    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

   		elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);

    		imagejpeg($image, $destination_url, $quality);
                imagedestroy($image);
		return $destination_url;
    }
    public function uploadFile($path,$filename){
        $fileContent = file_get_contents(htmlspecialchars($path),"rb");
        $file = \Parse\ParseFile::createFromData($fileContent,$filename);
        if($file->save()){
            return $file;
        }else{
            return false;
        }
    }
    
    public function createUserFieldObject($currentUser, $fieldName, $tableName){
        $object = new \Parse\ParseObject($tableName);
        $currentUser->set($fieldName, $object);
        $currentUser->save();
        return $object;
    }
    
}

