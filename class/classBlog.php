<?php
namespace airportAssBlog;
require_once 'class/classParseSettings.php';
require_once 'class/classCommonFunction.php';

class blog{
    
     public function fetchBlog($page,$category, $date){
        $query = new \Parse\ParseQuery("BlogPost");
        $skip = ($page -1) * 10;
        $query->equalTo("status", true);
        $query->equalTo("type", "airport");
        if($date !="" ){
             $query->greaterThanOrEqualTo('createdAt',$date);
        }
        if($category !="" ){
             $query->equalTo('category',$category);
        }
        $query->skip($skip);
        $query->limit(10);
        $query->descending("createdAt");
        $results = $query->find();
        return $results;
    }
    
     public function TotalCount() {
        $query = new \Parse\ParseQuery("BlogPost"); 
        $query->equalTo("status", true);   
        $query->equalTo("type", "airport");
        $query->descending("createdAt");
        return $query->count();
    }
    
    public function getBlogInfo($objectID){
        $object = new \Parse\ParseObject("BlogPost",$objectID);
        $object->fetch();       
        return $object;  
    }  
     public function addComment($data,$objectID){     
        $postObject = new \Parse\ParseObject("BlogPost",$objectID);        
        // create an object for blog post
        $object = new \Parse\ParseObject("BlogComment");
        $object->set('author',$data['name']);
        $object->set('content',$data['description']);
        $object->set('email',$data['email']);  
        $object->set('postID',$postObject);  
        $object->set('status',false);  
        try {
            $object->save();
            return true;
        } catch (ParseException $ex) {  
            return false;
        }        
    }
    public function fetchComments($objectID){
        $object = new \Parse\ParseObject("BlogPost",$objectID);
        $query = new \Parse\ParseQuery("BlogComment");      
        $query->equalTo("postID",$object);
        $query->equalTo('status', true);
        $query->limit(100);
        $query->descending("createdAt");
        $results = $query->find();
        return $results;
    }
    public function emailValidation($email) {
        $error = [];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $error[] = 'Please enter valid email address';
            return $error;
        }
    }
    public function checkEmail($email){
         $error = [];
        $query = new \Parse\ParseQuery("AirportSubscribe");  
        $query->equalTo('email', $email);
        if($query->count() > 0){
            $error[] = 'Eamil ID already exists ';
            return $error;
        }        
    }
    
    public function addSubscriber($email){
         $object = new \Parse\ParseObject("AirportSubscribe");
         $object->set('email',$email);
         $object->save();
         return true;
    }
    
    public function fetchSpecificBlog($page, $date){
        $query = new \Parse\ParseQuery("BlogPost");
        $skip = ($page -1) * 10;        
        $query->greaterThanOrEqualTo('createdAt',$date);
        $query->skip($skip);
        $query->limit(10);
        $query->descending("createdAt");
        $results = $query->find();
        return $results;
    }    
    
}
