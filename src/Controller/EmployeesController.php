<?php

namespace App\Controller;

use App\Entity\Employees;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmployeesController extends Controller
{
    /**
     * @Route("/employees", name="employeesJson")
     * @Method("GET")
     */
    public function index() //Возвращает все компании из бд в формате json
    {
        $repository = $this->getDoctrine()->getRepository(Employees::class); //получает доступ к доктрине

        $employees = $repository->findAllEmployees();

        $response = new JsonResponse($employees);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);

        return $response;
    }

    /**
     * @Route("/employees", name="employees")
     * @Method("POST")
     */
    public function add(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();//получает доступ к доктрине

        $employees = new Employees();

        $employees->setName($request->request->get("name"));
        $employees->setPost($request->request->get("post"));
        $employees->setFinancing($request->request->get("financing"));
        $employees->setPatentNum($request->request->get("patent_num"));
        $employees->setPatentApplicationNum($request->request->get("patent_application_num"));
        $employees->setResearchNum($request->request->get("research_num"));
        $employees->setPublicationNum($request->request->get("publication_num"));
        $employees->setPeriod($request->request->get("period"));



        $entityManager->persist($employees);//отправляем данные в бд
        $entityManager->flush();

        return $this->render('message.html.twig', [ //название шаблона
            'alert' => 'success',//переменные передаем в шаблон
            'head' => 'Успешно!',
            'content' => 'Данные успешно добавлены'
        ]);
    }

    /**
     * @Route("/employees/{id}", requirements={"id" = "\d+"})//регулярное выражение
     * @Method("DELETE")
     */
    public function delete(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $employees = $this->getDoctrine()->getRepository(Employees::class)->find($id);

        $response = new Response();

        if (!$employees) {
            $response->setStatusCode(404);//не нашли компанию
            return $response;
        }

        $entityManager->remove($employees);//удалить сотрудника из бд
        $entityManager->flush();

        return $response;
    }
}
