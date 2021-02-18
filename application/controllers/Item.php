<?php

class Item extends CI_Controller
{
    //- get all the items with get requests
    public function index()
    {
        //- check http method
        if(!http_method('GET')) exit(json_output(['error'=>'Unauthorized']));
        
        $this->load->model('ItemModel');
        //- get all the items
        $all = $this->ItemModel->getItems();
        json_output($all);
    }

    //- insert new item with post request
    public function post()
    {
        //- check http method
        if(!http_method('POST')) exit(json_output(['error'=>'Unauthorized']));
        
        $this->load->model('ItemModel');

        //- get all the data
        $title = $this->input->post('title') ?? exit(json_output(['error'=>'no input'])) ;
        $description = $this->input->post('description') ?? exit(json_output(['error'=>'no input']));

        $id = $this->ItemModel->setItem(compact('title', 'description'));

        json_output(['status' => "OK", 'id' => $id]);
    }

    //- update data with PUT method
    public function put($id = false) 
    {
        //- check http method
        if(!http_method('PUT') or !$id) exit(json_output(['error'=>'Unauthorized']));
        
        $this->load->model('ItemModel');

        $input =  parsePutRequest();

        //- get all the data
        $title = $input['title'] ?? exit(json_output(['error'=>'no input'])) ;
        $description = $input['description'] ?? exit(json_output(['error'=>'no input'])) ;
  
        $update = $this->ItemModel->updateItem($id, $input);
        if($update)
            json_output(['status' => "OK", 'item' => 'updated']);
        else
            json_output(['status' => "OK", 'item' => 'something went wrong!']);
    }

    //- delete item by DELETE method
    public function delete($id = false)
    {
        //- check http method
        if(!http_method('DELETE') or !$id) exit(json_output(['error'=>'Unauthorized']));
        
        $this->load->model('ItemModel');
        
        $delete = $this->ItemModel->deleteItem($id);
        if($delete)
            json_output(['status' => "OK", 'item' => 'item deleted']);
        else
            json_output(['status' => "OK", 'item' => 'something went wrong!']);
    }
}

