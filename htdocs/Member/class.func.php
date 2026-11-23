<?php
class func
{
    function is_valid_string($string) {

        $cfgBadChars='`~!@#$%^&*()+-_=[]{};\'\\:"|,/<>? ';

        if (empty($string))
            return true;

        for ($i = 0; $i < strlen($cfgBadChars); $i++):
            if (strstr($string, $cfgBadChars[$i]))
            return true;
        endfor;
        
        return false;
    }

    // The function filter is the value $ojb what you will check
    function char_filter($ojb)
    {
        $badchars='Ý`~!@$%^()+-_=[]{}\'\\:"|,/<>? '; // The characters not allowed are listed here
        for ($i=0;$i<strlen($badchars);$i++){
            $ojb=str_replace($badchars[$i],"",$ojb);

        }

        return $ojb;
    }
}
?>
