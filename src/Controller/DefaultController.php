<?php

namespace App\Controller;

use A2lix\I18nDoctrineBundle\Annotation\I18nDoctrine;
use App\Entity\BlogPost;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/{_locale}", name="default", defaults={"_locale": "fr"})
     * @I18nDoctrine()
     */
    public function index(Request $request)
    {
        $posts = $this->getDoctrine()->getRepository(BlogPost::class)->findAll();
        var_dump($request->getLocale());
        return $this->render('base.html.twig', ['posts' => $posts]);
    }
}
