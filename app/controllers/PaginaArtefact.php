<?php

class PaginaArtefact extends Controller
{
    public function index()
    {
        $this->view('pagina_artefact/pagina_artefact');
    }
    public function delete (){
        $this->model('ArtefactModel');
    }
}