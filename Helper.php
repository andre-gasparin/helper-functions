<?php
class Helper {

    public static function n2br($number)
    {
        $number = str_replace(['.',','], ['', '.'], $number);
        $decimal = @strlen(end(explode('.', $number)));
        $number = number_format($number, $decimal, ',','.');
        return $number;
    }

    public static function n2bd($number)
    {
        $number = str_replace(['.',','], ['', '.'], $number);   
        return $number;
    }

    public static function d2br($date)
    {
        if(preg_match("/nowtime/i", $date))
        {
            $dateok = date('d/m/Y H:i:s');
        }
        elseif(preg_match("/now/i", $date)) {
            $dateok = date('d/m/Y');
        } 
        else
        {
            $explode = @explode(" ", trim($date));
            if(count($explode) > 1)
            {        
                $date =  DateTime::createFromFormat ('Y-m-d H:i:s', $date);
                $dateok = date_format($date, 'd/m/Y H:i:s');
            }
            else
            {
                $date =  DateTime::createFromFormat ('Y-m-d', $date);
                $dateok = date_format($date, 'd/m/Y');
            }    
        }
        return $dateok;
    }

    public static function d2bd($date)
    {  
        if(preg_match("/nowtime/i", $date))
        {
            $dateok = date('Y-m-d H:i:s');
        }
        elseif(preg_match("/now/i", $date)) {
            $dateok = date('Y-m-d');
        } 
        else
        {
            $explode = @explode(" ", trim($date));
            if(count($explode) > 1)
            {        
                $date =  DateTime::createFromFormat ('d/m/Y H:i:s', $date);
                $dateok = date_format($date, 'Y-m-d H:i:s');
            }
            else
            {
                $date =  DateTime::createFromFormat ('d/m/Y', $date);
                $dateok = date_format($date, 'Y-m-d');
            }
        }
        return $dateok;
    }

    public static function existon($word, $phrase)
    {
        return $result = (preg_match("/{$word}/i", $phrase)) ? true : false;
    }

    public static function replace($word, $wordto, $phrase)
    {
        return str_replace($word, $wordto, $phrase);
    }

    public static function exist($var)
    {  
        if(isset($var))
        {
            if(is_array($var))
                $value = (count($var) > 0) ?  true : false;
            $value = (!empty($var)) ?  true : false;
        }
        else
            $value = false;
        return $value;
    }

    public static function count($value)
    {
        if(self::exist($value))
        $value = (is_object($value) || is_array($value)) ? count($value) : strlen($value);

        return $value;
    }

    public static function allerror()
    {
        error_reporting (E_ALL ^ E_NOTICE);
    }
    public static function noerror()
    {
        error_reporting(0);
    }

    public static function noticeofferror()
    {
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
    }

    public static function d($data)
    {
        if(is_null($data)){
            $str = "<i>NULL</i>";
        }elseif($data == ""){
            $str = "<i>Empty</i>";
        }elseif(is_array($data)){
            if(count($data) == 0){
                $str = "<i>Empty array.</i>";
            }else{
                $str = "<table style=\"border-bottom:0px solid #000;\" cellpadding=\"0\" cellspacing=\"0\">";
                foreach ($data as $key => $value) {
                    $str .= "<tr><td style=\"background-color:#008B8B; color:#FFF;border:1px solid #000;\">" . $key . "</td><td style=\"border:1px solid #000;\">" . self::d($value) . "</td></tr>";
                }
                $str .= "</table>";
            }
        }elseif(is_resource($data)){
            while($arr = mysql_fetch_array($data)){
                $data_array[] = $arr;
            }
            $str = self::d($data_array);
        }elseif(is_object($data)){
            $str = self::d(get_object_vars($data));
        }elseif(is_bool($data)){
            $str = "<i>" . ($data ? "True" : "False") . "</i>";
        }else{
            $str = $data;
            $str = preg_replace("/\n/", "<br>\n", $str);
        }
        return $str;
    }
    
    public static function dnl($data)
    {
        echo self::d($data) . "<br>\n";
    }

    public static function dd($data)
    {
        echo self::dnl($data);
        exit;
    }
    
    public static function ddt($message = "")
    {
        echo "[" . date("Y/m/d H:i:s") . "]" . $message . "<br>\n";
    }

}
