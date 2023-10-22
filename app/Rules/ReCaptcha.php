<?php

namespace App\Rules;

use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $endpoint = config('services.google_recaptcha');

        $post_data = "secret=6Lf0-tAZAAAAACjG_OHu4hkZxvj92Q6kuxfvCZiY"."&response=".$value;

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=utf-8', 'Content-Length: ' . strlen($post_data)));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $googresp = curl_exec($ch);      
        $decgoogresp = json_decode($googresp);
        curl_close($ch);

        //if(  $response['success'] && $response['score'] > 0.5) {
        if($decgoogresp->success == true) {            
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Что - то пошло не так. Попробуйте связаться с нами по телефону.';
    }
}