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

            /*$response = Http::asForm()->post($endpoint['url'], [
                'secret' => $endpoint['secret_key'],
                'response' => $request->token,           
            ]);
            
    
            //if(  $response['success'] && $response['score'] > 0.5) {
            if(  $response['success'] ) {
                dd('test');
            }*/

            //$post_data = "secret=6Lf0-tAZAAAAACjG_OHu4hkZxvj92Q6kuxfvCZiY"."&response=".$request->token;

            $post_data = array(
                'secret' => "6Lf0-tAZAAAAAIxKP1YOtKrCfqSm_yl3QF-IzglK",
                'response' => $request->token,
            );
            $post_data = json_encode($post_data);

            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=utf-8', 'Content-Length: ' . strlen($post_data)));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            $googresp = curl_exec($ch);      
            $decgoogresp = json_decode($googresp);
            curl_close($ch);

            dd($post_data, $googresp, $decgoogresp);
            if ($decgoogresp->success == true)
                {
                    dd('good');
                }
                else
                {
                    dd('bad');
                }
            

        
        
                
                $phone = $request->phone;
                $conn = mysqli_connect("178.208.94.106", "crm", "904klfkFL:DlflrD4", "crm");
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    } 

                $sql = "INSERT INTO leads (source, description, phone, lawyer, created_at, responsible, status, service)
                VALUES ('nedicom.ru', 'лид с главной nedicom.ru', $phone, 2, CURRENT_TIME(), 2, 'поступил', 5)"; //2 - Mark, 4 - Анастасия, 5 - иск, 67 - вера
                //$conn->query($sql);

        return redirect()->back()->with('success', 'Ваш телефон отправлен. Скоро мы Вам перезвоним!');
    }
}