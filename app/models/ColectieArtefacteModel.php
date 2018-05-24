<?php

class ColectieArtefacteModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        if(isset($_POST['key']))
        {
            $key = $_POST['key'];
        }
        else
            $key = "";
        $file = file_get_contents('http://localhost/public/colectieArtefacte');
        $doc = new DOMDocument();
        @$doc->loadHTML($file);
        $root = $doc->getElementById('Collection');
        $root->nodeValue = "";
        $heading = new DOMElement('h6', 'heading');
        $root->appendChild($heading);

        $statement = oci_parse($this->db,"select ID, ARTEFACT_NAME from tw.ARTEFACTS where upper(ARTEFACT_NAME) like upper('%'|| :key ||'%')");
        oci_bind_by_name($statement,"key",$key);
        oci_execute($statement,OCI_DEFAULT);

        $number = 0;

        while ($row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS))
        {
            $number ++;

            $name = $row['ARTEFACT_NAME'];
            $id = $row['ID'];

            $first_div = new DOMElement('div');
            $root->appendChild($first_div);
            $first_div->setAttribute('class','responsive');

            $second_div = new DOMElement('div');
            $first_div->appendChild($second_div);
            $second_div->setAttribute('class','gallery');

            $alink = new DOMElement('a');
            $second_div->appendChild($alink);
            $alink->setAttribute('href','/public/paginaArtefact/id=' . $id);

            $img = new DOMElement('img');
            $alink->appendChild($img);
            $img->setAttribute('src','/public/Images/img_artefact1.jpg');
            $img->setAttribute('alt','Imagine Artefact');
            $img->setAttribute('width','600');
            $img->setAttribute('height','400');

            $third_div = new DOMElement('div',$name);
            $second_div->appendChild($third_div);
            $third_div->setAttribute('class','desc');
        }

        if($number == 0)
        {
            $noresults = new DOMElement('h3', 'No results found for \'' . $key . '\'.');
            $root->appendChild($noresults);
        }

        $clear = new DOMElement('div');
        $root->appendChild($clear);
        $clear->setAttribute('class', 'clearfix');

        if($number > 0)
        {
            $number--;
            $number = $number/3;
            $number++;

            $pagination = new DOMElement('div');
            $root->appendChild($pagination);
            $pagination->setAttribute('class', 'pagination');

            $pag = new DOMElement('a', '&laquo;');
            $pagination->appendChild($pag);

            for($i = 1; $i <= $number; $i++)
            {
                $pag = new DOMElement('a', $i);
                $pagination->appendChild($pag);
            }

            $pag = new DOMElement('a', '&raquo;');
            $pagination->appendChild($pag);
        }

        //echo $doc->saveHTML();
        $doc->saveHTMLFile('../app/views/colectie_artefacte/colectie_artefacte.php');
        header( 'Location: http://localhost/public/colectieArtefacte/search=' . $key);


        /*
        $statement = oci_parse($this->db,"select count(*) from tw.ARTEFACTS where upper(ARTEFACT_NAME) like upper('%'|| :key ||'%')");
        oci_bind_by_name($statement,"key",$key);
        oci_execute($statement,OCI_DEFAULT);
        if(oci_fetch($statement))
        {
            $number = oci_result($statement,1);
        }*/
    }


}