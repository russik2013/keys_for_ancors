<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FilesRequest;

class AdminController extends Controller
{
    public function index()
    {
    	return view('fileLoad');
    }

    public function finder(FilesRequest $request)
    {

    	foreach(file($request->file) as $line) {
    		
    		$filter = $this->clearLine($line);

    		$rowSplit = explode('break',$filter);

			$keywords[] = $rowSplit[0];

			$searchPhrase[] = $rowSplit[1];

			$fileUrls[] = $rowSplit[2];

			$titles[] = $rowSplit[3];

		}

		for ($i = 0; $i < count($fileUrls); $i++) {
			$html = new \Htmldom($fileUrls[$i]);
			$exactMatch = 0;
			foreach ($html->find('a[title]') as $key => $a) {
			
				if(strcasecmp($keywords[$i], $a->title) == 0) {
    				$exactMatch++;
 	 			}
			}
		}

  //   	dd($request, $request->file);
    	
    }

    protected function clearLine($str)
    {
    	return str_replace(array("\r\n", "\r", "\n", "\t"), 'break', $str);
    }

    protected function urlFilter($str)
    {
    	return (explode('break',$str))[2];
    }

    protected function getKeyWord($str)
    {
    	//dd(explode('break',$str));
    	//return 
    }
}
