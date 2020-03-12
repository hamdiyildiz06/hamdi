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

      $viewData->items = $this->product_model->get_all();

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
                  "url" => "test",
                  "rank"=> 0,
                  "isActive" => 1,
                  "createdAt" => date("Y-m-d H:i:s")
              )
          );

          if ($insert){
              echo "başarılı";
             // redirect(base_url("product"));
          }else{
              echo "hata";
             // redirect(base_url("product"));
          }

      }else{

          $viewData = new stdClass();
          $viewData->viewFolder = $this->viewFolder;
          $viewData->subViewFolder = "add";
          $viewData->form_error = true;

          $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

      }
  }





}
