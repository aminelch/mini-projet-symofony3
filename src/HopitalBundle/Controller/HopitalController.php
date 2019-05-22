<?php

namespace HopitalBundle\Controller;
//On utilise l'entité Hopital 
use HopitalBundle\Entity\Hopital;
use HopitalBundle\Entity\Medecin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HopitalController extends Controller
{


    /**
     * @Route("/addHopital/{nom}/{type}/{adresse}")
     */
    public function addHopitalAction($nom, $type, $adresse = null)
    {
        // instanciation 
        $hopital = new Hopital();
        $hopital->setNomHopital($nom);
        $hopital->settypeHopital($type);
        $hopital->setAdresseHopital($adresse);

        $em = $this->getDoctrine()->getManager();
        $em->persist($hopital);
        $em->flush();
        return $this->render('HopitalBundle:Default:addhopital.html.twig', array(
            'hopital' => $hopital,
            'title' => 'Liste des hopitaux'
        ));
    }

    /**
     * @Route("/listehopitaux")
     */

    public function listeHopitauxAction()
    {
        $hopital = $this->getDoctrine()->getRepository("HopitalBundle:Hopital")->findAll();
        return $this->render('HopitalBundle:Default:listehopitaux.html.twig', array('hopital' => $hopital));
        // on efface le contenu des msg flash 
        $this->get('session')->getFlashBag()->clear();
    }
    /**
     * @Route("/ajouterhopital", name="ajouter hopital" )
     */
    public function ajouterHopitalAction(Request $request)
    {


        $hopital = new Hopital();
        //générer le formulaire
        $form = $this->createFormBuilder($hopital)
            ->add('nomHopital', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('typeHopital', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('adresseHopital', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('Ajouter', SubmitType::class, ['attr' => ['class' => 'form-control btn btn-success', 'style' => 'margin-top:20px;']])
            ->getForm();
        $form->handleRequest($request);
        //tester si le formuaire est valide
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hopital);
            $em->flush();
            // naamlo redirection lel action listeHopitauxAction 
            //eli heya bech trendu l vue mtaa liste hopitaux 
         
            return $this->redirect('listehopitaux');
            
        }

        return $this->render('HopitalBundle:Default:formhopital.html.twig', array('f' =>
        $form->createView()));
    }

    /**
     * @Route("listehopitaux/supprimer/{id}")
     */
    public function supprimerHopitalAction($id)
    {
         $id=intval($id);
        // $em = $this->getDoctrine()->getManager();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'DELETE HopitalBundle:Hopital hopital 
               WHERE hopital.id = :hopid'
        )
            ->setParameter("hopid", $id);

        $query->execute();
            // on stocke dans le ssession un clé "success" avec ce contenu 
        $this->addFlash('success', 'Suppression avec success');
            // on fait une redirection vers listehopitaux 
        return $this->redirect('/listehopitaux');
    }


 /**
     * @Route("listehopitaux/consulter/{id}")
     */
    public function consulterHopitalAction($id)
    {
         $id=intval($id);
   
    $repository = $this->getDoctrine()->getManager()
                ->getRepository('HopitalBundle:Hopital');

    $advert = $repository->find($id);
      //  var_dump($advert);
    return $this->render('HopitalBundle:Default:consulterhopital.html.twig', array('h' => $advert));

    }    



}
