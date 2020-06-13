<?php

namespace App\Controller;

use App\Entity\Division;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DivisionController extends Controller
{
    /**
     * @Route("/division", name="divisionJson")
     * @Method("GET")
     */
    public function index() //Возвращает все компании из бд в формате json
    {
        $repository = $this->getDoctrine()->getRepository(Division::class); //получает доступ к доктрине

        $division = $repository->findAllDivision();

        $response = new JsonResponse($division);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);

        return $response;
    }

    /**
     * @Route("/division", name="division")
     * @Method("POST")
     */
    public function add(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();//получает доступ к доктрине

        $division = new Division();

        $division->setName($request->request->get("name"));
        $division->setLocation($request->request->get("location"));
        $division->setTaxpayerNum($request->request->get("taxpayer_num"));
        $division->setEmployeesNum($request->request->get("employees_num"));
        $division->setSortActivity($request->request->get("sort_activity"));
        $division->setPatentNum($request->request->get("patent_num"));
        $division->setPeriod($request->request->get("period"));

        $entityManager->persist($division);//отправляем данные в бд
        $entityManager->flush();

        return $this->render('message.html.twig', [ //название шаблона
            'alert' => 'success',//переменные передаем в шаблон
            'head' => 'Успешно!',
            'content' => 'Данные успешно добавлены'
        ]);
    }

    /**
     * @Route("/division/{id}", requirements={"id" = "\d+"})//регулярное выражение
     * @Method("DELETE")
     */
    public function delete(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $division = $this->getDoctrine()->getRepository(Division::class)->find($id);

        $response = new Response();

        if (!$division) {
            $response->setStatusCode(404);//не нашли компанию
            return $response;
        }

        $entityManager->remove($division);//удалить компанию из бд
        $entityManager->flush();

        return $response;
    }
}
