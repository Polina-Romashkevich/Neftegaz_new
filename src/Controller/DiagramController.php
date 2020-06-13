<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

class DiagramController extends Controller
{
    /**
     * @Route("/diagram/histogram", name="histogram")
     * @Method("POST")
     * @Security("has_role('ROLE_USER')")
     */
    public function indexHistogram(Request $request) //столбчатая
    {
       $coeff = $request->request->get("buildGraphForm"); //передаем значения коэффициентов

        if ($coeff == "co") //отображаем диаграмму для компании (из формы Select)
        {
            return $this->render('diagram/company.html.twig', [
                'diagram' => 'diagramHistogram',
            ]);
        }

        if ($coeff == "po") //отображаем диаграмму для подразделения (из формы Select)
        {
            return $this->render('diagram/division.html.twig', [
                'diagram' => 'diagramHistogram',
            ]);
        }

        if ($coeff == "so") //отображаем диаграмму для сотрудников (из формы Select)
        {
            return $this->render('diagram/employees.html.twig', [
                'diagram' => 'diagramHistogram',
            ]);
        }

        return $this->render('diagram/index.html.twig', [
            'coeff' => $coeff,
            'diagram' => 'diagramHistogram',
            'data' => 2,
            'label' => 1
        ]);

    }

    /**
     * @Route("/diagram/pie", name="pie")
     * @Method("POST")
     * @Security("has_role('ROLE_USER')")
     */
    public function indexPie(Request $request) //круговая
    {
        $coeff = $request->request->get("buildGraphForm");

        if ($coeff == "co") //отображаем диаграмму для компании (из формы Select)
        {
            return $this->render('diagram/company.html.twig', [
                'diagram' => 'diagramPieChart',
            ]);
        }

        if ($coeff == "po") //отображаем диаграмму для подразделения (из формы Select)
        {
            return $this->render('diagram/division.html.twig', [
                'diagram' => 'diagramPieChart',
            ]);
        }

        if ($coeff == "so") //отображаем диаграмму для сотрудников (из формы Select)
        {
            return $this->render('diagram/employees.html.twig', [
                'diagram' => 'diagramPieChart',
            ]);
        }

        return $this->render('diagram/index.html.twig', [
            'coeff' => $coeff,
            'diagram' => 'diagramPieChart',
            'data' => 2,
            'label' => 1
        ]);
    }

    /**
     * @Route("/diagram/line", name="line")
     * @Method("POST")
     * @Security("has_role('ROLE_USER')")
     */
    public function indexLine(Request $request) //линейная
    {
        $coeff = $request->request->get("buildGraphForm");

        if ($coeff == "co") //отображаем диаграмму для компании (из формы Select)
        {
            return $this->render('diagram/company.html.twig', [
                'diagram' => 'diagramLineChart',
            ]);
        }

        if ($coeff == "po") //отображаем диаграмму для подразделения (из формы Select)
        {
            return $this->render('diagram/division.html.twig', [
                'diagram' => 'diagramLineChart',
            ]);
        }

        if ($coeff == "so") //отображаем диаграмму для сотрудников (из формы Select)
        {
            return $this->render('diagram/employees.html.twig', [
                'diagram' => 'diagramLineChart',
            ]);
        }

        return $this->render('diagram/index.html.twig', [
            'coeff' => $coeff,
            'diagram' => 'diagramLineChart',
            'data' => 2,
            'label' => 1
        ]);
    }
}
