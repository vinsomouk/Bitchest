<?php


namespace App\Controller;

use App\Entity\Cryptomonnaie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortefeuilleController extends AbstractController
{
    // ... autres méthodes

    /**
     * @Route("/ajouter-cryptomonnaies", name="ajouter_cryptomonnaies")
     */
    public function ajouterCryptomonnaies(): Response
    {
        $cryptomonnaies = [
            "Bitcoin",
            "Ethereum",
            "Ripple",
            "Bitcoin Cash",
            "Cardano",
            "Litecoin",
            "NEM",
            "Stellar",
            "IOTA",
            "Dash",
        ];

        $entityManager = $this->getDoctrine()->getManager();

        foreach ($cryptomonnaies as $nom) {
            $cryptomonnaie = new Cryptomonnaie();
            $cryptomonnaie->setNom($nom);
            // Ajoutez d'autres propriétés si nécessaire
            $entityManager->persist($cryptomonnaie);
        }

        $entityManager->flush();

        return new Response("Cryptomonnaies ajoutées avec succès !");
    }
}
