<?php 

class Validation
{
    public static function textValidation($text){
        if(empty($text)){
            return "Enter value";
        }
        elseif(ctype_alpha(str_replace(' ', '', $text))==false && preg_match('/[ĐđŽžĆćČčŠš]/m',$text)==false){
            return "The field can only contains letters and spaces";
        }
        elseif(strlen($text) > 50){
            return "Field must be less than 50 characters";
        }
        else{
            return false; //Ako je sve kako treba
        }
    }
}