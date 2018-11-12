<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CoreLoginsRepository")
 */
class CoreLogins
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="string", length=36)
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Core")
     */
    private $core;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $loginAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCore(): ?Core
    {
        return $this->core;
    }

    public function setCore(?Core $core): self
    {
        $this->core = $core;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getLoginAt(): ?\DateTimeInterface
    {
        return $this->loginAt;
    }

    public function setLoginAt(\DateTimeInterface $loginAt): self
    {
        $this->loginAt = $loginAt;

        return $this;
    }
}
