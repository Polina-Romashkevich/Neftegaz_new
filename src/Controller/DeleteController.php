<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeleteController extends Controller
{
    /**
 * @Route("/delete/company", name="deleteCompany")
 * @Method("GET")
 */
    public function delCompany() //удаляем компанию из таблицы страницы (отображение)
    {
        return $this->render('delete/company.html.twig', [ //шаблон для удаления компании

        ]);
    }

    /**
     * @Route("/delete/division", name="deleteDivision")
     * @Method("GET")
     */
    public function delDivisionCompany() //удаляем компанию из таблицы страницы (отображение)
    {
        return $this->render('delete/division.html.twig', [ //шаблон для удаления компании

        ]);
    }

    /**
     * @Route("/delete/employees", name="deleteEmployees")
     * @Method("GET")
     */
    public function delEmployees() //удаляем сотрудника из таблицы страницы (отображение)
    {
        return $this->render('delete/employees.html.twig', [ //шаблон для удаления компании

        ]);
    }

}
