<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    private $results = array();

    public function scraper()
    {
        $client = new Client();
        $url = 'https://www.kominfo.go.id/content/all/berita_satker';
        $page = $client->request('GET', $url);

        // echo "<pre>";
        // print_r($page);

        // echo $page->filter(selector:'.title')->text();

        $page->filter(selector:'.content')->each(function ($item) {
            $this->results[$item->filter('.title')->text()] = $item->filter('.description')->text();
        });

        $data = $this->results;
        return view('scraper', compact('data'));
    }
}
