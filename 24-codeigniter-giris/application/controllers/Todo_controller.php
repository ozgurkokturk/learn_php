<?php

class Todo_controller extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }


    public function index(){

        /*
         * Modelden gelen verileri controller olarak view'e göndermek biraz değişik
         * bu örnekte $items zaten bir array değer içeriyor ama ikinci kez biz onu array
         * olarak tanımlamak ve bu array'e de isim vermek zorunda kalıyoruz
         * bu isim çok önemli çünkü view sayfasında anca o şekilde erişebiliyoruz
         * ek olarak; gönderdiğimiz her array değerine view kısmında direkt değişken
         * olarak erişiyoruz...
         */
        $this->load->model("todo_model");
        $items["todolar"] = $this->todo_model->hepsiniGetir();

        $this->load->view("todo_view",$items);
    }

    public function insert(){

        /*
         * Eski tarz formdan veri alma nasıldı hatırlayalım.
         * echo $_POST["todo_adi"];
         */
        $todo_adi = $this->input->post("todo_adi");

        $this->load->model("todo_model");
        $insert_sonuc = $this->todo_model->ekle(array(
            "title"        => $todo_adi,
            "isCompleted"  => 0,
            "createdAt"    => date("Y-m-d H:i:s")
        ));

        if ($insert_sonuc){
            redirect(base_url());
        }

    }

    public function delete($id){

        /*
         * echo $this->url->segment(3); diyerek de id'ye ulaşabiliriz
         */
        $this->load->model("todo_model");
        $this->todo_model->sil($id);
        redirect(base_url());

    }


    public function isCompletedSetter($id){

        $completedDurumu = ($this->input->post("complatedDurumu") == "true") ? 1 : 0;

        $this->load->model("todo_model");
        $this->todo_model->guncelle($id, $completedDurumu);
        redirect(base_url());

    }
}