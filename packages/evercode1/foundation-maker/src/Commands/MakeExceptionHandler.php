<?php

namespace Evercode1\FoundationMaker\Commands;

use Illuminate\Console\Command;
use Evercode1\FoundationMaker\Builders\Exceptions\ExceptionHandlerBuilder;

class MakeExceptionHandler extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:exception-handler';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'create exception handler';


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
    public function handle(ExceptionHandlerBuilder $builder)
    {

        $builder->setFileNamesAndPaths();


        if ( $builder->makeExceptionHandlerFile() ) {

            $this->sendSuccessMessage();

            return;

        }

        $this->error('Oops, something went wrong!');


    }

    private function sendSuccessMessage()
    {

        $this->info('Exception Handler successfully created');

    }





}
