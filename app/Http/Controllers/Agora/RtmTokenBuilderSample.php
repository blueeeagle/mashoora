<?php
namespace App\Http\Controllers\Agora;
use App\Http\Controllers\Agora\RtmTokenBuilder;

class RtmTokenBuilderSample {

    public function tok(){
        $appId = "80fdd13f7f7e4e4c8582e4b15877e36a";
        $appCertificate = "88090c3ce7e34417aa5404c68f5e16d8";
        $user = "10";
        $expireTimeInSeconds = 3600;

        $token = RtmTokenBuilder::buildToken($appId, $appCertificate, $user, $expireTimeInSeconds);
        return  'Rtm Token: ' . $token . PHP_EOL;
    }


}
