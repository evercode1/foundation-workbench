<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Templates\ExceptionTemplates\ExceptionTemplateAssembler;

class ExceptionContentRouter
{


    public function getContentFromTemplate($exceptionName, $viewName, $masterPageName, $fileName)
    {

        switch($fileName){

            case $exceptionName :

                return $this->routeTemplate($exceptionName, $viewName, $masterPageName,'exceptionTemplate');

                break;

            case 'view' :

                return $this->routeTemplate($exceptionName, $viewName, $masterPageName,'viewTemplate');

                break;




            default:

                return 'Filename not recognized';



        }

    }

    private function routeTemplate($exceptionName, $viewName, $masterPageName,$templateName)
    {


        $builder = new ExceptionTemplateAssembler($exceptionName, $viewName, $masterPageName);

        return $builder->assembleTemplate($templateName);


    }


}