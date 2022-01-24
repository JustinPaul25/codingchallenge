<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserEmailController extends Controller
{
    public function matchUserEmails()
    {
        $datas = [];
        $names = storage_path() . "/app/public/email_names.json";
        $namesDecode = json_decode(file_get_contents($names), true);
        $numbers = storage_path() . "/app/public/email_numbers.json";
        $numbersDecode = json_decode(file_get_contents($numbers), true);

        foreach($namesDecode as $name) {
            foreach($numbersDecode as $number) {
                if($name['email'] === $number['email']) {
                    $isExist = false;
                    for($ctr = 0; $ctr < count($datas); $ctr++) {
                        if($datas[$ctr]['email'] === $number['email']) {
                            unset($datas[$ctr]);
                            $ctr = count($datas);
                            $isExist = true;
                        }
                    }
                    if(!$isExist) {
                        $data = [
                            "first_name" => $name['first_name'],
                            "last_name" => $name['last_name'],
                            "cc_number" => $number['cc_number'],
                            "email" => $number['email']
                        ];
                        array_push($datas, $data);
                    }
                    break;
                }
            }
        }

        return view('welcome', ['datas' => $datas]);
    }
}
