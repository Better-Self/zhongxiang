<?php 
namespace App\MD5; 
use  Illuminate\Contracts\Hashing\Hasher as HasherMD5; 
//后添加MD5验证 
class MD5Hasher implements HasherMD5 
{ 
    public function make($value, array $options = []) 
    { 
        return md5($value);//根据后面加密规则来设置 
    } 
    public function check($value, $hashedValue, array $options = []) 
    { 
        if(empty($hashedValue)){ 
            return true; 
        } 
        return $this->make($value) === $hashedValue; 
    } 
    public function needsRehash($hashedValue, array $options = []) 
    { 
        return false; 
    } 
} 

