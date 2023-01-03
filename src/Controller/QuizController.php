<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Quiz;

class QuizController extends AbstractController
{
    #[Route('/quiz/{id}', name: 'app_quiz')]
    public function single(ManagerRegistry $doctrine,$id): Response
    {
        $quizRepository = $doctrine->getRepository(Quiz::class);
        $quiz = $quizRepository->find($id);

        return $this->render('quiz/index.html.twig', [
            'controller_name' => 'QuizController',
            'quiz' => $quiz
        ]);
    }

    // #[Route('/quizzes/{id}', name: 'quizzes_list')]
    // public function index(ManagerRegistry $doctrine,$id): Response
    // {
    //     $quizRepository = $doctrine->getRepository(Quiz::class);
    //     $quiz = $quizRepository->find($id);

    //     return $this->render('quiz/index.html.twig', [
    //         'controller_name' => 'QuizController',
    //         'quiz' => $quiz
    //     ]);
    // }
}
