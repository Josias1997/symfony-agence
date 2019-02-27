<?php

namespace App\Controller\Admin;

use App\Entity\MyOption;
use App\Form\MyOptionType;
use App\Repository\MyOptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/option")
 */
class AdminMyOptionController extends AbstractController
{
    /**
     * @Route("/", name="my_option_index", methods={"GET"})
     */
    public function index(MyOptionRepository $myOptionRepository): Response
    {
        return $this->render('admin/my_option/index.html.twig', [
            'my_options' => $myOptionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="my_option_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $myOption = new MyOption();
        $form = $this->createForm(MyOptionType::class, $myOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($myOption);
            $entityManager->flush();

            return $this->redirectToRoute('my_option_index');
        }

        return $this->render('admin/my_option/new.html.twig', [
            'my_option' => $myOption,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="my_option_show", methods={"GET"})
     */
    public function show(MyOption $myOption): Response
    {
        return $this->render('admin/my_option/show.html.twig', [
            'my_option' => $myOption,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="my_option_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MyOption $myOption): Response
    {
        $form = $this->createForm(MyOptionType::class, $myOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('my_option_index', [
                'id' => $myOption->getId(),
            ]);
        }

        return $this->render('admin/my_option/edit.html.twig', [
            'my_option' => $myOption,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="my_option_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MyOption $myOption): Response
    {
        if ($this->isCsrfTokenValid('delete'.$myOption->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($myOption);
            $entityManager->flush();
        }

        return $this->redirectToRoute('my_option_index');
    }
}
