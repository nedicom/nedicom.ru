<?php

namespace App\Helpers\Rating;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RatingCounter
{
    public static function Rating($Daytotal, $Lastpub)
    {
        $Today = Carbon::today(); //today

        $Lpub = $Today->diffInDays($Lastpub); //diff betwen lastpubdate and today

        $Term = ($Daytotal - $Lpub); //check if the term is gone


        if ($Term < 0) {
            if ($Term < -20) { //all term is gone
                $Qpub = 0;
            } else { //term is gone but not all
                $Qpub = 10 + ($Term) * 0.5;
            }
        } else { //term is not gone but not all
            $Qpub = 10;
        }
        return $Qpub;
    }

    public static function DayConter($Ucur, $Umax)
    {
            $Dday = round(($Ucur * 20 / $Umax), 0); //quantity of discount days for current user

            $Dayall = 0; //quantity of discount days  for all users

            $Daytotal = $Dday + $Dayall; //total discount days
            
            return $Daytotal;
    }

    public static function DBPostRecord($Daytotal, $Qpub, $User)
    {
        $user = User::find($User);   
        $user -> pub_rating = $Qpub;
        $user -> posts_days = $Daytotal;

        $question_rating = $user -> question_rating;
        $answer_rating = $user -> answer_rating;
        $practice_rating = $user -> practice_rating;

        $user->total_rating = ($Qpub + $question_rating + $answer_rating + $practice_rating)/4;
        $user->save();
    }

    public static function DBPracticeRecord($Daytotal, $Qpub, $User)
    {
        $user = User::find($User);   
        $user -> practice_rating = $Qpub;
        $user -> practice_days = $Daytotal;

        $pub_rating = $user -> pub_rating;
        $question_rating = $user -> question_rating;
        $answer_rating = $user -> answer_rating;
        

        $user->total_rating = ($pub_rating + $question_rating + $answer_rating + $Qpub)/4;
        $user->save();
    }
  
    public static function DBQuestionRecord($Daytotal, $Qpub, $User)
    {
        $user = User::find($User);   
        $user -> question_rating = $Qpub;
        $user ->  question_days = $Daytotal;

        $pub_rating = $user -> pub_rating;
        $answer_rating = $user -> answer_rating;
        $practice_rating = $user -> practice_rating;

        $user->total_rating = ($pub_rating + $Qpub + $answer_rating + $practice_rating)/4;
        $user->save();
    }
    
    public static function DBAnswernRecord($Daytotal, $Qpub, $User)
    {
        $user = User::find($User);   
        $user -> answer_rating = $Qpub;
        $user ->  answer_days = $Daytotal;

        $pub_rating = $user -> pub_rating;
        $practice_rating = $user -> practice_rating;
        $question_rating = $user -> question_rating;

        $user->total_rating = ($pub_rating + $question_rating + $Qpub + $practice_rating)/4;
        $user->save();
    }

}
