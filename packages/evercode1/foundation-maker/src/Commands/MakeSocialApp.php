<?php

namespace Evercode1\FoundationMaker\Commands;

use Evercode1\FoundationMaker\Commands\CommandTraits\MakesLayoutsFolder;
use Illuminate\Console\Command;
use Evercode1\FoundationMaker\Builders\Social\SocialAppBuilder;
use Evercode1\FoundationMaker\Builders\Master\MasterBuilder;
use Evercode1\FoundationMaker\Builders\ElixirAssets\AssetsBuilder;

class MakeSocialApp extends Command
{

    use MakesLayoutsFolder;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:social-app-beta
                           {DomainName}
                           {AppName=demo}
                           {MasterPageName=master}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test version of create basic social app - Do Not Use';



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
    public function handle(SocialAppBuilder $socialApp, MasterBuilder $masterPage, AssetsBuilder $assets )
    {


        $appName = $this->argument('AppName');

        $masterPageName = $this->argument('MasterPageName');

        $masterPage->setFileNamesAndPaths($masterPageName, $appName, 'socialNavTemplate');

        if ( $this->makeLayoutsFolder() && $masterPage->makeMasterFiles() ) {

            $this->sendMasterSuccessMessage();
            

        } else {

            $this->error('Oops, something went wrong!');


        }

        if ( $assets->makeAssetFiles() ) {

            $this->sendAssetSuccessMessage();


        } else {

            $this->error('Oops, something went wrong!');

        }




        if ( $socialApp->makeSocialAppFiles($this->argument()) ) {

            $this->sendSuccessMessage();

            return;

        }

            $this->error('Oops, something went wrong!');



    }

    private function sendSuccessMessage()
    {

        $this->info('Social App Files successfully created');

    }

    private function sendMasterSuccessMessage()
    {

        $this->info('Master Page successfully created');

    }

    private function sendAssetSuccessMessage()
    {

        $this->info('Assets successfully created');

    }


}
