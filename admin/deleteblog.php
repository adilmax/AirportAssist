<? 
require_once 'class/classBlogVerification.php';

$blogModel = new airportAssBlogVerification\blogVerification;
if(isset($_GET['id'])){
    $objectID = $_GET['id'];
    $blogModel->deleteBlog($objectID);
    header("Location:bloglist?s=1");
}else{
    header("Http/1.0 404 Not Found");
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}
?>
