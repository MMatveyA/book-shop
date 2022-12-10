<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            [
                'Александр',
                'Пушкин',
                'Сергеевич',
                '1799-06-06',
                '1837-02-10',
                'Алекса́ндр Серге́евич Пу́шкин — русский поэт, драматург и прозаик, заложивший основы русского реалистического направления, литературный критик и теоретик литературы, историк, публицист, журналист. Один из самых авторитетных литературных деятелей первой трети XIX века.'
            ],
        ];

        foreach ($list as $item)
        {
            $author = Author::create([
                'first_name' => $item[0],
                'second_name' => $item[1],
                'thrid_name' => $item[2],
                'birth' => $item[3],
                'death' => $item[4],
                'biography' => $item[5],
            ]);
        };
    }
}
