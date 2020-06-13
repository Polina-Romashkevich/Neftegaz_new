<?php

namespace App\Controller;

use App\Entity\CoeffFive;
use App\Entity\CoeffFour;
use App\Entity\CoeffOne;
use App\Entity\CoeffThree;
use App\Entity\CoeffTwo;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class CoefficientController extends Controller
{

    /**
     * @Route("/coefficient")
     * @Method("POST")
     * @Security("has_role('ROLE_USER')")
     */
    public function add(Request $request)
    {
        $company = $request->request->get("company");
        $select_coeff = $request->request->get("coefficient");
        $index_1 = $request->request->get("index_1");
        $index_2 = $request->request->get("index_2");
        $period = $request->request->get("period");

        $coeff_value = $index_1 / $index_2;

        $coeff = null;

        switch ($select_coeff)
        {
            case "1":
                $coeffClass = CoeffOne::class;
                break;
            case "2":
                $coeffClass = CoeffTwo::class;
                break;
            case "3":
                $coeffClass = CoeffThree::class;
                break;
            case "4":
                $coeffClass = CoeffFour::class;
                break;
            case "5":
                $coeffClass = CoeffFive::class;
                break;
        }

        $entityManager = $this->getDoctrine()->getManager();//менеджер, который будет работать с доктриной

        $coeff = new $coeffClass;

        $coeff->setCompanyName($company);
        $coeff->setCoeffValue(round($coeff_value,3));
        $coeff->setPeriod($period);

        $entityManager->persist($coeff); // заносим в базу данных
        $entityManager->flush(); //

        return $this->render('message.html.twig', [ //название шаблона
            'alert' => 'success', //данные передаем в шаблон
            'head' => 'Успешно!',
            'content' => 'Данные успешно добавлены'
        ]);
    }

    /**
     * @Route("/coefficient/{id}", requirements={"id" = "[1-5]"})
     * @Method("GET")
     */
    public function getAll(Request $request, $id)
    {
        $coeffClass = null;

        switch ($id)
        {
            case "1":
                $coeffClass = CoeffOne::class;
                break;
            case "2":
                $coeffClass = CoeffTwo::class;
                break;
            case "3":
                $coeffClass = CoeffThree::class;
                break;
            case "4":
                $coeffClass = CoeffFour::class;
                break;
            case "5":
                $coeffClass = CoeffFive::class;
                break;
        }

        $repository = $this->getDoctrine()->getRepository($coeffClass);

        $coefficients = [
            //"data" => $repository->findAllCoeff()
        ];

        $coefficients = $repository->findAllCoeff();

        $response = new JsonResponse($coefficients);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);

        return $response;
    }


    /**
     * @Route("/coefficient/{coeff}/{id}", requirements={"coeff" = "[1-5]", "id" = "\d+"})
     * @Method("DELETE")
     */
    public function delCoeff($coeff, $id)
    {
        $response = new Response();

        switch ($coeff)
        {
            case "1":
                $coeffClass = CoeffOne::class;
                break;
            case "2":
                $coeffClass = CoeffTwo::class;
                break;
            case "3":
                $coeffClass = CoeffThree::class;
                break;
            case "4":
                $coeffClass = CoeffFour::class;
                break;
            case "5":
                $coeffClass = CoeffFive::class;
                break;
        }

        $entityManager = $this->getDoctrine()->getManager();
        $coefficient = $this->getDoctrine()->getRepository($coeffClass)->find($id);

        if (!$coefficient) {
            $response->setStatusCode(404); //не нашли коэффициент
            return $response;
        }

        $entityManager->remove($coefficient); //удаление коэффициента из базы данных
        $entityManager->flush();

        return $response;
    }
}
