<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $title = 'Music shop';
        $tracks = [
            ['song' => 'Creep' , 'singer' => 'Radiohead'],
            ['song' => 'Fantasy', 'singer' => 'Mariah Carey'],
            ['song' => 'Облака', 'singer' => 'DDT'],
            ['song' => 'Kiss from a Rose', 'singer' =>  'Seal']
        ];

       return $this->render('vinyl/homepage.html.twig',
       ['title' => $title, 'tracks' => $tracks]);

    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if($slug){
            $title = 'Genre: '.u(str_replace('-',' ', $slug)) -> title(true);
        }else{
            $title = 'All genres';
        }


        return new Response($title);
    }

    #[Route('/vinyl/{slug}')]
    public function show_vinyl(string $slug = null): Response
    {


        return new Response('music: '. $slug);
    }
}
