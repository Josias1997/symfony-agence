<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PropertyRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Property;
use App\Form\PropertyType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;


class AdminPropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */

    private $repository;

    /**
     * @var ObjectManager
     */

     private $entityManager;

    public function __construct(PropertyRepository $repository, ObjectManager $entityManager)
    {
        $this->repository = $repository; 
        $this->entityManager = $entityManager;  
    }

    /**
     * @Route("/admin", name="admin.property.index")
     * @return Response
     */

    public function index()
    {
        $properties = $this->repository->findAll();

        return $this->render('admin/property/index.html.twig', compact('properties'));
    }

    /**
     * @Route("/admin/property/edit/{id}", name="admin.property.edit", methods={"GET", "POST"})
     * @param Property
     * @param Request
     * @return Response
     */

    public function edit(Property $property, Request $request)
    {
        $form = $this->createForm(PropertyType::class, $property);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->entityManager->flush();
            $this->addFlash('success', 'Bien modifié avec succès');

            return $this->redirectToRoute('admin.property.index');
        }
        return $this->render('admin/property/edit.html.twig', [
            'property' => $property,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/create", name = "admin.property.create")
     * @param Request
     * @return Response
     */

    public function new(Request $request)
    {
        $property = new Property();
        $form = $this->createForm(PropertyType::class, $property);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->entityManager->persist($property);
            $this->entityManager->flush();
            $this->addFlash('success', 'Bien Ajouté avec succès');

            return $this->redirectToRoute('admin.property.index');
        }
        return $this->render('admin/property/new.html.twig', [
            'property' => $property,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/delete/{id}", name="admin.property.delete", methods="DELETE")
     * @param Property
     * @return Response
     */
    public function delete(Property $property, Request $request)
    {
        if($this->isCsrfTokenValid('delete'.$property->getId(), $request->get('_token')));
        $this->entityManager->remove($property);
        $this->entityManager->flush();
        $this->addFlash('success', 'Bien supprimé avec succès');
        return $this->redirectToRoute('admin.property.index');
    }

}
?>