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
                'content' => "Bienvenue sur GameZone !\n\nCette page est un exemple de contenu. Remplace ce texte par ton propre article, tes informations et tes sources.",
                'image_url' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=1200',
            ],
            [
                'title' => 'Comment choisir sa prochaine aventure vidéoludique',
                'excerpt' => 'Quelques pistes pour trouver un jeu adapté à tes envies.',
                'content' => "Voici un deuxième article de démonstration.\n\nTu pourras ensuite ajouter un éditeur riche et un système de gestion des images.",
                'image_url' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=1200',
            ],
            [
                'title' => 'Le jeu indépendant à découvrir',
                'excerpt' => 'Les créations indépendantes réservent souvent de belles surprises.',
                'content' => "Contenu de démonstration à remplacer par un article original.",
                'image_url' => 'https://images.unsplash.com/photo-149_games_placeholder?w=1200',
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
