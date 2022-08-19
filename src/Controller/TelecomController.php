<?php

namespace App\Controller;

use App\Entity\Ims;
use App\Entity\Nce;
use App\Entity\Workflow;
use App\Form\ImsFormType;
use App\Form\NceType;
use App\Form\WorkFlowType;
use App\Repository\WorkflowRepository;
use Doctrine\Persistence\ManagerRegistry;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class TelecomController extends AbstractController
{/**
     * @Route("/getIms", name="getIms")
      * @param Request $request
        * @throws \Exception
     */
    public function getIms(Request $request,ManagerRegistry $doctrine)
    {

        $ims1 = $this->getDoctrine()->getRepository(Ims::class)->findAll();
        $ims = new Ims();
        $forme =$this->createForm(ImsFormType::class,$ims);
        $forme->handleRequest($request);
        if ($forme->isSubmitted() && $forme->isValid()) {
            if ($file = $request->files->get('ims_form')['my_file'] != null ){
            $file = $request->files->get('ims_form')['my_file']; // get the file from the sent request
            $fileFolder = __DIR__ . '/../../public/uploads/';  //choose the folder in which the uploaded file will be stored

            $filePathName = md5(uniqid()) . $file->getClientOriginalName();
            // apply md5 function to generate an unique identifier for the file and concat it with the file extension
            try {
                $file->move($fileFolder, $filePathName);
            } catch (FileException $e) {
            }
            $spreadsheet = IOFactory::load($fileFolder . $filePathName); // Here we are able to read from the excel file
            $row = $spreadsheet->getActiveSheet()->removeRow(1); // I added this to be able to remove the first file line
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true); // here, the read data is turned into an array
            // dd($sheetData);
            $entityManager = $doctrine->getManager();
            foreach ($sheetData as $Row)
            {

                $uls = $Row['A']; // store the first_name on each iteration
                $rg = $Row['B']; // store the last_name on each iteration
                $sr= $Row['C'];     // store the email on each iteration
                $abonne = $Row['D'];   // store the phone on each iteration
                $adresse = $Row['E'];   // store the phone on each iteration
                $type = $Row['F'];   // store the phone on each iteration
                $etat = $Row['G'];   // store the phone on each iteration
                $fixe = $Row['H'];   // store the phone on each iteration
                $offre = $Row['J'];   // store the phone on each iteration
                $transport = $Row['K'];// store the phone on each iteration
                $distribution = $Row['L'];// store the phone on each iteration
                $rack = $Row['M'];// store the phone on each iteration
                $shelf = $Row['N'];// store the phone on each iteration
                $slot = $Row['O'];// store the phone on each iteration
                $port = $Row['P'];// store the phone on each iteration
                $tid = $Row['Q'];// store the phone on each iteration

                $user_existant = $entityManager->getRepository(Ims::class)->findOneBy(array('fixe' => $fixe));
                // make sure that the user does not already exists in your db
                if (!$user_existant)
                {
                    $ims->setUls($uls);
                    $ims->setRg($rg);
                    $ims->setEtat($etat);
                    $ims->setDistribution($distribution);
                    $ims->setAdresse($adresse);
                    $ims->setOffre($offre);
                    $ims->setPort($port);
                    $ims->setFixe($fixe);
                    $ims->setRack($rack);
                    $ims->setTransport($transport);
                    $ims->setShelf($shelf);
                    $ims->setSr($sr);
                    $ims->setType($type);
                    $ims->setTid($tid);
                    $ims->setSlot($slot);
                    $ims->setOffre($offre);
                    $ims->setAdresse($abonne);
                    $entityManager->persist($ims);
                    $entityManager->flush();
                    $entityManager->clear();
                    // here Doctrine checks all the fields of all fetched data and make a transaction to the database.
                }
            }
            return $this->render("landingPage.html.twig");
        }
        }
        return $this->render("ims.twig",[
            'ims'=>$ims1,'form'=>$forme->createView()
        ]);
    }

    /**
     * @Route("/workflow", name="workflow")
       * @param Request $request
     * @throws \Exception
     */
    public function getWorkflow(  Request $request ,WorkflowRepository  $workflowRepository,ManagerRegistry $doctrine)
    {

        $work = $doctrine->getRepository(Workflow::class)->findAll();
        $work1 = new Workflow();
        $forme =$this->createForm(WorkFlowType::class,$work1);

        $forme->handleRequest($request);

        if ($forme->isSubmitted() && $forme->isValid()) {
          if( $file = $request->files->get('work_flow')['my_file'] != null){
            $file = $request->files->get('work_flow')['my_file']; // get the file from the sent request
            $fileFolder = __DIR__ . '/../../public/uploads/';  //choose the folder in which the uploaded file will be stored
            $filePathName = md5(uniqid()) . $file->getClientOriginalName();
            // apply md5 function to generate an unique identifier for the file and concat it with the file extension
            try {
                $file->move($fileFolder, $filePathName);
            } catch (FileException $e) {
            }
            $spreadsheet = IOFactory::load($fileFolder . $filePathName); // Here we are able to read from the excel file
            $row = $spreadsheet->getActiveSheet()->removeRow(1); // I added this to be able to remove the first file line
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true); // here, the read data is turned into an array
            // dd($sheetData);
            $entityManager = $doctrine->getManager();
            foreach ($sheetData as $Row)
            {

                $n_appel = $Row['A']; // store the first_name on each iteration
                $id_contrat = $Row['B']; // store the last_name on each iteration
                $client= $Row['C'];     // store the email on each iteration
                $nature_service = $Row['D'];   // store the phone on each iteration
                $debit = $Row['E'];   // store the phone on each iteration
                $central = $Row['F'];   // store the phone on each iteration
                $fsi = $Row['G'];   // store the phone on each iteration
                $etat = $Row['H'];   // store the phone on each iteration
                $date_mes_tt = $Row['I'];   // store the phone on each iteration
                $position = $Row['J'];   // store the phone on each iteration
                $user_existant = $entityManager->getRepository(Workflow::class)->findOneBy(array('idContrat' => $id_contrat));
                // make sure that the user does not already exists in your db
                if (!$user_existant)
                {
                    $work1->setNAppel($n_appel);
                    $work1->setEtat($etat);
                    $work1->setCentral($central);
                    $work1->setClient($client);
                    $work1->setDateMestt($date_mes_tt);
                    $work1->setDebit($debit);
                    $work1->setEtat($etat);
                    $work1->setFsi($fsi);
                    $work1->setNatureService($nature_service);
                    $work1->setPosition($position);
                    $work1->setIdContrat($id_contrat);
                    $entityManager->persist($work1);
                    $entityManager->flush();
                    $entityManager->clear();
                    // here Doctrine checks all the fields of all fetched data and make a transaction to the database.
                }
            }
            return $this->render("landingPage.html.twig"
            );
        }
        }
        return $this->render("workflow.html.twig",[
            'work'=>$work,'form'=>$forme->createView()
        ]);

    }
    /**
     * @Route("/nce", name="getNce")
     * @param Request $request
     * @throws \Exception
     */
    public function getNce(Request $request,ManagerRegistry $doctrine)
    {
        $nce = $this->getDoctrine()->getRepository(Nce::class)->findAll();
        $nce1 = new Nce();
        $forme =$this->createForm(NceType::class,$nce1);

        $forme->handleRequest($request);

        if ($forme->isSubmitted() && $forme->isValid()) {
            if( $file = $request->files->get('nce')['my_file'] != null){
            $file = $request->files->get('nce')['my_file']; // get the file from the sent request

            $fileFolder = __DIR__ . '/../../public/uploads/';  //choose the folder in which the uploaded file will be stored

            $filePathName = md5(uniqid()) . $file->getClientOriginalName();
            // apply md5 function to generate an unique identifier for the file and concat it with the file extension
            try {
                $file->move($fileFolder, $filePathName);
            } catch (FileException $e) {
            }
            $spreadsheet = IOFactory::load($fileFolder . $filePathName); // Here we are able to read from the excel file
            $row = $spreadsheet->getActiveSheet()->removeRow(1); // I added this to be able to remove the first file line
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true); // here, the read data is turned into an array
            // dd($sheetData);
            $entityManager = $doctrine->getManager();
            foreach ($sheetData as $Row)
            {

                $etat = $Row['A']; // store the first_name on each iteration
                $position = $Row['B']; // store the last_name on each iteration
                $fixe= $Row['C'];     // store the email on each iteration
                $offre = $Row['D'];   // store the phone on each iteration
                $defval = $Row['E'];   // store the phone on each iteration
                $defval1 = $Row['F'];   // store the phone on each iteration
                $vdsl2 = $Row['H'];   // store the phone on each iteration
                $user_existant = $entityManager->getRepository(Nce::class)->findOneBy(array('fixe' => $fixe));
                // make sure that the user does not already exists in your db
                if (!$user_existant)
                {
                     $nce1->setOffre($offre);
                     $nce1->setEtat($etat);
                     $nce1->setDefval($defval);
                     $nce1->setDefval1($defval1);
                     $nce1->setVdsl2($vdsl2);
                     $nce1->setFixe($fixe);
                     $nce1->setPosition($position);

                    $entityManager->persist($nce1);
                    $entityManager->flush();
                    $entityManager->clear();
                    // here Doctrine checks all the fields of all fetched data and make a transaction to the database.
                }
            }
            return $this->render("landingPage.html.twig"
            );
        }
        }
        return $this->render("nce.html.twig",[
            'nce'=>$nce,'form'=>$forme->createView()
        ]);
    }



    /**
     * @Route("/activeNceNotWf", name="activeNceNotWf")
     *
     */
    public  function getActiveNceNotWf(WorkflowRepository $workflowRepository){

        $activeNceNotWf= $workflowRepository->filterActiveNceNotActiveOnWorkflowOrNotFound();
        $foundWfNotNce= $workflowRepository->filterFoundOnWorkflowNotFoundOnNce();
         $activeWfNotFoundNce= $workflowRepository->filterActiveWorkflowNotFoundIms();
        return $this->render("activeNceNotWf.html.twig",[
            "activeNceNotWf"=>$activeNceNotWf,
            "foundWfNotNce"=>$foundWfNotNce,
            "activeWfNotFoundNce"=>$activeWfNotFoundNce
        ]);

        }
    /**
     * @Route("/foundWfNotNce", name="foundWfNotNce")
     *
     */
    public  function getWfData(WorkflowRepository $workflowRepository){
        $foundWfNotNce= $workflowRepository->filterFoundOnWorkflowNotFoundOnNce();
        return $this->render("foundWfNotNce.html.twig",[
            "foundWfNotNce"=>$foundWfNotNce
        ]);

    }
    /**
     * @Route("/activeWfNotFoundIms", name="activeWfNotFoundIms")
     *
     */
    public  function getActiveWfNotFoundNce(WorkflowRepository $workflowRepository){
        $activeWfNotFoundNce= $workflowRepository->filterActiveWorkflowNotFoundIms();
        return $this->render("activeWfNotFoundIms.html.twig",[
            "activeWfNotFoundNce"=>$activeWfNotFoundNce
        ]);
    }
    /**
     * @Route("/", name="landing")
     *
     */
    public  function landing(){

        return $this->render("landingPage.html.twig"

        );
    }


    /**
     * @param WorkflowRepository $workflowRepository

     *  * @Route("/deleteAllNce", name="deleteAllNce")
     */
    public function deleteAllNce(WorkflowRepository  $workflowRepository){

        $workflowRepository->deleteAllNce();
        return $this->render('landingPage.html.twig');

    }
    /**
     * @param WorkflowRepository $workflowRepository

     *  * @Route("/deleteAllWorkFlow", name="deleteAllWorkFlow")
     */
    public function deleteAllWorkFlow(WorkflowRepository  $workflowRepository){

        $workflowRepository->deleteAllWorkFlow();
        return $this->render('landingPage.html.twig');

    }
    /**
     * @param WorkflowRepository $workflowRepository

     *  * @Route("/deleteAllIms", name="deleteAllIms")
     */
    public function deleteAllIms(WorkflowRepository  $workflowRepository){

        $workflowRepository->deleteAllIms();
        return $this->render('landingPage.html.twig');

    }

    public function pdfAction($htmlFile,$content){
// Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView($htmlFile, [
            'title' => "Welcome ",
            "content"=>$content
        ]);
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream($htmlFile, [
            "Attachment" => true
        ]);

    }

    /**
     * @Route ("/pdfFliterOne", name="pdfFliterOne")
     */
    public function pdfFliterOne(WorkflowRepository $workflowRepository){
        $this->pdfAction("filterPdftemplatetwig",$workflowRepository->filterActiveNceNotActiveOnWorkflowOrNotFound());
    }
    /**
     * @Route ("/pdfFliterTwo", name="pdfFliterTwo")
     */
    public function pdfFliterTwo(WorkflowRepository $workflowRepository){
        $this->pdfAction("filterPdftemplatetwig",$workflowRepository->filterActiveWorkflowNotFoundIms());
    }
    /**
     * @Route ("/pdfFliterThree", name="pdfFliterThree")
     */
    public function pdfFliterThree(WorkflowRepository $workflowRepository){
        $this->pdfAction("filterPdftemplatetwig",$workflowRepository->filterFoundOnWorkflowNotFoundOnNce());
    }


}
