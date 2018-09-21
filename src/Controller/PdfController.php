<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Spipu\Html2Pdf\Html2Pdf;
use App\Service\ContratService;
use App\Entity\Contrat;

class PdfController extends AbstractController
{
    /**
     * @Route("/pdf/{id}", name="contrat_pdf")
     * @ParamConverter("contrat", class="App\Entity\Contrat", options={"id" = "id"})
     */
    public function contrat(Contrat $contrat)
    {
        $contratService = new ContratService($contrat);
        $html2pdf = new Html2Pdf();
        $html2pdf->writeHTML($contratService->get());
        $html2pdf->output();
        return $this->render('pdf/index.html.twig', [
            'controller_name' => 'PdfController',
        ]);
    }
}
