<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=Lesson::class, mappedBy="category")
     */
    private $lessons;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="Categories")
     */
    private $categories;

    public function __construct()
    {
        $this->lessons = new ArrayCollection();
        $this->Categories = new ArrayCollection();
    }

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

    /**
     * @return Collection|Lesson[]
     */
    public function getLessons(): Collection
    {
        return $this->lessons;
    }

    public function addLesson(Lesson $lesson): self
    {
        if (!$this->lessons->contains($lesson)) {
            $this->lessons[] = $lesson;
            $lesson->setCategory($this);
        }

        return $this;
    }

    public function removeLesson(Lesson $lesson): self
    {
        if ($this->lessons->removeElement($lesson)) {
            // set the owning side to null (unless already changed)
            if ($lesson->getCategory() === $this) {
                $lesson->setCategory(null);
            }
        }

        return $this;
    }

    public function getCategories(): ?self
    {
        return $this->categories;
    }

    public function setCategories(?self $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function addCategory(self $category): self
    {
        if (!$this->Categories->contains($category)) {
            $this->Categories[] = $category;
            $category->setCategories($this);
        }

        return $this;
    }

    public function removeCategory(self $category): self
    {
        if ($this->Categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getCategories() === $this) {
                $category->setCategories(null);
            }
        }

        return $this;
    }
}
