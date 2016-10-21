<?php

namespace Evercode1\FoundationMaker\Commands;

use Illuminate\Console\Command;
use Evercode1\FoundationMaker\Builders\Crud\CrudBuilder;

class MakeCrud extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud
                           {ModelName}
                           {Slug=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create model, migration, route, controller, factory, test, and component';





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
    public function handle(CrudBuilder $crud)
    {

        if($this->argument('ModelName') == 'User'){

            $this->error('Oops, Can\'t do this on User!');

            return;


        }


        if ( $crud->makeCrudFiles($this->argument()) ) {

            $this->sendSuccessMessage();

            return;

        } else {


            $this->error('Oops, something went wrong!');

            return;

        }



    }

    private function sendSuccessMessage()
    {

        $this->info('Crud Files successfully created');

    }


}
