<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostphoneController extends Controller
{
    public function postphone(Request $request){  
        
                $phone = $request->phone;
                echo    $phone;             
                $conn = mysqli_connect("127.0.0.1", "developer", "Bonaqua123#$", "nedicom");
                //$conn = mysqli_connect("127.0.0.1", "root", "", "crm");
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    } 

                $sql = "INSERT INTO leads (source, description, phone, lawyer, created_at, responsible, status, service)
                VALUES ('сайт наследство', 'без описания', $phone, 2, CURRENT_TIME(), 2, 'поступил', 5)"; //2 - Mark, 4 - Анастасия, 5 - иск, 67 - вера
                $conn->query($sql);

        return redirect()->route('login');
    }
}