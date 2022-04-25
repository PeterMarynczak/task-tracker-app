<?php

namespace App\Controller;

use App\Entity\TasksAssignedForUser;
use App\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserTasksController extends AbstractController
{
    #[Route('/user_tasks', name: 'user_tasks')]
    public function index(): Response
    {
        return $this->render('user_tasks/index.html.twig');
    }

    #[Route('/task_create', name: 'task_create')]
    public function createTask(Request $request)
    {

        $userId = $this->getUser()->getId();
        
        $subjectOfTask = $request->request->get('task-subject');
        $amountOfTimeSpentOnTask = $request->request->get('amount_of_time');
        $currentDate = date('Y/m/d');

        $objectManager = $this->getDoctrine()->getManager();

        $taskCreatedByUser = new TasksAssignedForUser();
        $taskCreatedByUser->setIdOfUserWhoCreatedTheTask($userId);
        $taskCreatedByUser->setDateWhenTaskWasCreated($currentDate);
        $taskCreatedByUser->setTaskSubject($subjectOfTask);
        $taskCreatedByUser->setTimeSpentOnTheTask($amountOfTimeSpentOnTask);

        $objectManager->persist($taskCreatedByUser);
        $objectManager->flush();

        $this->addFlash('success', 'Praca została zapisana pomyślnie');

        return $this->redirectToRoute('user_tasks');
        return new RedirectResponse($this->urlGenerator->generate('user_tasks'));
    }

}
