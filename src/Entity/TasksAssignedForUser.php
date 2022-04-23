<?php

namespace App\Entity;

use App\Repository\TasksAssignedForUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TasksAssignedForUserRepository::class)]
class TasksAssignedForUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $task_subject;

    #[ORM\Column(type: 'integer')]
    private $id_of_user_who_created_the_task;

    #[ORM\Column(type: 'time')]
    private $time_spent_on_the_task;

    #[ORM\Column(type: 'datetime')]
    private $start_date_of_the_task;

    #[ORM\Column(type: 'datetime')]
    private $finish_date_of_the_task;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaskSubject(): ?string
    {
        return $this->task_subject;
    }

    public function setTaskSubject(string $task_subject): self
    {
        $this->task_subject = $task_subject;

        return $this;
    }

    public function getIdOfUserWhoCreatedTheTask(): ?int
    {
        return $this->id_of_user_who_created_the_task;
    }

    public function setIdOfUserWhoCreatedTheTask(int $id_of_user_who_created_the_task): self
    {
        $this->id_of_user_who_created_the_task = $id_of_user_who_created_the_task;

        return $this;
    }

    public function getTimeSpentOnTheTask(): ?\DateTimeInterface
    {
        return $this->time_spent_on_the_task;
    }

    public function setTimeSpentOnTheTask(\DateTimeInterface $time_spent_on_the_task): self
    {
        $this->time_spent_on_the_task = $time_spent_on_the_task;

        return $this;
    }

    public function getStartDateOfTheTask(): ?\DateTimeInterface
    {
        return $this->start_date_of_the_task;
    }

    public function setStartDateOfTheTask(\DateTimeInterface $start_date_of_the_task): self
    {
        $this->start_date_of_the_task = $start_date_of_the_task;

        return $this;
    }

    public function getFinishDateOfTheTask(): ?\DateTimeInterface
    {
        return $this->finish_date_of_the_task;
    }

    public function setFinishDateOfTheTask(\DateTimeInterface $finish_date_of_the_task): self
    {
        $this->finish_date_of_the_task = $finish_date_of_the_task;

        return $this;
    }
}
