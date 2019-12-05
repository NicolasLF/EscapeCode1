<?php


namespace App\Controller;

class BaseController extends AbstractController
{
    public function encrypt($maChaineACrypter, $maCleDeCryptage = "")
    {
        if ($maCleDeCryptage == "") {
            $maCleDeCryptage = $GLOBALS['PHPSESSID'];
        }
        $maCleDeCryptage = md5($maCleDeCryptage);
        $letter = -1;
        $newstr = '';
        $strlen = strlen($maChaineACrypter);
        for ($i = 0; $i < $strlen; $i++) {
            $letter++;
            if ($letter > 31) {
                $letter = 0;
            }
            $neword = ord($maChaineACrypter{$i}) + ord($maCleDeCryptage{$letter});
            if ($neword > 255) {
                $neword -= 256;
            }
            $newstr .= chr($neword);
        }
        return base64_encode($newstr);
    }

    /**
     * @param string $maCleDeCryptage
     * @param $maChaineCrypter
     * @return string
     */
    public function decrypt($maChaineCrypter, $maCleDeCryptage = "")
    {
        if ($maCleDeCryptage == "") {
            $maCleDeCryptage = $GLOBALS['PHPSESSID'];
        }

        $maCleDeCryptage = md5($maCleDeCryptage);
        $letter = -1;
        $newstr ='';
        $maChaineCrypter = base64_decode($maChaineCrypter);
        $strlen = strlen($maChaineCrypter);
        for (0; $i < $strlen; $i++) {
            $letter++;
            if ($letter > 31) {
                $letter = 0;
            }
            $neword = ord($maChaineCrypter{$i}) - ord($maCleDeCryptage{$letter});
            if ($neword < 1) {
                $neword += 256;
            }
            $newstr .= chr($neword);
        }
        return $newstr;
    }

}