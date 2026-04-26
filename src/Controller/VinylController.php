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
        $title = 'Music shop PB & Jams';
        $tracks = [
            ['song' => 'Creep' , 'artist' => 'Radiohead'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
            ['song' => 'Облака', 'artist' => 'DDT'],
            ['song' => 'Kiss from a Rose', 'artist' =>  'Seal']
        ];

       return $this->render('vinyl/homepage.html.twig',
       ['title' => $title, 'tracks' => $tracks]);

    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {

        $genre = $slug? u(str_replace('-',' ', $slug)) -> title(true) : null;
        return $this->render('vinyl/browse.html.twig', ['genre' => $genre]);
    }

}
