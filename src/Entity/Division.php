<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DivisionRepository")
 */
class Division
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
    private $name; // Наименование

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location; // Адрес

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $taxpayer_num; // ИНН

    /**
     * @ORM\Column(type="integer")
     */
    private $employees_num; // Кол-во сотрудников

    /**
     * @ORM\Column(type="integer")
     */
    private $sort_activity; // Род деятельности

    /**
     * @ORM\Column(type="integer")
     */
    private $patent_num; // Кол-во патентов

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

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getTaxpayerNum(): ?string
    {
        return $this->taxpayer_num;
    }

    public function setTaxpayerNum(string $taxpayer_num): self
    {
        $this->taxpayer_num = $taxpayer_num;

        return $this;
    }

    public function getEmployeesNum(): ?int
    {
        return $this->employees_num;
    }

    public function setEmployeesNum(int $employees_num): self
    {
        $this->employees_num = $employees_num;

        return $this;
    }

    public function getSortActivity(): ?int
    {
        return $this->sort_activity;
    }

    public function setSortActivity(int $sort_activity): self
    {
        $this->sort_activity = $sort_activity;

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
