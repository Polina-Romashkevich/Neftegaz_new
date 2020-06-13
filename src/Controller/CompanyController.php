<?php

namespace App\Controller;

use App\Entity\Company;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CompanyController extends Controller
{
    /**
     * @Route("/company", name="companyJson")
     * @Method("GET")
     */
    public function index() //Возвращает все компании из бд в формате json
    {
        $repository = $this->getDoctrine()->getRepository(Company::class); //получает доступ к доктрине

        $companies = $repository->findAllCompanies();

        $response = new JsonResponse($companies);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);

        return $response;
    }

    /**
     * @Route("/company", name="company")
     * @Method("POST")
     */
    public function add(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();//получает доступ к доктрине

        $company = new Company();

        $company->setName($request->request->get("name"));
        $company->setLocation($request->request->get("location"));
        $company->setTaxpayerNum($request->request->get("taxpayer_num"));
        $company->setUnitNum($request->request->get("unit_num"));
        $company->setEmployeesNum($request->request->get("employees_num"));
        $company->setSortActivity($request->request->get("sort_activity"));
        $company->setInvestment($request->request->get("investment"));
        $company->setPatentNum($request->request->get("patent_num"));
        $company->setPatentApplicationNum($request->request->get("patent_application_num"));
        $company->setQuoteNum($request->request->get("quote_num"));
        $company->setResearchNum($request->request->get("research_num"));
        $company->setPublicationNum($request->request->get("publication_num"));
        $company->setNetProfit($request->request->get("net_profit"));
        $company->setIntangibleAsset($request->request->get("intangible_asset"));
        $company->setCostOilProduction($request->request->get("cost_oil_production"));
        $company->setOilProduction($request->request->get("oil_production"));
        $company->setPeriod($request->request->get("period"));

        $entityManager->persist($company);//отправляем данные в бд
        $entityManager->flush();

        return $this->render('message.html.twig', [ //название шаблона
            'alert' => 'success',//переменные передаем в шаблон
            'head' => 'Успешно!',
            'content' => 'Данные успешно добавлены'
        ]);
    }

    /**
     * @Route("/company/{id}", requirements={"id" = "\d+"})//регулярное выражение
     * @Method("DELETE")
     */
    public function delete(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $company = $this->getDoctrine()->getRepository(Company::class)->find($id);

        $response = new Response();

        if (!$company) {
            $response->setStatusCode(404);//не нашли компанию
            return $response;
        }

        $entityManager->remove($company);//удалить компанию из бд
        $entityManager->flush();

        return $response;
    }
}
