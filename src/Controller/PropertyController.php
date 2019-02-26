<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;

class PropertyController extends AbstractController
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
     * @Route("/property", name = "property")
     * @return Response
     */

    public function index() : Response
    {
        $property = $this->repository->find(1);
        $property->setSold(false);
        $this->entityManager->flush();
        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'
        ]);
    }

    /**
     * @Route("/bien/{slug}-{id}", requirements={"slug": "[a-z0-9\-]*"}, name="property.show")
     *@param Property
     * @return Response
     */

     public function show(Property $property, string $slug): Response
     {
         if ($property->getSlug() !== $slug)
         {
             return $this->redirectToRoute('property.show', [
                 'id' => $property->getId(),
                 'slug' => $property->getSlug()
             ], 301);
         }
        return $this->render('property/show.html.twig', [
            'property' => $property,
            'current_menu' => 'properties'
        ]);
     }
}
?>