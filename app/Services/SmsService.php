<?php

namespace App\Services;

use App\Jobs\DetachSmsCode;
use App\Models\PhoneVerification;
use App\Services\Service;
use App\Services\ServicesContract;
use Illuminate\Support\Facades\Http;

class SmsService extends Service implements ServicesContract
{
    public function send($phone, $ip = null)
    {
        $search = $this->search($phone);
        if($search){

            $startDate = new \DateTime($search->created_at);
            $now = new \DateTime();

            $diffInSeconds = $now->getTimestamp() - $startDate->getTimestamp();
            $time = env('SMSDETACH_SEC', 180) - $diffInSeconds;
            $code = $search->code;

        } else {
            $code = mt_rand(100000, 999999);
            $create = PhoneVerification::create([
                'phone' => $phone,
                'code' => $code,
            ]);
            DetachSmsCode::dispatch($create)->delay(now()->addSeconds(env('SMSDETACH_SEC') - 2));

            $parameters = [
                [
                    'name' => 'CODE',
                    'value' => $code,
                ],
            ];
            $parameters = json_encode($parameters, true);
            $smsdata = '{"mobile":"0' . $phone . '","templateId":572896,"parameters":' . $parameters . '}';
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.sms.ir/v1/send/verify',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $smsdata,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Accept: text/plain',
                    "x-api-key: " . env('SMSIR_API')
                ],
            ]);

            $response = curl_exec($curl);

            curl_close($curl);
            $time = env('SMSDETACH_SEC', 180);
        }
        return [
            'time' => $time,
            'code' => env('APP_DEBUG') ? $code : null
        ];

    }

    protected function search($phone){
        return PhoneVerification::where('phone', $phone)->first();
    }

    public function check($phone, $code){
        if($this->search($phone)){
            if($this->search($phone)->code == $code){
                $this->search($phone)->delete();
                return true;
            }
        }
        return false;
    }

}
