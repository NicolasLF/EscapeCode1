<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SecretRepository")
 */
class Secret
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @var string
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassword(): ?int
    {
        $this->password;
        return $this;
    }

    public function setPassword(int $password): self
    {
        $this->password = $password;

        return $this;
    }
}
