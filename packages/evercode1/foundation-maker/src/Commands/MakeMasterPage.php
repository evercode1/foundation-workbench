<?php

namespace Evercode1\FoundationMaker\Commands;

use Evercode1\FoundationMaker\Commands\CommandTraits\MakesLayoutsFolder;
use Illuminate\Console\Command;
use Evercode1\FoundationMaker\Builders\Master\MasterBuilder;

class MakeMasterPage extends Command
{

    use MakesLayoutsFolder;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:master
                           {MasterPageName=master}
                           {AppName=Demo}';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'create master page';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(MasterBuilder $builder)
    {

        $masterPageName = $this->argument('MasterPageName');
        $appName = $this->argument('AppName');

        $builder->setFileNamesAndPaths($masterPageName, $appName);


        if ( $this->makeLayoutsFolder() && $builder->makeMasterFiles() ) {

            $this->sendSuccessMessage();

            return;

        }

        $this->error('Oops, something went wrong!');


    }

    private function sendSuccessMessage()
    {

        $this->info('Master Page successfully created');

    }






}
