<?php

namespace Database\Seeders;

use App\Models\Testmonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->command->call("migrate:fresh");
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            ],
        ]);
        $path = [
            'public/testmonial-piece-jointe/1.jpg',
            'public/testmonial-piece-jointe/2.jpg',
            'public/testmonial-piece-jointe/3.jpg',
            'public/testmonial-piece-jointe/4.jpg',
            'public/testmonial-piece-jointe/lorem-lepsum.docx'
        ];
        $statut = ['en attente', 'approuvé', 'rejeter'];
        $order = 1;
        for ($i = 1; $i <= 30; $i++) {
            DB::table('testmonials')->insert([
                [
                    'order'     => $order++,
                    'titre'     => 'text text text text',
                    'message'   => 'text text text text text text text',
                    'path'      => $path[array_rand($path)],
                    'statut'    => $statut[array_rand($statut, 1)],
                    'created_at' => date('Y-m-d H:i:s'),
                ],
            ]);
        }

        // Testmonial::factory()->count(30)->create();
    }
}
