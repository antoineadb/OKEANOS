<?php

namespace App\Controller;

use App\Entity\FfessmLicence;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\FfessmLicenceRepository;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiRestController extends AbstractController
{
    /**
     * @Route("/apiGetLicenceFFESSM", name="api_get_licence_FFESSM", methods={"GET"})
     */
    public function getFFESSMLicence(FfessmLicenceRepository  $repo):JsonResponse
    {
        return  $this->json($repo->findAll(),200,[],['groups'=>'licence']);
    }

    /**
     * @Route("/apiPostLicenceFFESSM", name="api_post_licence_FFESSM", methods={"POST"})
     */
    public function postFFESSMLicence(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator  )
    {
        $jsonReceived = $request->getContent();
        try {
            $post = $serializer->deserialize($jsonReceived,FfessmLicence::class,'json');
            $errors = $validator->validate($post);
            if(count($errors)>0){
                return $this->json($errors,400);
            }

            $em->persist($post);
            $em->flush();
            return $this->json($post,'201',[], ['groups'=>'licence']);
        }catch (NotEncodableValueException $e){
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }

    }
}
