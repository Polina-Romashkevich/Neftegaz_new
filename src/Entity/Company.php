<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 */
class Company
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
    private $unit_num; // Кол-во подразделений

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
    private $investment; // Инвестиции в НИОКР

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
    private $quote_num; // Кол-во цитат на 1 патент

    /**
     * @ORM\Column(type="integer")
     */
    private $research_num; // Количество исследований

    /**
     * @ORM\Column(type="integer")
     */
    private $publication_num; // Количество публикаций

    /**
     * @ORM\Column(type="float")
     */
    private $net_profit; // Чистая прибыль

    /**
     * @ORM\Column(type="float")
     */
    private $intangible_asset; // Нематериальные активы

    /**
     * @ORM\Column(type="float")
     */
    private $cost_oil_production; // Себестоимость добычи нефти

    /**
     * @ORM\Column(type="float")
     */
    private $oil_production; // Добыча нефти

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

    public function getUnitNum(): ?int
    {
        return $this->unit_num;
    }

    public function setUnitNum(int $unit_num): self
    {
        $this->unit_num = $unit_num;

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

    public function getInvestment(): ?int
    {
        return $this->investment;
    }

    public function setInvestment(int $investment): self
    {
        $this->investment = $investment;

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

    public function getQuoteNum(): ?int
    {
        return $this->quote_num;
    }

    public function setQuoteNum(int $quote_num): self
    {
        $this->quote_num = $quote_num;

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

    public function getNetProfit(): ?int
    {
        return $this->net_profit;
    }

    public function setNetProfit(int $net_profit): self
    {
        $this->net_profit = $net_profit;

        return $this;
    }

    public function getIntangibleAsset(): ?int
    {
        return $this->intangible_asset;
    }

    public function setIntangibleAsset(int $intangible_asset): self
    {
        $this->intangible_asset = $intangible_asset;

        return $this;
    }

    public function getCostOilProduction(): ?int
    {
        return $this->cost_oil_production;
    }

    public function setCostOilProduction(int $cost_oil_production): self
    {
        $this->cost_oil_production = $cost_oil_production;

        return $this;
    }

    public function getOilProduction(): ?float
    {
        return $this->oil_production;
    }

    public function setOilProduction(float $oil_production): self
    {
        $this->oil_production = $oil_production;

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
