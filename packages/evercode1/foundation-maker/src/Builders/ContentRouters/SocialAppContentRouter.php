<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Templates\SocialAppTemplates\SocialAppTemplateAssembler;

class SocialAppContentRouter
{



    public function getContentFromTemplate($fileName,  array $tokens)
    {

        $template = lcfirst( $fileName);
        $templateName = $template . 'Template';

        return $this->routeTemplate($tokens, $templateName);




    }

    private function routeTemplate($tokens, $templateName)
    {


        $socialAppTemplate = new SocialAppTemplateAssembler($tokens);

        return $socialAppTemplate->assembleTemplate($templateName);


    }


}