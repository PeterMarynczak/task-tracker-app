<?php

namespace App\Controller;

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

    public function createTask(Request $request)
    {
        //$taskCreatedByUser = new TasksAssignedForUser();
        //$taskCreatedByUser->setTaskSubject('Adding Login option to website');
        //$taskCreatedByUser->setStartDateOfTheTask();
        //$taskCreatedByUser->setFinishDateOfTheTask();
    }
}
