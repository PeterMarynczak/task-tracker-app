<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $username;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, TasksAssignedForUser>
     */
    public function getTaskAssignedForUser(): Collection
    {
        return $this->taskAssignedForUser;
    }

    public function addTaskAssignedForUser(TasksAssignedForUser $taskAssignedForUser): self
    {
        if (!$this->taskAssignedForUser->contains($taskAssignedForUser)) {
            $this->taskAssignedForUser[] = $taskAssignedForUser;
            $taskAssignedForUser->setRelation($this);
        }

        return $this;
    }

    public function removeTaskAssignedForUser(TasksAssignedForUser $taskAssignedForUser): self
    {
        if ($this->taskAssignedForUser->removeElement($taskAssignedForUser)) {
            // set the owning side to null (unless already changed)
            if ($taskAssignedForUser->getRelation() === $this) {
                $taskAssignedForUser->setRelation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TasksAssignedForUser>
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(TasksAssignedForUser $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->setIdOfUserWhoCreatedTask($this);
        }

        return $this;
    }

    public function removeTask(TasksAssignedForUser $task): self
    {
        if ($this->tasks->removeElement($task)) {
            // set the owning side to null (unless already changed)
            if ($task->getIdOfUserWhoCreatedTask() === $this) {
                $task->setIdOfUserWhoCreatedTask(null);
            }
        }

        return $this;
    }

}