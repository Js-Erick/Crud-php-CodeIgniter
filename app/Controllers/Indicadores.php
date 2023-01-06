<?php 

namespace App\Controllers;
   
use CodeIgniter\Controller;
use App\Models\IndicadorModel;


class Indicadores extends Controller 
{
   
    public function index()
    {    
        $model = new IndicadorModel();
   
        $data['indicadores_detail'] = $model->orderBy('id', 'ASC')->findAll();
        $data['header']=view('template/header');
        $data['footer']=view('template/footer'); 
        return view('list', $data);
    }    
  
   
    public function store()
    {  
        helper(['form', 'url']);
           
        $model = new IndicadorModel();
          
        $data = [
            'nombreIndicador'=>$this->request->getVar('txtNombre'),
            'codigoIndicador'=>$this->request->getVar('txtCodigo'),
            'unidadMedidaIndicador'=>$this->request->getVar('txtUnidad'),
            'valorIndicador'=>$this->request->getVar('txtValor'),
            'fechaIndicador'=>$this->request->getVar('txtFecha'),
            'tiempoIndicador'=>$this->request->getVar('txtTiempo'),
            'origenIndicador'=>$this->request->getVar('txtOrigen'),
            ];
            
        $save = $model->insert_data($data);
        if($save != false)
        {
            $data = $model->where('id', $save)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }
        else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
    }
   
    public function edit($id = null)
    {
        
     $model = new IndicadorModel();
      
     $data = $model->where('id', $id)->first();
       
    if($data){
            echo json_encode(array("status" => true , 'data' => $data));
        }else{
            echo json_encode(array("status" => false));
        }
    }
   
    public function update()
    {  
   
        helper(['form', 'url']);
           
        $model = new IndicadorModel();
  
        $id = $this->request->getVar('hdnIndicadorId');
  
         $data = [
            'nombreIndicador'=>$this->request->getVar('txtNombre'),
            'codigoIndicador'=>$this->request->getVar('txtCodigo'),
            'unidadMedidaIndicador'=>$this->request->getVar('txtUnidad'),
            'valorIndicador'=>$this->request->getVar('txtValor'),
            'fechaIndicador'=>$this->request->getVar('txtFecha'),
            'tiempoIndicador'=>$this->request->getVar('txtTiempo'),
            'origenIndicador'=>$this->request->getVar('txtOrigen'),
            ];
            
  
        $update = $model->update($id,$data);
        if($update != false)
        {
            $data = $model->where('id', $id)->first();
            echo json_encode(array("status" => true , 'data' => $data));
        }
        else{
            echo json_encode(array("status" => false , 'data' => $data));
        }
    }
   
    public function delete($id = null){
        $model = new IndicadorModel();
        $delete = $model->where('id', $id)->delete();
        if($delete)
        {
           echo json_encode(array("status" => true));
        }else{
           echo json_encode(array("status" => false));
        }
    }
}
  
?>