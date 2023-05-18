<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ParsingArtcileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parsing:artcile-lenta-ru';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Получение данных с сайта https://lenta.ru/ запись в базу данных';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $result = $this->getNewsJson('https://lenta.ru/rss/news');
        $count = 0;

        foreach ($result['channel']['item'] as $item) {

            $tag = Tag::firstOrCreate(['name' => $item['category']]);

            if(Article::where('name',  $item['title'])->doesntExist())
            {
                $article = Article::create([
                    'name' => $item['title'],
                    'description' => $item['description'],
                    'image' => $this->saveImage($item),
                    
                ]);

                if(isset($tag))
                {
                    $article->tags()->attach($tag); 
                }
                $count++;
            }
        
        }
        $this->info('На сайт было добавлено ' . $count .  ' новостей');

        return Command::SUCCESS;
    }

    public function getNewsJson($url)
    {
        $xmlFile = file_get_contents($url);
        $xmlObject = (array) simplexml_load_string($xmlFile, null, LIBXML_NOCDATA);
        $jsonFormatData = json_encode($xmlObject);
        $result = json_decode($jsonFormatData, true);
        return $result;
    }

    public function saveImage($item)
    {
        $filename = basename($item['enclosure']['@attributes']['url']);
        $filename = 'images/' . $filename;
        Storage::disk('local')->put($filename, file_get_contents($item['enclosure']['@attributes']['url']), 'public');
        return $filename;
    }
}
