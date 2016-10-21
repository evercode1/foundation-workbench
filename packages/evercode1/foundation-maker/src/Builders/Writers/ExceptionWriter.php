<?php

namespace Evercode1\FoundationMaker\Builders\Writers;

use Evercode1\FoundationMaker\Builders\ContentRouters\ExceptionContentRouter;

class ExceptionWriter
{

    public $builder;

    public function __construct()
    {

        $this->builder = new ExceptionContentRouter();

    }


    Public function writeEachExceptionFile($exceptionName, $viewName, $masterPageName, array $files)
    {


        foreach ($files as $fileName => $filePath) {

            $txt = $this->builder->getContentFromTemplate($exceptionName, $viewName, $masterPageName, $fileName);

            $handle = fopen($filePath, "w");

            fwrite($handle, $txt);

            fclose($handle);


        }
    }





}