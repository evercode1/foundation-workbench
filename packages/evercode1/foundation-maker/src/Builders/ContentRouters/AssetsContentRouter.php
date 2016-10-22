<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Templates\AssetTemplates\AssetTemplateAssembler;

class AssetsContentRouter
{


    public function getContentFromTemplate($fileName)
    {

        $fileName = $fileName . 'Template';

        return $this->routeTemplate($fileName);


    }

    private function routeTemplate($templateName)
    {


        $builder = new AssetTemplateAssembler();

        return $builder->assembleTemplate($templateName);


    }


}