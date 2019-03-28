<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Carbon\Carbon;

class InsertToForm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Command to insert data to form table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Form insert';

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
         DB::table('forms')->insert(
        ['filename' => 'dennis3.pdf']
);
    }
}
