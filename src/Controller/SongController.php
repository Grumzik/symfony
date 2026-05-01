<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface;

class SongController extends AbstractController
{
    #[Route('/api/songs/{id<\d+>}', methods: ['GET'], name: 'api_songs_get_one')]
    public function getSong(int $id, LoggerInterface  $logger): Response
    {
        $song = [
            'id' => $id,
            'name' => 'Creep',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
        ];

$logger->info("Returning API response for song {song} :   ".json_encode($song), ['song' => $id]);

        return $this->json($song);
    }
}
