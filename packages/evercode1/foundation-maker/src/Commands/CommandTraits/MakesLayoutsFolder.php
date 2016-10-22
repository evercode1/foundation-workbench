<?php

Namespace Evercode1\FoundationMaker\Commands\CommandTraits;

trait MakesLayoutsFolder
{
    public function makeLayoutsFolder()
    {

        if (file_exists(base_path('/resources/views/layouts'))) {

            $this->error('layouts folder already exists!');

            die();

        }

        mkdir(base_path('/resources/views/layouts'));


        return true;

    }




}