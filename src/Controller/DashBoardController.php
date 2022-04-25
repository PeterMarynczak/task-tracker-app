<?php

namespace App\Controller;

use App\Repository\TasksAssignedForUserRepository;
use App\Entity\TasksAssignedForUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashBoardController extends AbstractController
{
    #[Route('dash_board', name: 'dash_board')]
    public function index(TasksAssignedForUserRepository $tasksAssignedForUserRepository): Response
    {
        $listOfTasksAssignedForUser = $tasksAssignedForUserRepository->findBy(
            ['id_of_user_who_created_the_task' => $this->getUser()->getId()]
        );

        return $this->render('dash_board/index.html.twig', [
            'listOfTasksAssignedForUser' => $listOfTasksAssignedForUser
        ]);
    }
}
