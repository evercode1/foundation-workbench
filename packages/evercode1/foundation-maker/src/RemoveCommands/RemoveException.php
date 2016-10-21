<?php

namespace Evercode1\FoundationMaker\RemoveCommands;

use Evercode1\FoundationMaker\Tokens\TokenTraits\FormatsModel;
use Illuminate\Console\Command;
use Evercode1\FoundationMaker\RemoveCommands\RemoveTraits\RemovesFiles;

class RemoveException extends Command
{
    use FormatsModel, RemovesFiles;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'remove:exception
                           {ExceptionName}';


    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'remove exception';

    public $exceptionName;

    public $view;

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

    public function handle()
    {

        $this->exceptionName = $this->formatModel($this->argument('ExceptionName'));

        $this->view = $this->formatModelPath($this->exceptionName);

        $this->setCommandType($this->argument('command'));

        $this->setExceptionPaths();

        if ( $this->deleteFiles() ) {

            $this->sendSuccessMessage();

            return;

        }

        $this->error('No Such Directory');


    }

    private function sendSuccessMessage()
    {

        $this->info($this->exceptionName . 'Exception successfully removed.');

    }

}
