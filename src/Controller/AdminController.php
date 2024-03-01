<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/dashboard", name="admin_dashboard")
     */
    public function dashboard()
    {
        // Logique pour afficher le tableau de bord de l'administrateur
        return $this->render('admin/dashboard.html.twig');
    }

    /**
     * @Route("/admin/manage-users", name="admin_manage_users")
     */
    public function manageUsers()
    {
        // Logique pour afficher la liste des utilisateurs et gérer les opérations CRUD
        return $this->render('admin/manage_users.html.twig');
    }

    /**
     * @Route("/admin/edit-profile", name="admin_edit_profile")
     */
    public function editProfile(Request $request)
    {
        $admin = $this->getUser(); // Récupérer l'administrateur actuellement connecté

        $form = $this->createForm(AdminProfileType::class, $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrez les modifications dans la base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash('success', 'Your profile has been updated successfully.');

            return $this->redirectToRoute('admin_dashboard');
        }

        return $this->render('admin/edit_profile.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
