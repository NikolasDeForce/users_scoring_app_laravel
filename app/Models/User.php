<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    protected $guarded = false;

    static public function scoring(array $user) {
        $score = 0;
        //Считаем скоринг по первым 3 цифрам номера телефона
        $megaphone_nums = array('920', '921', '922', '923', '924', '925', '926', '927', '928', '929');
        $bilain_nums = array('903','905','906','909','960','961','962','963','964','965','967');
        $mts_nums = array('910','915','916','917','911','981','918','988','989','912','917','919','982','983','914','984');

        $num_first = substr($user['phone'],0,1);
        if ($num_first == "+") {
            $num_pref = substr($user["phone"],2,3);
            if (in_array($num_pref, $megaphone_nums)) {
                $score += 10;
            } elseif (in_array($num_pref, $bilain_nums)) {
                $score += 5;
            } elseif (in_array($num_pref, $mts_nums)) {
                $score += 3;
            } else {
                $score += 1;
            }
        } elseif($num_first == "7") {
            $num_pref = substr($user["phone"],1,3);
            if (in_array($num_pref, $megaphone_nums)) {
                $score += 10;
            } elseif (in_array($num_pref, $bilain_nums)) {
                $score += 5;
            } elseif (in_array($num_pref, $mts_nums)) {
                $score += 3;
            } else {
                $score += 1;
            }
        } elseif ($num_first == "9") {
            $nums_pref = substr($user["phone"],0,3);
            if (in_array($nums_pref, $megaphone_nums)) {
                $score += 10;
            } elseif (in_array($nums_pref, $bilain_nums)) {
                $score += 5;
            } elseif (in_array($nums_pref, $mts_nums)) {
                $score += 3;
            } else {
                $score += 1;
            }
        } else {
            $user["phone"] = 'not russian phone numbers';
            $score += 0;
        }

        //Считаем скоринг по домену почты
        $email_explode = explode("@", $user["email"]);
        $email_user = explode(".", $email_explode[1]);
        if ($email_user[0] == "gmail") {
            $score += 10;
        } elseif ($email_user[0] == "yandex") {
            $score += 8;
        } elseif ($email_user[0] == "mail") {
            $score += 6;
        } else {
            $score += 3;
        }

        //Считаем скоринг по образованию
        $edu = $user["education"];
        if ($edu == "Высшее образование") {
            $score += 15;
        } elseif ($edu == "Специальное образование") {
            $score += 10;
        } else {
            $score += 5;
        }

        //Считаем скоринг по галочке
        if (!isset($user["is_accept_data"])) {
            $score += 0;
        } else {
            $score += 4;
        }

        return $score;
    }
}