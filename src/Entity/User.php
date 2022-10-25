<?php

namespace Melhore\Client\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'user')]
class User
{
    #[Id, GeneratedValue, Column(type: Types::INTEGER)]
    private int $id;

    #[Column(name: 'user_name')]
    private string $userName;

    #[Column]
    private string $password;
    
    #[Column(name: 'access_mode')]
    private string $accessMode;
    
    #[column(nullable:true)]
    private string $photo;
    
    #[column(nullable:true)]
    private string $email;

    #[OneToMany(mappedBy: "user", targetEntity: VideoHighlight::class, cascade: ["persist", "remove"])]
    private Collection $videosHighlight;

    #[OneToMany(mappedBy: "user", targetEntity: VideoWhatDo::class, cascade: ["persist", "remove"])]
    private Collection $videosWhatDo;
    
    #[OneToMany(mappedBy: "user", targetEntity: VideoHowDo::class, cascade: ["persist", "remove"])]
    private Collection $videosHowDo;
    
    #[OneToMany(mappedBy: "user", targetEntity: VideoTeam::class, cascade: ["persist", "remove"])]
    private Collection $videosTeam;

    #[OneToMany(mappedBy: "user", targetEntity: Metric::class, cascade: ["persist", "remove"])]
    private Collection $metrics;

    #[OneToMany(mappedBy: "user", targetEntity: Diagnostic::class, cascade: ["persist", "remove"])]
    private Collection $diagnostics;



    public function __construct()
    {
        $this->videosHighlight = new ArrayCollection();
        $this->videosWhatDo = new ArrayCollection();
        $this->videosHowDo = new ArrayCollection();
        $this->videosTeam = new ArrayCollection();
        $this->metrics = new ArrayCollection();
        $this->diagnostics = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName)
    {
        $this->userName = $userName;
    }

    public function getEmail()
    {
        if(!isset($this->email)) {
            return null;
        }
        
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getPhotoName():string
    {
        return $this->photo;
    }

    public function setPhotoName(string $photoName): void
    {
        $this->photo = $photoName;
    }

    public function uploadPhoto(array $file)
    {
        move_uploaded_file($file['tmp_name'], 'assets/img/' . $file['name']);
    }

    public function getAccessMode(): string
    {
        return $this->accessMode;
    }

    public function setAccessMode(string $accessMode)
    {
        $this->accessMode = $accessMode;
    }

    public function passwordAuthenticate(string $noCryptPass): bool
    {
        return password_verify($noCryptPass, $this->password);
    }

    public function tokenAdmin(): bool
    {
        return $this->accessMode === 'ADMIN' ? true : false;
    }

    public function videosHighlight(): Collection
    {
        return $this->videosHighlight;
    }

    public function videosWhatDo(): Collection
    {
        return $this->videosWhatDo;
    }

    public function videosHowDo(): Collection
    {
        return $this->videosHowDo;
    }

    public function videosTeam(): Collection
    {
        return $this->videosTeam;
    }

    public function metrics(): Collection
    {
        return $this->metrics;
    }

    public function diagnostics(): Collection
    {
        return $this->diagnostics;
    }
}