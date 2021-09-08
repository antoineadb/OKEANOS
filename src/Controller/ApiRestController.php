<?php

namespace App\Controller;

use App\Repository\AccountRepository;
use App\Services\Tools;
use Doctrine\ORM\EntityManagerInterface;
use SebastianBergmann\LinesOfCode\IllogicalValuesException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Routing\Annotation\Route;


class ApiRestController extends AbstractController
{
    /**
     * @Route("/login1", name="api_login", methods={"GET"})
     */
    public function loginAccount(Request $request, AccountRepository  $repos)
    {

        if(!Tools::isJson($request->getContent())){
            return $this->json([
                'status' => 401,
                'message' => 'Le fichier json est invalide'
            ], 401);
        }

        try {
            $parsed_json = json_decode($request->getContent());
            $mail = $parsed_json->{'username'};
            $password = $parsed_json->{'password'};

            if ($mail == null || "" == $mail ) {
                return $this->json([
                    'status' => 401,
                    'message' => "L'email n'est pas renseigné"
                ], 401);
            }

            if ($password == null || "" == $password) {
                return $this->json([
                    'status' => 401,
                    'message' => "Le mot de passe n'est pas renseigné"
                ], 401);
            }

            $account = $repos->findBy(["mail" => $mail]);

            if ($account == null) {
                return $this->json([
                    'status' => 401,
                    'message' => "Le compte n'existe pas"
                ], 401);
            }
            $hashedPass = Tools::hash($account[0]->getSalt() . Tools::hash($mail.$password));
                if ($hashedPass !== $account[0]->getPassword()) {
                    return $this->json([
                        'status' => 401,
                        'message' => 'Le mot de passe est invalide'
                    ], 401);

                } else{
                    return $this->json([
                        'status' => 200,
                        'value' => $account[0],
                        'login' => 'logged'
                    ], 200);
                }
        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * @Route("/updatePassword", name="update_password", methods={"PATCH"})
     */
    public function updatePassword(Request $request, AccountRepository  $repos, EntityManagerInterface $em)
    {
        if (!Tools::isJson($request->getContent())) {
            return $this->json([
                'status' => 401,
                'message' => 'Le fichier json est invalide'
            ], 401);
        }

        $parsed_json = json_decode($request->getContent());
        $mail = $parsed_json->{'mail'};
        $password = $parsed_json->{'password'};

        if ($password == null || "" == $password) {
            return $this->json([
                'status' => 401,
                'message' => "Le mot de passe n'est pas renseigné"
            ], 401);
        }

        if ($mail == null || "" == $mail ) {
            return $this->json([
                'status' => 401,
                'message' => "L'email n'est pas renseigné"
            ], 401);
        }

        $salt = Tools::generateSalt();

        $a_account = $repos->findBy(["mail" => $mail]);
        if ($a_account == null) {
            return $this->json([
                'status' => 401,
                'message' => "Le compte n'existe pas"
            ], 401);
        }
        $account = $a_account[0];
        $account->setSalt($salt);
        $account->setPassword(Tools::hash($salt.Tools::hash($mail.$password)));

        $em->persist($account);
        $em->flush();

        return $this->json([
            'status' => 200,
            'message' => "Le mot de passe a été mise à jour"
        ], 200);
    }
}