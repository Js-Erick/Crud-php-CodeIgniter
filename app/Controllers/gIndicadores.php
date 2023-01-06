<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\IndicadorModel;

class gIndicadores extends Controller 
{

    public function getDatos(){
      $model = new IndicadorModel();
   
        $data['datos'] = $model->findAll();
        return view('grafico', $data);
    }	   

     
    
}
?>