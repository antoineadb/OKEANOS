<?php

namespace App\Controller;

use App\Repository\AccountRepository;
use App\Services\Tools;
use SebastianBergmann\LinesOfCode\IllogicalValuesException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Routing\Annotation\Route;


class ApiRestController extends AbstractController
{
    /**
     * @Route("/login", name="api_login", methods={"GET"})
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
            $mail = $parsed_json->{'mail'};
            $password = $parsed_json->{'password'};

            if ($mail == null || "" == $mail ) {
                throw new IllogicalValuesException("email is empty");
            }

            if ($password == null || "" == $password) {
                throw new IllogicalValuesException("password is empty");
            }

            $account = $repos->findBy(["mail" => $mail]);

            if ($account == null) {
                throw new IllogicalValuesException("account doesn't exist");
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
}
