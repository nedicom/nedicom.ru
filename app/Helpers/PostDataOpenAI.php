<?php

namespace App\Helpers;

class PostDataOpenAI{
    public static function PostData($conversation, $phone)
    {
        $conn = mysqli_connect("localhost", "crm", "904klfkFL:DlflrD4", "crm");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
    
            $sql = "INSERT INTO leads (source, description, phone, lawyer, created_at, responsible, status, service)
            VALUES ('nedicom.ru', '$conversation', '$phone', 2, CURRENT_TIME(), 2, 'поступил', 5)"; //2 - Mark, 4 - Анастасия, 5 - иск, 67 - вера
            $conn->query($sql);
        }
    }