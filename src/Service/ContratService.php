<?php

namespace App\Service;

class ContratService
{
    private $contrat;
    private $entreprise;
    private $materiel;
    public $html;

    public function __construct($contrat)
    {
        $this->contrat = $contrat;
        $this->entreprise = $this->contrat->getEntreprise();
        $this->materiel = $this->contrat->getMateriel();
    }
    
    /**
     * @param $contrat
     * @return string
     */
    public function get()
    {
        $this->getPage();
        return $this->html;
    }

    /**
     * @return string
     */
    public function getStyle()
    {
        $this->html .= '<style>
                page {font-family: Times, serif;}
                ul li {display: block; float: left; height: 27px; list-style: none; margin-right: 20px;}
                h2 {text-align: center;}
                h5 {font-size: 16px; margin-top: 35px;}
                h2, h5 {text-transform: uppercase; color: #62B4F5;}
                div.content {font-size: 14px; text-align: justify;line-height: 1.6; margin-top: 20px;}
                div.date {text-align: right;margin-top: 20px;}
                div.footer {text-align: right;font-size: 10px; margin-right: 80px;}
                div.signature {margin-top: 50px;}
                div.locataire, div.loueur {text-align: center;width: 50%; display: inline; border: 1px; padding: 10px;line-height: 1; position: relative;}
                a {color: #62B4F5;}
                </style>';
    }

    /**
     * @param $contrat
     * @return string
     */
    public function getPage()
    {
        $this->getStyle();

        $this->html .= '<page backtop="7mm" backbottom="7mm" backleft="20mm" backright="20mm">';
        $this->header();
        $this->footer();
        $this->title();
        $this->contentPage1();
        $this->contentPage2();
        $this->contentSignature();
        $this->html .= '</page>';
    }

    /**
     * @return string
     */
    public function header() 
    {
        $this->html .= '<page_header>&nbsp;</page_header>';
    }
    
    public function footer() 
    {
        $this->html .= '<page_footer><div class="footer"><b>CONTRAT DE LOCATION – CTP</b> – LOCATAIRE</div></page_footer>';
    }
    
    function title() 
    {
        $this->html .= '<h2>Contrat de location</h2>';
    }
    
    public function contentPage1()
    {
        $this->html .= '
            <div class="content">
                <p>ENTRE,</p> 
                <p>Le Cabinet Topographie Prestige (<b>CTP</b>), siège social : hersent derrière la station SGF, villa N°542, Thiès, 
                email : <a href="mailto:contact@topographie–prestige.com">contact@topographie–prestige.com</a>, Téléphone : 77 335 02 02 – BP 553 RP Thiès; 
                ci-après dénommée sous le vocable de : <b>Loueur</b></p>
                <p>Et</p> 
                <p>
                    L’entreprise : <b>' . $this->entreprise->getNom() . '</b>, siège social : <b>' . $this->entreprise->getAdresse() . '</b>, ville : <b>' . $this->entreprise->getVille() . '</b>, email : <b>' . $this->entreprise->getEmail() . '</b>, Téléphone : <b>' . $this->entreprise->getTelephone() . '</b> – BP <b>' . $this->entreprise->getCodePostal() . '</b>; 
                    ci-après dénommée sous le vocable de : <b>Locataire</b>
                </p>

                <p>IL A ETE CONVENU CE QUI SUIT :</p>
                
                <h5>1 - Nature et date d\'effet du contrat</h5>
                Le loueur met à disposition du locataire, un <b>' . $this->materiel->getNom() . '</b> de marque un <b>' . $this->materiel->getMarque() . '</b>, modèle un <b>' . $this->materiel->getModele() . '</b>, à titre onéreux et à compter du <b>' . $this->contrat->getDateDebut()->format('d-m-Y') . '</b>.
                
                <h5>2 - Etat de l\'appaeil</h5>
                Lors de la remise de l’appareil et lors de sa restitution, un procès-verbal de l\'état sera établi entre le locataire et le loueur. 
                L’appareil devra être restitué le même état que lors de sa remise. Toutes les détériorations sur l’appareil constatées sur le PV de sortie seront à la charge du locataire. 
                
                <h5>3 - Prix de la location de l\'appareil</h5>
                Les parties s\'entendent sur un prix de location de <b>' . $this->contrat->getPrix() . '</b> frs CFA par jour (calendaires). Ce prix comprend un forfait de l’utilisation de l’appareil et de la rémunération de l’operateur topographe.   
                Le locataire prendra en charge l\'ensemble des charges afférentes à l\'exécution des travaux sur le terrain :    
                <ul>
                    <li>Frais de transport,</li>
                    <li>Restauration,</li>
                    <li>Logement en dehors de la région de Thiès et Dakar.</li>
                </ul>
            </div>';
    }

    public function contentPage2()
    {
        $dateDebut = $this->contrat->getDateDebut()->setTime(0, 0, 0);
        $dateFin = $this->contrat->getDateFin()->setTime(0, 0, 0);
        $interval = $dateDebut->diff($dateFin);
        $duree = $interval->format('%a') + 1;
        $duree = $duree > 1 ? $duree . ' jours' :  $duree . ' jour';
        $this->html .= '
            <div class="content">                
                <h5>4 - Durée et restitution de l\'appareil</h5>
                Le contrat est pour une durée de <b>' . $duree .'</b> et la restitution de l’appareil devra se faire au plus tard 24 h de la fin du présent contrat.
                
                <h5>5 - Clause en cas de litige</h5> 
                Tout différend relatif à l’interprétation et à l’application du présent contrat devra être résolu à l’amiable.
                <p>Au cas où tel règlement ne pourrait être obtenu à propos du différend, compétence est donnée aux juridictions compétentes.</p>
                <p>Fait en deux exemplaires originaux remis à chacune des parties, </p>
            </div>';
    }

    public function contentSignature()
    {
        $this->html .= '
            <div class="content date">                
                A Dakar, le ' . $this->contrat->getDateSignature()->format('d-m-Y') . '
            </div>
            <div class="content signature">                
                <div class="locataire">Le <b>loueur</b><br/>signature précédée de la mention manuscrite bon pour accord</div>
                <div class="loueur">Le <b>locataire</b><br/>signature précédée de la mention manuscrite bon pour accord</div>
            </div>';
    }
}