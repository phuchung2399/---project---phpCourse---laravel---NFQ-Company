<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Log;

class FetchDataXML extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:dataXML {urls}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch date from XML and insert in database';

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
        try {
            $urls = $this->argument('urls');
            $xml = simplexml_load_file($urls);
            $progressBar = $this->output->createProgressBar(count($xml), 1000);
            $progressBar->setFormat(' %current%/%max% [%bar%] %percent:3s%% %memory:6s%');
            foreach ($xml->channel->item as $item) {
                DB::table('items')->insert([
                    'title'         => $item->title,
                    'description'   => $item->description,
                    'link'          => $item->link,
                    'comments'      => $item->comments,
                    'category'      => $item->category
                ]);
                $progressBar->advance();
                usleep(1000);
            }
            $progressBar->finish();
            $this->info(" Fetch data from XML successfully.");
        } catch (\Throwable $th) {
            Log::debug();
        }
    }
}
