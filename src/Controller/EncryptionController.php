<?php

namespace App\Controller;

use App\Entity\Secret;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EncryptionController extends BaseController
{
    /**
     * @Route("/encryptions", name="encryption")
     */
    public function index()
    {
        $secret = new Secret();
        $secret->setPassword("Wilder4Ever");


        $maCleDeCryptage = $this->getParameter('encrypt_keys');
        $maChaineCrypter = $this->encrypte($secret->getPassword(), $maCleDeCryptage);
        $maChaineDecrypter = $this->decrypte($maChaineCrypter, $maCleDeCryptage);


        return $this->render('encryption/index.html.twig', [
        'maChaineACrypter' => $secret->getPassword(),
        'maCleDeCryptage' => $maCleDeCryptage,
        'maChaineCrypter' => $maChaineCrypter,
        'maChaineDecrypter' => $maChaineDecrypter,
        ]);
    }
}
