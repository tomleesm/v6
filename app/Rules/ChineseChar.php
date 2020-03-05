<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ChineseChar implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * rule: all $values are Chinese character
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $charArray = $this->stringToArray($value);
        // 輸入的字串，一個一個抓取字元
        foreach($charArray as $char)
        {
            // 抓取字元的 unicode 代碼
            $code = mb_ord($char);
            // 比對 unicode 代碼是否在「中日韓統一表意文字」範圍內
            if($code < 19968 || $code > 40959)
                return false;
        }
        // 全部的字元都在的話，通過驗證，否則不通過
        return true;
    }

    public function stringToArray($string)
    {
        return preg_split('/(?<!^)(?!$)/u', $string );
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '欄位 :attribute 請輸入中文';
    }
}
