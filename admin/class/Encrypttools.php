<?php
namespace airportEncrypt;

class EncryptTools{
    
    public $pass = '|CiPbf^* .4?][2VjC<nh2wu#2`)uD$NBqgnef0m);-I:A^z;g$fvht-w~(25XKR';
    public $salt = '_|0<dgV(7WS)ia?TR+`&GAs2!H)!ZGso<YLdb|+N){])tq`uDnP(i;{/m#AUQsH;';
	
    public function encrypt( $msg,  $base64 = true ) {
	$pass = $this->pass;
        $salt = $this->salt;
        $k = self::pbkdf2($pass, $salt, 1000, 32);
        if ( ! $td = mcrypt_module_open('rijndael-256', '', 'ctr', '') )
            return false;
     
        $msg = serialize($msg);                         
        $iv = mcrypt_create_iv(32, MCRYPT_RAND);        
     
        if ( mcrypt_generic_init($td, $k, $iv) !== 0 )  
            return false;
     
            $msg = mcrypt_generic($td, $msg);               
            $msg = $iv . $msg;                              
            $mac = self::pbkdf2($msg, $k, 1000, 32);       
            $msg .= $mac;                                   
     
            mcrypt_generic_deinit($td);                     
            mcrypt_module_close($td);                       
     
            if ( $base64 ) $msg = base64_encode($msg);      
     		$msg = str_replace('+','^',$msg);
                $msg = str_replace('/','~',$msg);
            return $msg;                                    
        }
		
       public function decrypt( $msg, $base64 = true ) {
                   $pass = $this->pass;
                   $salt = $this->salt;
		   $msg = str_replace('^','+',$msg);
                    $msg = str_replace('~','/',$msg);
     		$k = self::pbkdf2($pass, $salt, 1000, 32);
            if ( $base64 ) $msg = base64_decode($msg);          
     
            if ( ! $td = mcrypt_module_open('rijndael-256', '', 'ctr', '') )
                return false;
     
            $iv = substr($msg, 0, 32);                          
            $mo = strlen($msg) - 32;                            
            $em = substr($msg, $mo);                            
            $msg = substr($msg, 32, strlen($msg)-64);           
            $mac = self::pbkdf2($iv . $msg, $k, 1000, 32);     
     
            if ( $em !== $mac )                                 
                return false;
     
            if ( mcrypt_generic_init($td, $k, $iv) !== 0 )      
                return false;
     
            $msg = mdecrypt_generic($td, $msg);                 
            $msg = unserialize($msg);                           
     
            mcrypt_generic_deinit($td);                         
            mcrypt_module_close($td);                           
     		
            return $msg;                                        
        }
     public function pbkdf2( $p, $s, $c, $kl, $a = 'sha256' ) {
     
            $hl = strlen(hash($a, null, true)); 
            $kb = ceil($kl / $hl);              
            $dk = '';                           
     
            for ( $block = 1; $block <= $kb; $block ++ ) {
     
                $ib = $b = hash_hmac($a, $s . pack('N', $block), $p, true);
     
                for ( $i = 1; $i < $c; $i ++ )
     
                    $ib ^= ($b = hash_hmac($a, $b, $p, true));
     
                $dk .= $ib; 
            }
     
            return substr($dk, 0, $kl);
        }
}
	