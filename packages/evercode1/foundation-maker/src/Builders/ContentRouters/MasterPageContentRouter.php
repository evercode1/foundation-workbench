<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Templates\MasterPageTemplates\MasterPageTemplateAssembler;

class MasterPageContentRouter
{


    public function getContentFromTemplate($masterPageName,  $appName, $navType, $fileName)
    {

        switch($fileName){


            case 'nav' :

                if ($navType){

                    return $this->routeTemplate($masterPageName, $appName, $navType);

                    break;

                }


                return $this->routeTemplate($masterPageName, $appName, 'navTemplate');

                break;



            default:

                $template = lcfirst($fileName) . 'Template';

                return $this->routeTemplate($masterPageName, $appName, $template);



        }

    }

    private function routeTemplate($masterPageName, $appName, $templateName)
    {


        $builder = new MasterPageTemplateAssembler($masterPageName, $appName);

        return $builder->assembleTemplate($templateName);


    }


}