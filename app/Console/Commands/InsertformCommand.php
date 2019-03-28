<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Carbon\Carbon;

class InsertformCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:form';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will add data to form';

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
        $current_time = \Carbon\Carbon::now()->toDateTimeString();
         $datainsert= DB::table('forms')->insert(
        ['filename' => 'denniscommand3.pdf',
        'created_at' =>$current_time
        ] 
);

         return $datainsert;
    }
}
