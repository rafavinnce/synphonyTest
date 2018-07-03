<?php
namespace Acme\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class DemoController extends FOSRestController
{
    public function getDemosAction()
    {

        $parser=xml_parser_create();

        function char($parser,$data)
        {
            echo $data;
        }

        xml_set_character_data_handler($parser,"char");
        $fp=fopen("test.xml","r");

        while ($data=fread($fp,4096))
        {
            xml_parse($parser,$data,feof($fp)) or
            die (sprintf("XML Error: %s at line %d",
                xml_error_string(xml_get_error_code($parser)),
                xml_get_current_line_number($parser)));
        }



        $data = xml_parser_free($parser);
        $view = $this->view($data);
        return $this->handleView($view);
    }
}