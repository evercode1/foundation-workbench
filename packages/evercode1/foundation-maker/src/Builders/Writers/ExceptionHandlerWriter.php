<?php

namespace Evercode1\FoundationMaker\Builders\Writers;

use Evercode1\FoundationMaker\Builders\ContentRouters\ExceptionHandlerContentRouter;

class ExceptionHandlerWriter
{

    public $builder;

    public function __construct()
    {

        $this->builder = new ExceptionHandlerContentRouter();

    }


    Public function writeEachExceptionHandlerFile(array $files)
    {


        foreach ($files as $fileName => $filePath) {

            $txt = $this->builder->getContentFromTemplate($fileName);

            $handle = fopen($filePath, "w");

            fwrite($handle, $txt);

            fclose($handle);


        }
    }





}