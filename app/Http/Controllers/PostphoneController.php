<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Rules\ReCaptcha;

class PostphoneController extends Controller
{
    public function postphone(Request $request){

        
            $endpoint = config('services.google_recaptcha');

            $post_data = "secret=6Lf0-tAZAAAAACjG_OHu4hkZxvj92Q6kuxfvCZiY"."&response=".$request->token;

            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=utf-8', 'Content-Length: ' . strlen($post_data)));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            $googresp = curl_exec($ch);      
            $decgoogresp = json_decode($googresp);
            curl_close($ch);

            if ($decgoogresp->success == true)
                {
                    $phone = $request->phone;
                    $conn = mysqli_connect("localhost", "crm", "904klfkFL:DlflrD4", "crm");
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        } 
    
                    $sql = "INSERT INTO leads (source, description, phone, lawyer, created_at, responsible, status, service)
                    VALUES ('nedicom.ru', 'лид с главной nedicom.ru', $phone, 2, CURRENT_TIME(), 2, 'поступил', 5)"; //2 - Mark, 4 - Анастасия, 5 - иск, 67 - вера
                    $conn->query($sql);
                    return redirect()->back()->with('success', 'Ваш телефон отправлен. Скоро мы Вам перезвоним!');
                }
                else
                {
                    dd('broke');
                    return redirect()->back()->with('success', 'Не прошла капча. Попробуйте отправить телефон еще раз.');
                }
    }
}