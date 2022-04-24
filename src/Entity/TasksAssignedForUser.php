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

    #[ORM\Column(type: 'text')]
    private $task_subject;

    #[ORM\Column(type: 'integer')]
    private $id_of_user_who_created_the_task;

    #[ORM\Column(type: 'string', length: 20)]
    private $time_spent_on_the_task;

    #[ORM\Column(type: 'string', length: 20)]
    private $date_when_task_was_created;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'tasksAssignedForUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

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

    public function getTimeSpentOnTheTask(): ?string
    {
        return $this->time_spent_on_the_task;
    }

    public function setTimeSpentOnTheTask(string $time_spent_on_the_task): self
    {
        $this->time_spent_on_the_task = $time_spent_on_the_task;

        return $this;
    }

    public function getDateWhenTaskWasCreated(): ?string
    {
        return $this->date_when_task_was_created;
    }

    public function setDateWhenTaskWasCreated(string $date_when_task_was_created): self
    {
        $this->date_when_task_was_created = $date_when_task_was_created;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
