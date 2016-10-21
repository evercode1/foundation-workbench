<?php

namespace Evercode1\FoundationMaker\Builders\Exceptions;

use Evercode1\FoundationMaker\Builders\Writers\ExceptionHandlerWriter;
use Evercode1\FoundationMaker\Tokens\TokenTraits\FormatsModel;

class ExceptionHandlerBuilder
{

    use FormatsModel;


    public $files = [];
    public $writer;



    public function __construct()
    {

        $this->writer = new ExceptionHandlerWriter();

    }


    public function makeExceptionHandlerFile()
    {

        $this->writer->writeEachExceptionHandlerFile($this->files);

        return true;

    }

    public function setFileNamesAndPaths()
    {


        $this->files['handler'] = base_path('app/Exceptions/Handler.php');



    }




}