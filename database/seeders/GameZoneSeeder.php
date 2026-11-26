<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GameZoneSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::firstOrCreate(
            ['slug' => 'actualites'],
            ['name' => 'Actualités']
        );

        $samples = [
            [
                'title' => 'Les sorties gaming à surveiller cette semaine',
                'excerpt' => 'Un aperçu des jeux qui pourraient retenir l’attention des joueurs.',
                'content' => "Bienvenue sur GameZone !\n\nLorem ipsum",
                'image_url' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=1200',
            ],
            [
                'title' => 'Comment choisir sa prochaine aventure vidéoludique',
                'excerpt' => 'Quelques pistes pour trouver un jeu adapté à tes envies.',
                'content' => "Voici un deuxième article de démonstration !\n\nLorem ipsum",
                'image_url' => 'https://static.fnac-static.com/multimedia/Images/FD/Comete/135576/CCP_IMG_1200x800/1778074.jpg',
            ],
            [
                'title' => 'Le jeu indépendant à découvrir',
                'excerpt' => 'Les créations indépendantes réservent souvent de belles surprises.',
                'content' => "Lorem ipsum",
                'image_url' => 'https://img.20mn.fr/NzqPq6sqSUSkyNtQuCsaZik/1444x920_chants-of-sennaar-e',
            ],
        ];

        foreach ($samples as $sample) {
            Article::updateOrCreate(
                ['slug' => Str::slug($sample['title'])],
                [
                    ...$sample,
                    'category_id' => $category->id,
                    'published_at' => now()->subHours(rand(1, 72)),
                    'is_published' => true,
                ]
            );
        }
    }
}
