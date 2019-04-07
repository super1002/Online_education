<?php

namespace App\Controller;

use App\Course\Repository\CourseRepositoryInterface;
use App\Course\Service\CoursePresentationServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Mariia Tarantsova <yashuk803@gmail.com>
 */
class DefaultController extends AbstractController
{
    private $coursePresentation;

    public function __construct(CoursePresentationServiceInterface $coursePresentation)
    {
        $this->coursePresentation = $coursePresentation;
    }

    /**
     * Renders site home page.
     *
     * @Route("/", name="index")
     *
     * @return Response
     */
    public function index(): Response
    {
        $courses = $this->coursePresentation->getLastFiveCourses();


        return $this->render('default/index.html.twig', [
                'courses' => $courses,
            ]);
    }
}
