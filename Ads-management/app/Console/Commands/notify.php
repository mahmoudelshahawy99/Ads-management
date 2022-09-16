<?php

namespace App\Console\Commands;

use App\Mail\AdsRemind;
use App\Models\Advertiser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending daily email for advertisers who have ads next day';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $nextDay = date('Y-m-d', strtotime(' +1 day'));
        $advertisers = Advertiser::whereHas('ads', function ($query) use ($nextDay) {
            $query->where('start_date', '=', $nextDay);
        })->get()->toArray();

        foreach($advertisers as $adver){
            Mail::to($adver['email'])->send(new AdsRemind($adver));
        }

    }
}
