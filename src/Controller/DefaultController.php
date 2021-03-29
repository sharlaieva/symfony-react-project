<?php
    
namespace App\Controller;
    
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Record;
use App\Entity\RecordICO;
use App\Repository\RecordRepository;
use App\Repository\RecordICORepository;
use Doctrine\ORM\EntityManagerInterface;
use \DOMDocument;
use \SimpleXMLElement;

    
class DefaultController extends AbstractController
{
    
    /**
     * @Route("/{reactRouting}", name="home", defaults={"reactRouting": null})
     */
    public function index()
    {
        return $this->render('default/index.html.twig');
    }

   
    /**
    * @Route("/api/by_ico", methods="POST")
    */

    public function by_ico(Request $request,  RecordICORepository $recordICORepository, EntityManagerInterface $em)
    {
        $records = [];
        $parameters = json_decode($request->getContent(), true);
        $var        = $parameters['title'];
     
        
        $array = $recordICORepository->findBy(['ico'=> $var]);
        
        if(empty($array))   {       // Send and parse request

            $xml    = simplexml_load_file("http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico=".$var);
            $namespaces = $xml->getNamespaces(true);
            $body       = $xml->children( $namespaces['are'] )->Odpoved;

            $dtt        = $body->children( $namespaces['D'] );
            $meta = $dtt->VBAS;
        

            $recordIco = new RecordICO;
            $recordIco->setOf((string)$meta->OF);
            $recordIco->setDv((string)$meta->DV);
            $recordIco->setIco((int)$meta->ICO);
            
            $addr = (string)$meta->AD->UC.' '.(string)$meta->AD->PB;
            
            $recordIco->setAddress((string)$addr);
            $recordIco->setIco((int)$meta->ICO);
            
            $pf = (string)$meta->PF->KPF.' '.$meta->PF->NPF;
            
            $recordIco->setPf($pf);
            $recordIco->setTimeCreated(\DateTime::createFromFormat('Y-m-d', date('Y-m-d', time())));
                    
            $em->persist($recordIco);
            $em->flush();
        }

        $array = $recordICORepository->findBy(['ico'=> $var]);  // request to get id
        foreach ($array as $element) {
            array_push($records,   ['id'           => (int)$element->getId(),
                                    'ico'          => (string)$element->getIco(),
                                    'Pf'           => (string)$element->getPf(),
                                    'Obh_jmeno'    => (string)$element->getOf(),
                                    'PDph'         => (string)$element->getAddress(),
                                    ]);
        }
        
        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($records));
        
        return $response;
    }
    
    /**
    * @Route("/api/by_name", methods="POST")
    */
    public function by_name(Request $request,  RecordRepository $recordRepository, EntityManagerInterface $em)
    {

        $records = [];
        $parameters = json_decode($request->getContent(), true);
        $var        = $parameters['title'];
        
        $array = $recordRepository->findBy(['record_name'=> $var]);
        if(empty($array)){
            
            $xml = simplexml_load_file("http://wwwinfo.mfcr.cz/cgi-bin/ares/ares_es.cgi?obch_jm=".$var);
     
            $namespaces = $xml->getNamespaces(true);
            $body = $xml->children( $namespaces['are'] )->Odpoved;

            $dtt = $body->children( $namespaces['dtt'] );
            $metadataSections = $dtt->V->S;
            foreach( $metadataSections as $meta ) {
                    $record = new Record;
                    $record->setIco((int)$meta->ico);
                    $record->setPf((string)$meta->pf);
                    $record->setOjm((string)$meta->ojm);
                    $record->setJmn((string)$meta->jmn);
                    $record->setPDph($meta->p_dph);
                    $record->setDateCreated(\DateTime::createFromFormat('Y-m-d', date('Y-m-d', time())));
                    $record->setRecordName($var);

                    $em->persist($record);
                    $em->flush();
                    
            }
        }
        $array = $recordRepository->findBy(['record_name'=> $var]);
        foreach ($array as $element) {

            array_push($records,   ['id'           => $element->getId(),
                                    'ico'          => (string)$element->getIco(),
                                    'Pf'           => (string)$element->getPf(),
                                    'Obh_jmeno'    => (string)$element->getOjm(),
                                    'PDph'         => (string)$element->getPDph(),
                                    ]);
        }
        $response = new Response();

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        $response->setContent(json_encode($records));
        
        return $response;
    }
}
