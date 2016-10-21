<?php

namespace Evercode1\FoundationMaker\Commands;

use Illuminate\Console\Command;
use Evercode1\FoundationMaker\Builders\Exceptions\ExceptionBuilder;

class MakeException extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:exception
                            {ExceptionName}
                            {View=false}
                            {MasterPageName=master}';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'create exception';


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
    public function handle(ExceptionBuilder $builder)
    {

        $exceptionName = $this->argument('ExceptionName');

        $view = $this->argument('View');

        $masterPageName = $this->argument('MasterPageName');

        $builder->setFileNamesAndPaths($exceptionName, $view, $masterPageName);


        if ( $builder->makeExceptionFiles() ) {

            $this->sendSuccessMessage();

            return;

        }

        $this->error('Oops, something went wrong!');


    }

    private function sendSuccessMessage()
    {

        $this->info('Exception successfully created');

    }





}
