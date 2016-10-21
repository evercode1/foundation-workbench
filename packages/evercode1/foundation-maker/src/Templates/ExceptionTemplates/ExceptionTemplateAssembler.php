<?php

namespace Evercode1\FoundationMaker\Templates\ExceptionTemplates;

use Evercode1\FoundationMaker\Builders\ContentRouters\ContentTraits\ReplacesTokens;

class ExceptionTemplateAssembler
{
    use ReplacesTokens;

    public $exceptionName;
    public $viewName;
    public $masterPageName;
    public $tokens = [];
    public $model;
    public $modelPath;

    public function __construct($exceptionName, $viewName, $masterPageName)
    {

        $this->exceptionName = $exceptionName;
        $this->viewName = $viewName;
        $this->masterPageName = $masterPageName;
        $this->setTokens();


    }

    private function setTokens()
    {

        $this->tokens['exceptionName'] = $this->exceptionName;
        $this->tokens['viewName'] = $this->viewName;
        $this->tokens['masterPageName'] = $this->masterPageName;


    }

    public function assembleTemplate($template)
    {

        if (file_exists(base_path(). '/app/Templates')){

            $this->addCustomTokens();

            $file = base_path(). '/app/Templates/ExceptionTemplates/templates/' . $template . '.txt';

            $content = file_get_contents($file);


            return $this->insertTokensIntoContent($content, $this->tokens);


        }


        $file = __DIR__ . '/templates/' . $template . '.txt';

        $content = file_get_contents($file);


        return $this->insertTokensIntoContent($content, $this->tokens);


    }

    private function addCustomTokens()
    {

        $addTokens = new \App\Templates\CustomTokens($this->model, $this->modelPath);

        $this->tokens = $this->mergeTokens($this->tokens, $addTokens->customTokens);


    }

}


