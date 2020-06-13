<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeesRepository")
 */
class Employees
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name; // ФИО

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $post; // Должность

    /**
     * @ORM\Column(type="float")
     */
    private $financing; // Финансирование

    /**
     * @ORM\Column(type="integer")
     */
    private $patent_num; // Кол-во патентов

    /**
     * @ORM\Column(type="integer")
     */
    private $patent_application_num; // Кол-во заявок на патенты

    /**
     * @ORM\Column(type="integer")
     */
    private $research_num; // Количество исследований

    /**
     * @ORM\Column(type="integer")
     */
    private $publication_num; // Количество публикаций

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $period; // Период

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPost(): ?string
    {
        return $this->post;
    }

    public function setPost(string $post): self
    {
        $this->post = $post;
        return $this;
    }

    public function getFinancing(): ?float
    {
        return $this->financing;
    }

    public function setFinancing(float $financing): self
    {
        $this->financing = $financing;
        return $this;
    }

    public function getPatentNum(): ?int
    {
        return $this->patent_num;
    }

    public function setPatentNum(int $patent_num): self
    {
        $this->patent_num = $patent_num;
        return $this;
    }

    public function getPatentApplicationNum(): ?int
    {
        return $this->patent_application_num;
    }

    public function setPatentApplicationNum(int $patent_application_num): self
    {
        $this->patent_application_num = $patent_application_num;
        return $this;
    }

    public function getResearchNum(): ?int
    {
        return $this->research_num;
    }

    public function setResearchNum(int $research_num): self
    {
        $this->research_num = $research_num;
        return $this;
    }

    public function getPublicationNum(): ?int
    {
        return $this->publication_num;
    }

    public function setPublicationNum(int $publication_num): self
    {
        $this->publication_num = $publication_num;
        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): self
    {
        $this->period = $period;
        return $this;
    }
}
