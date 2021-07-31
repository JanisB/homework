<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Jobs\NewsJob;
use Illuminate\Http\Request;
use App\Contracts\Parser;
use App\Http\Controllers\Controller;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser)
	{
        $urls = [
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/fire.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss'
        ];
 
        foreach($urls as $url) {
               dispatch(new NewsJob($url));
        }
 
        return "Data is downloaded!";
	}
}
