<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{

    public $viewFolder = "";

  public function __construct()
  {
    parent::__construct();
    $this->viewFolder = "product_v";
    $this->load->model("product_model");
  }

  public function index()
  {
      $viewData = new stdClass();
      $viewData->viewFolder = $this->viewFolder;
      $viewData->subViewFolder = "list";

      $viewData->items = $this->product_model->get_all(
          array(),"rank ASC"
      );

      $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
  }

  public function new_form()
  {
      $viewData = new stdClass();
      $viewData->viewFolder = $this->viewFolder;
      $viewData->subViewFolder = "add";

      $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
  }

  public function save(){

      $this->load->library("form_validation");

      $this->form_validation->set_rules('title', 'Başlık', 'trim|required');
      $this->form_validation->set_rules('description', 'Açıklama', 'trim|required');

      $this->form_validation->set_message(
          array(
              "required" => "Lütfen <strong>'{field}'</strong> Alanını Boş Bırakmayınız"
          )
      );

      if ($this->form_validation->run()){

          $insert  = $this->product_model->add(
              array(
                  "title" => $this->input->post('title'),
                  "description" => $this->input->post('description'),
                  "url" => convertToSEO($this->input->post('title')),
                  "rank"=> 0,
                  "isActive" => 1,
                  "createdAt" => date("Y-m-d H:i:s")
              )
          );

          if ($insert){
//              // TODO açıklama eklenecek
                 redirect(base_url("product"));
          }else{
//             // TODO açıklama eklenecek
              redirect(base_url("product"));
          }

      }else{

          $viewData = new stdClass();
          $viewData->viewFolder = $this->viewFolder;
          $viewData->subViewFolder = "add";
          $viewData->form_error = true;

          $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

      }
  }

  public function update_form($id){
      $viewData = new stdClass();
      $viewData->viewFolder = $this->viewFolder;
      $viewData->subViewFolder = "update";

      $viewData->item = $this->product_model->get(
          array(
              "id" => $id
          )
      );

      $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

  }

  public function update($id){

      $this->load->library('form_validation');

      $this->form_validation->set_rules('title', 'Başlık', 'trim|required');
      $this->form_validation->set_rules('description', 'Açıklama', 'trim|required');

      $this->form_validation->set_message(
          array(
              "required" => "Lütfen '<strong>{field}</strong>' Alanını Boş Bırakmayınız... "
          )
      );

      if ($this->form_validation->run()){

          $update = $this->product_model->update(
              array(
                  "id" => $id
              ),
              array(
                  "title" => $this->input->post('title'),
                  "description" => $this->input->post('description'),
                  "url" => convertToSEO($this->input->post('title'))
              )
          );

          if ($update){
              // TODO açıklama eklenecek
             redirect(base_url("product"));
          }else{
              // TODO açıklama ekleneceks
              redirect(base_url("product"));
          }

      } else {

          $viewData = new stdClass();
          $viewData->viewFolder = $this->viewFolder;
          $viewData->subViewFolder = "update";
          $viewData->form_error = true;

          $viewData->item = $this->product_model->get(
              array(
                  "id" => $id
              )
          );

          $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
      }

  }

  public function delete($id){

      $delete = $this->product_model->delete(
          array(
              "id" => $id
          )
      );

      if ($delete){
          //TODO alert eklenecek
          redirect(base_url("product"));
      } else {
          //TODO alert eklenecek
          redirect(base_url("product"));
      }
  }

  public function isActiveSetter($id){

      if ($id){
          $isActive = ($this->input->post('data') === "true") ? 1 : 0;

          $this->product_model->update(
              array(
                  "id" => $id
              ),
              array(
                  "isActive" =>  $isActive
              )
          );
      }

  }

  public function rankSetter(){
      $data = $this->input->post('data');
      parse_str($data, $order);

      $items = $order["ord"];

      foreach ($items as $rank => $id){
          $this->product_model->update(
              array(
                  "id" => $id,
                  "rank !=" => $rank
              ),
              array(
                  "rank" => $rank
              )
          );
      }
  }




}
