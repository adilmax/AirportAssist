<?php
namespace airportAssBlogVerification;
require_once 'class/classParseSettings.php';
require_once 'class/classCommonFunction.php';

class blogVerification{
    
     public function addBlog($data){
        // create an object for class commonFunction..
        $commonModel = new \murCommon\CommonFunction;
        // create an object for blog post
        $object = new \Parse\ParseObject("BlogPost");
       // image uploading procedure..
        if($_FILES['image']["name"]!=""){
            $imageUrl = $commonModel->processFile($_FILES['image']);
            $object->set('image',$imageUrl);       
        }else{
            $imageUrl = true;
        }
        // $imageUrl ->return the url of image..
        //check that $imagUrl value is true or not, if it is true save the data in blogpost, else just return false...
        
        if($imageUrl !=false){
            $object->set('title',$data['postTitle']);
            $object->set('content',$data['postDetails']);
            $object->set('tags',$data['tags']);
            $object->set('category',$data['category']);
            $object->set('type',$data['section']);
            $object->set('status',true);  
            try {
                $object->save();
                return true;
            } catch (ParseException $ex) {  
                return false;
            }
            return true;
        }else{
            return false;
        }
    }
    
    public function fetchComments($page){
        $query = new \Parse\ParseQuery("BlogComment");  
       $skip = ($page -1) * 100;
        $query->skip($skip);
        $query->limit(100);
        $query->descending("createdAt");
        $results = $query->find();
        return $results;
    }
    
    public function TotalCount() {
        $query = new \Parse\ParseQuery("BlogComment");        
        $query->descending("createdAt");
        return $query->count();
    }
    
    public function changeCommentStatus($objectID,$status){
        $object = new \Parse\ParseObject("BlogComment",$objectID);                    
        $object->set('status',$status);
        try {
            $object->save();
            return true;
        } catch (ParseException $ex) {  
            return false;
        }
                    
    }
    public function fetchBlog($page){
        $query = new \Parse\ParseQuery("BlogPost");
        $query->equalTo("status", true);
        $skip = ($page -1) * 10;
        $query->skip($skip);
        $query->limit(10);
        $query->descending("createdAt");
        $results = $query->find();
        return $results;
    }
    public function TotalCountBlog() {
        $query = new \Parse\ParseQuery("BlogPost"); 
        $query->equalTo("status", true);
        $query->descending("createdAt");
        return $query->count();
    }
    public function getBlogInfo($objectID){
        $object = new \Parse\ParseObject("BlogPost",$objectID);
        $object->fetch();       
        return $object;  
    }
  public function updateBlog($data,$objectID){
        // create an object for class commonFunction..
        $commonModel = new \murCommon\CommonFunction;
        // create an object for blog post
        $object = new \Parse\ParseObject("BlogPost",$objectID);
       // image uploading procedure..
        if($_FILES['image']["name"]!=""){
            $imageUrl = $commonModel->processFile($_FILES['image']);
            $object->set('image',$imageUrl);       
        }else{
            $imageUrl = true;
        }
        // $imageUrl ->return the url of image..
        //check that $imagUrl value is true or not, if it is true save the data in blogpost, else just return false...
        
        if($imageUrl !=false){
            $object->set('title',$data['postTitle']);
            $object->set('content',$data['postDetails']);
            $object->set('category',$data['category']);
            $object->set('type',$data['section']);
            $object->set('tags',$data['tags']);      
            try {
                $object->save();
                return true;
            } catch (ParseException $ex) {  
                return false;
            }
            return true;
        }else{
            return false;
        }
    }
    public function deleteBlog($objectID){
        $query = new \Parse\ParseQuery("BlogPost");
        $query->equalTo("objectId", $objectID);
        $result = $query->find();
        if(count($result)>0){
            $object = $result[0];
            $object->set("status",false);
            $object->save();
            return true;
        }else{
            return false;
        }
    }
}
    