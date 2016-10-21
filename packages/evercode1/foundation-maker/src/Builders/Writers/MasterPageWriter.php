<?php

namespace Evercode1\FoundationMaker\Builders\Writers;

use Evercode1\FoundationMaker\Builders\ContentRouters\MasterPageContentRouter;

class MasterPageWriter
{

    public $builder;

    public function __construct()
    {

        $this->builder = new MasterPageContentRouter();

    }


    Public function writeEachMasterFile($masterPageName, $appName, $navType, array $files)
    {


        foreach ($files as $fileName => $filePath) {

            $txt = $this->builder->getContentFromTemplate($masterPageName, $appName, $navType, $fileName);

            $handle = fopen($filePath, "w");

            fwrite($handle, $txt);

            fclose($handle);


        }
    }





}