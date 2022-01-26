<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MarkdownHelper;


class QuestionController extends AbstractController {
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(MarkdownHelper $helper) {

        $parsedQuestionText = $helper->parse("I've been turned into a cat, any thoughts on how to turn back? While I'm **adorable**, I don't really care for cat food.");

        $question0 = new \stdClass();
        $question0->id = 0;
        $question0->slug = 'reverse-a-spell';
        $question0->title = 'Reversing a Spell';
        $question0->description = $parsedQuestionText;
        $question0->imgSrc = "https://www.maize.io/wp-content/uploads/2020/07/5adb13a7-6d23-48ac-832a-64fc6f13f43a-e1600960276372.jpg";

        

        $question1 = new \stdClass();
        $question1->id = 1;
        $question1->slug = 'pause-a-spell';
        $question1->title = 'Pausing a Spell';
        $question1->description = "I turned a frog into a goat, but now how do I get it back?";
        $question1->imgSrc = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYj7SMAywMB8ttj_beEiSZcCwzJ3EzNt9JevXeVchd46x2LeIiAS4D_L1UlfxTWpVZCQE&usqp=CAU";

        $questions = [
            $question0,
            $question1
        ];


        return $this->render('question/homepage.html.twig', [
            'questionList' => $questions
        ]);
    }

    /**
     * @Route("/questions/{slug}")
     */
    public function show($slug) {

        $answers = ['Of course', 'Only on Wednesdays', 'When pigs can fly I will start to', 'Cher does so yes'];

        return $this->render('question/show.html.twig', [
            'question' => 'Do you believe in love after love?',
            'answers' => $answers
        ]);
    }
}