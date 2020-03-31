<?php

namespace App\Services;

use Analytics;
use Spatie\Analytics\Period;
use Str;

class Trending
{
   public function week($limit = 15)
   {
       return $this->getResults(7);
   }

   protected function parseResults($data)
    {
       return $data->reject(function($item){
           return $item['url'] == '/' or
           $item['url'] == '/blog' or
           Str::startsWith($item['url'], '/category');
       })->unique('url')->transform(function($item){
           $item['pageTitle'] = str_replace(' - Online Khabar Hub', '', $item['pageTitle']);
           return $item;
       });
    }
    public function getResults($days, $limit=15)
    {
       $data = Analytics::fetchMostVisitedPages(Period::days($days), $limit);
       return $this->parseResults($data);
    }
}
