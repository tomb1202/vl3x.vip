<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Symfony\Component\HttpClient\HttpClient;
use Goutte\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $slugRaw = 'NHDTC-093';
        $title = "NHDTC-093 A multi-talented woman (former model) and her attendant (big tits) who use a matching app to recruit dull men are defeated with creampie";
        $description = "NHDTC-093 A multi-talented woman (former model) and her attendant (big tits) who use a matching app to recruit dull men are defeated with creampie";

        $rewrite = rewriteMovie($title, $description);

        dd($rewrite);
    }
}
