<?php
namespace Academy01\InputSanitizer;
/**
 * Sanitizes a string or array to prevent common vulnerabilities.
 *
 * Author : Mohammad Hossein Nobakht (Majid)
 * 
 *  Academy01.ir
 */
class InputSanitizer
{
    public static function sanitize(String|Array $input, $tag_flag = false) : String|Array {

        // check type of input (String Array)
        if(is_string($input)) {
            return self::sanitize_string($input, $tag_flag);
        }else {
            return self::sanitize_array($input);
        }

    }


    private static function sanitize_string($string, $tag_flag = false) : string {
        $options = [
            'flags' => FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_ENCODE_AMP
        ];

        $sanitized_input = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
        $sanitized_input = trim($sanitized_input, ENT_QUOTES);
        if($tag_flag) {
            $sanitized_input = filter_var($sanitized_input, FILTER_SANITIZE_STRING, $options);
            $sanitized_input = strip_tags($sanitized_input);
        }
        

        return $sanitized_input;
    }


    private static function sanitize_array($array) : array {

        $sanitized_array = [];

        foreach($array as $key => $value) {

            $sanitized_key      = self::sanitize_string($key, true);
            $sanitized_value    = self::sanitize_string($value, true);

            $sanitized_array[$sanitized_key] = $sanitized_value;

        }

        return $sanitized_array;

    }
}
