<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TakeOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $orders = [])
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // process the orders
        foreach ($this->orders as $key => $value) {
            echo "Preparing $value...";
            echo "$value ready.". PHP_EOL;
        }
    }
}
