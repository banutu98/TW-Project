<?php

class AdaugareArtefact extends Controller
{
    public function index()
    {
        $this->view('adaugare_artefact/adaugare_artefact');
    }
    public function add()
    {
        $this->model('AdaugareArtefactModel');
    }
}