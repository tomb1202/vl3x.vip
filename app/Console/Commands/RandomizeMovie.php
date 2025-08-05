<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;
use Carbon\Carbon;

class RandomizeMovie extends Command
{
    protected $signature = 'movies:randomize';

    protected $description = 'Random created_at và updated_at cho các phim có hidden = 0';

    public function handle()
    {
        $days = 10;
        $this->info("Bắt đầu random timestamps trong $days ngày gần đây cho phim (hidden = 0)...");

        $movies = Movie::where('hidden', 0)->get();
        $bar = $this->output->createProgressBar($movies->count());
        $bar->start();

        foreach ($movies as $movie) {
            // Random thời gian trong khoảng X ngày gần đây
            $randomCreated = Carbon::now()->subDays(rand(0, $days))->setTime(rand(0, 23), rand(0, 59), rand(0, 59));
            $randomUpdated = $randomCreated->copy()->addDays(rand(0, 30))->setTime(rand(0, 23), rand(0, 59), rand(0, 59));

            // Đảm bảo updated_at không trước created_at
            if ($randomUpdated->lt($randomCreated)) {
                $randomUpdated = $randomCreated->copy()->addHours(rand(1, 48));
            }

            $movie->created_at = $randomCreated;
            $movie->updated_at = $randomUpdated;
            $movie->saveQuietly();

            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("Đã random timestamps cho {$movies->count()} phim!");
    }
}
