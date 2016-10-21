<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Templates\ExceptionTemplates\ExceptionHandlerTemplateAssembler;

class ExceptionHandlerContentRouter
{


    public function getContentFromTemplate($fileName)
    {

        switch($fileName){



            case 'handler' :

                return $this->routeTemplate('handlerTemplate');

                break;




            default:

                return 'Filename not recognized';



        }

    }

    private function routeTemplate($templateName)
    {


        $builder = new ExceptionHandlerTemplateAssembler();

        return $builder->assembleTemplate($templateName);


    }


}