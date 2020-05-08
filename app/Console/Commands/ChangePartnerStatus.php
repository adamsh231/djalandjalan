<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Partner;
use App\Join;

class ChangePartnerStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'partner:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and change partner status every day';

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
        //* change status 0 -> 1 (prepareation -> ongoing) *//
        $prepare = Partner::where([
            ['status', 0],
            ['start_date','<', now()]
        ])->get();
        foreach ($prepare as $p) {

            //* Delete user join (waiting for confirmation) when partner has been started *//
            $join = Join::where([
                ['status',0],
                ['partner_id', $p->id]
            ])->get();
            foreach($join as $j){
                $j->delete();
            }

            $p->status = 1;
            $p->save();
        }

        //* change status 1 -> 2 (ongoing -> done) *//
        $ongoing = Partner::where([
            ['status', 1],
            ['end_date','<', now()]
        ])->get();
        foreach ($ongoing as $o) {
            $o->status = 2;
            $o->save();
        }
    }
}
