<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bird;
use App\Models\Reptile;

class QuestionController extends Controller
{
    public function generateQuestion()
    {

    	$birds = Bird::pluck('name')->toArray();
    	$reptiles = Reptile::pluck('name')->toArray();
    	$allAnimals = array_merge($birds, $reptiles);

    	$length = count($allAnimals);
    	$answerIndex = rand(0,$length-1);

    	$question = "Which image represent a ".$allAnimals[$answerIndex]."?";


    	$options = [];
    	$options[] = $allAnimals[$answerIndex];

    	while(count($options)<4)
    	{
    		$randomIndex = rand(0,$length-1);

    		if(!in_array($allAnimals[$randomIndex], $options))
    		{
    			$options[] = $allAnimals[$randomIndex];
    		}
    	}

    	return view('quiz',compact('question','options'));
    }
}
