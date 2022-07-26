<?php

namespace Database\Factories;

use App\Models\Testmonial;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class TestmonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\Testmonial::class;

    public function definition()
    {
        $path = [
            'public/testmonial-piece-jointe/1.jpg',
            'public/testmonial-piece-jointe/2.jpg',
            'public/testmonial-piece-jointe/3.jpg',
            'public/testmonial-piece-jointe/4.jpg',
            'public/testmonial-piece-jointe/lorem-lepsum.docx'
        ];
        $statut = ['en attente', 'approuvé', 'rejeter'];
        $order = 0;
        return [
            'order'     => ++$order,
            'titre'     => $this->faker->realText(30),
            'message'   => $this->faker->realText(200),
            'path'      => array_rand($path),
            'statut'    => array_rand($statut),
            'created_at' => date('Y-m-d H:i:s'),
        ];
    }
}
