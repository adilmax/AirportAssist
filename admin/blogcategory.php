<?php
if(isset($_POST['section'])){
    $section = $_POST['section'];
    if($section == 'airport'){
        $blogpostCategory = [1=>'Travel Trends',2=>'Travel Tips',3=>'Travel News',4=>'Travel Money'];
    }elseif($section == 'medical'){
        $blogpostCategory = [1=>'Destination for Treatment',2=>'Treatment',3=>'Wellness & Spa',4=>'Medical Care Info'];
    }else{
        $blogpostCategory = [1=>'Travel Trends',2=>'Travel Tips',3=>'Travel News',4=>'Travel Money'];
    }
    echo json_encode($blogpostCategory);

}else{
    echo "sorry no such a file";
}