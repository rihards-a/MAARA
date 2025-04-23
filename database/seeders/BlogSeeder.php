<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use App\Models\BlogTag;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [ 
            // TODO: Create reasonable tags
            ['name' => 'Bailes', 'slug' => 'bailes'],
            ['name' => 'Ko Darīt?', 'slug' => 'ko-darit'],
            ['name' => 'Bēres', 'slug' => 'beres'],
            ['name' => 'Kam zvanīt?', 'slug' => 'zvanit'],
            ['name' => 'Kā palīdzēt sev?', 'slug' => 'palidzet-sev'],
            // ...
        ];

        foreach ($tags as $tagData) {
            BlogTag::firstorCreate($tagData);
        }	

        $posts = [
            [
                'name' => 'Bailes no nāves - kā tās saprast un pieņemt',
                'slug' => 'bailes-no-naves',
                'title_card_image_location' => 'images/blogs_2_vainas.jpg',
                'title_card_text' => 'Bailes no nāves ir dabiska parādība, taču, izprotot un pieņemot tās, mēs varam dzīvot pilnvērtīgāk un ar mazāku trauksmi.',
                'tags' => ['bailes', 'ko-darit']
            ],
            [
                'name' => 'Piecas sēru stadijas - kā tās palīdz saprast mūsu emocijas',
                'slug' => 'piecas-seru-stadijas',
                'title_card_image_location' => 'images/blogs_1_seras.jpg',
                'title_card_text' => 'Uzziniet, kā izpratne par piecām sēru stadijām var palīdzēt labāk atpazīt un izdzīvot mūsu emocijas pēc zaudējuma.',
                'tags' => ['ko-darit']
            ],
            [
                'name' => 'Vainas apziņa un nāve - kā ar to tikt galā?',
                'slug' => 'vainas-apzina-un-nave',
                'title_card_image_location' => 'images/blogs_3_bailes.jpg',
                'title_card_text' => 'Vainas apziņa pēc tuvinieka zaudējuma ir dabiska sēru daļa, un šajā rakstā aplūkoti veidi, kā to saprast, pieņemt un mazināt.',
                'tags' => ['ko-darit']
            ],
            [
                'name' => 'Kam īsti jāzvana, kad tuvinieks ir aizgājis?',
                'slug' => 'kam-jazvana',
                'title_card_image_location' => 'images/blogs_4_jazvanaA.jpg',
                'title_card_text' => 'Apjukuma brīdī skaidras norādes palīdz rast atbalstu. Šajā ierakstā uzzināsi, kam zvanīt un kā rīkoties, kad tuvinieks ir aizgājis.',
                'tags' => ['ko-darit']
            ],
            [
                'name' => 'Kā palīdzēt sev, sastopoties ar sērām?',
                'slug' => 'ka-palidzet-sev',
                'title_card_image_location' => 'images/blogs_5_ka_palidzet_sev.jpg',
                'title_card_text' => 'Piedzīvojot sēras, ir svarīgi neaizmirst par sevi. Šajā ierakstā atradīsi pirmos vienkāršos, bet nozīmīgos soļus rūpēm par sevi.',
                'tags' => ['ko-darit']
            ]
        ];

        foreach ($posts as $postData) {
            // Extract tags
            $tagSlugs = $postData['tags'];
            unset($postData['tags']);
            
            $post = BlogPost::firstOrCreate(
                ['slug' => $postData['slug']], // Attempt to find post by slug
                $postData // If not found, create with these values
            );
            
            // Find and attach tags 
            $tagIds = BlogTag::whereIn('slug', $tagSlugs)->pluck('id')->toArray();
            $post->tags()->sync($tagIds);
        }
    }
}
