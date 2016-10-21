<?php

namespace Evercode1\FoundationMaker\Builders\Exceptions;

use Evercode1\FoundationMaker\Builders\Writers\ExceptionWriter;
use Evercode1\FoundationMaker\Tokens\TokenTraits\FormatsModel;

class ExceptionBuilder
{

    use FormatsModel;

    public $exceptionName;
    public $view = false;
    public $viewName = false;
    public $files = [];
    public $writer;
    public $masterPageName;


    public function __construct()
    {

        $this->writer = new ExceptionWriter();

    }


    public function makeExceptionFiles()
    {

        $this->writer->writeEachExceptionFile($this->exceptionName, $this->viewName, $this->masterPageName, $this->files);

        return true;

    }

    public function setFileNamesAndPaths($exceptionName, $view, $masterPageName)
    {

        $this->exceptionName = $exceptionName;
        $this->view = $view;
        $this->masterPageName = $masterPageName;

        $this->files[$this->exceptionName] = base_path('app/Exceptions/'. $this->exceptionName . 'Exception.php');


        if ($view){

            $this->viewName = $this->formatModelPath($this->exceptionName);

            $this->files['view'] = base_path('resources/views/errors/' . $this->viewName . '.blade.php');


        }


    }




}