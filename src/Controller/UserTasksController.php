<?php

namespace App\Controller;

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

        $user_id = $this->getUser();
        dump($user_id);
        //$taskCreatedByUser = new TasksAssignedForUser();
        //$taskCreatedByUser->setTaskSubject('Adding Login option to website');
        //$taskCreatedByUser->setStartDateOfTheTask();
        //$taskCreatedByUser->setFinishDateOfTheTask();
    }
}
