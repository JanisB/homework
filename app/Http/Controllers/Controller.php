<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected array $news;

    protected function getNews(): array
    {
        
        for($i = 0; $i < 5; $i++){
            $j = $i+1;
            $this->news[] = [
                'title' => " News ". $j,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Mollitia inventore quasi cumque maiores, voluptatum eveniet architecto 
                voluptatem possimus tenetur, sed minima porro? Suscipit necessitatibus 
                exercitationem dolores ad? Odit, laboriosam in.'
            ];
        }
        return $this->news;
    }
}
