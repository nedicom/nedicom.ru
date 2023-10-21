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
            
            $response = Http::asForm()->post($endpoint['url'], [
                'secret' => $endpoint['secret_key'],
                'sitekey' => $request->captcha_token,              
            ])->json();
    
            //if(  $response['success'] && $response['score'] > 0.5) {
                if(  $response['success'] ) {
                dd('test');
                dd('true');
            }
    
            dd('false');
        
        
                
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