<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Nullable;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $catchPhrase = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[Assert\Image(
        maxSize: "1024k"
    )]
    private $posterFile;

    #[ORM\Column(nullable:true)]
    private array $relatedSubjects = [];

    #[ORM\Column(length: 255)]
    private ?string $chapo = null;

    #[ORM\Column(length: 255)]
    private ?string $legendMainPicture = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $authorWebsite = null;

    #[ORM\Column(nullable:true)]
    private ?int $relatedCourse = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }


    public function getPosterFile(): ?UploadedFile
    {
        return $this->posterFile;
    }

    public function setPosterFile(UploadedFile $posterFile): self
    {
        $this->posterFile = $posterFile;

        return $this;
    }

    public function getCatchPhrase(): ?string
    {
        return $this->catchPhrase;
    }

    public function setCatchPhrase(string $catchPhrase): self
    {
        $this->catchPhrase = $catchPhrase;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getRelatedSubjects(): array
    {
        return $this->relatedSubjects;
    }

    public function setRelatedSubjects(array $relatedSubjects): self
    {
        $this->relatedSubjects = $relatedSubjects;

        return $this;
    }

    public function getChapo(): ?string
    {
        return $this->chapo;
    }

    public function setChapo(string $chapo): self
    {
        $this->chapo = $chapo;

        return $this;
    }

    public function getLegendMainPicture(): ?string
    {
        return $this->legendMainPicture;
    }

    public function setLegendMainPicture(string $legendMainPicture): self
    {
        $this->legendMainPicture = $legendMainPicture;

        return $this;
    }

    public function getAuthorWebsite(): ?string
    {
        return $this->authorWebsite;
    }

    public function setAuthorWebsite(string $authorWebsite): self
    {
        $this->authorWebsite = $authorWebsite;

        return $this;
    }

    public function getRelatedCourse(): ?int
    {
        return $this->relatedCourse;
    }

    public function setRelatedCourse(int $relatedCourse): self
    {
        $this->relatedCourse = $relatedCourse;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
