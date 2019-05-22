<?php
namespace HopitalBundle\Controller;

// use HopitalBundle\Entity;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use HopitalBundle\Entity\Hopital ;
use HopitalBundle\Entity\Medecin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class MedecinController extends Controller
{
 

      
    /**
     * @Route("listemedecins/consulter/{id}")
     */
    public function ConsulterMedecinAction($id)
    {
        $id=intval($id);
        $repository =$this->getDoctrine()->getRepository("HopitalBundle:Medecin");
        $medecin = $repository->find($id);
        return $this->render('HopitalBundle:medecinViews:consultermedecin.html.twig', array('medecin' => $medecin));
    }
  
      
    /**
     * @Route("/listemedecins")
     */

    public function listeMedecinsAction()
    {
        $medecin = $this->getDoctrine()->getRepository("HopitalBundle:Medecin")->findAll();
        return $this->render('HopitalBundle:medecinViews:listemedecins.html.twig', array('medecin' => $medecin));
        // on efface le contenu des msg flash 
        $this->get('session')->getFlashBag()->clear();
    }



     /**
     * @Route("listemedecins/supprimer/{id}")
     */
    public function supprimerMedecinAction($id)
    {
         $id=intval($id);
        // $em = $this->getDoctrine()->getManager();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'DELETE HopitalBundle:Medecin medecin 
            WHERE medecin.id = :id'
        )
            ->setParameter("id", $id);

        $query->execute();
            // on stocke dans le ssession un clé "success" avec ce contenu 
        $this->addFlash('success', 'Suppression avec success');
            // on fait une redirection vers listemedecins 
        return $this->redirect('/listemedecins');
    }




    /**
     * @Route("/ajoutermedecin", name="ajouter medecin" )
     */
    public function ajouterMedecinAction(Request $request)
    {


        $medecin = new Medecin();
        //générer le formulaire
        $form = $this->createFormBuilder($medecin)
            ->add('nom', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('prenom', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('profession', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('experience', TextType::class, ['attr' => ['class' => 'form-control']])
            // ->add('experience', IntegerType::class, ['attr' => [
            //     'class' => 'form-control',
            //     'step' => 1,
            //     // 'min' => 1,
            //     // 'max' => 10,
            //     // 'max' => 0,
            // 'maxlength'=>2,
            //     'required' => true,
            //   ]])

            ->add('Hopital',EntityType::class,array (
                'class' => 'HopitalBundle:Hopital',
                'choice_label' => 'nomHopital',
                'choice_value' =>'id')
                )

            ->add('dateEmbauche',DateType::class, ['attr' =>
             ['class' => 'form-control']
             ])

            ->add('Ajouter', SubmitType::class, ['attr' => ['class' => 'form-control btn btn-success', 'style' => 'margin-top:20px;']])
            ->getForm();
        $form->handleRequest($request);
        //tester si le formuaire est valide
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medecin);
            $em->flush();
            // naamlo redirection lel action listeHopitauxAction 
            //eli heya bech trendu l vue mtaa liste hopitaux 
         
            return $this->redirect('listemedecins');
            
        }

        return $this->render('HopitalBundle:medecinViews:formmedecin.html.twig', array('f' =>
        $form->createView()));
    }

}
