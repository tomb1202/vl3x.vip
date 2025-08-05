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
        $this->info("Bắt đầu random timestamps cho phim (hidden = 0)...");

        // Lấy tất cả phim hidden = 0
        $movies = Movie::where('hidden', 0)->get();

        if ($movies->isEmpty()) {
            $this->warn("Không có phim nào để random!");
            return;
        }

        $bar = $this->output->createProgressBar($movies->count());
        $bar->start();

        // Lấy phim cuối cùng (mới nhất) để set now
        $latestMovie = $movies->last();

        foreach ($movies as $movie) {
            if ($movie->id === $latestMovie->id) {
                // Phim mới nhất: set timestamps = now()
                $movie->created_at = now();
                $movie->updated_at = now();
            } else {
                // Random trong quá khứ 1 ngày
                $randomCreated = Carbon::now()->subHours(rand(1, 24))->setMinute(rand(0, 59))->setSecond(rand(0, 59));
                $randomUpdated = $randomCreated->copy()->addHours(rand(0, 12))->setMinute(rand(0, 59))->setSecond(rand(0, 59));

                if ($randomUpdated->lt($randomCreated)) {
                    $randomUpdated = $randomCreated->copy()->addHours(rand(1, 6));
                }

                $movie->created_at = $randomCreated;
                $movie->updated_at = $randomUpdated;
            }

            $movie->saveQuietly();
            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("Đã random timestamps cho {$movies->count()} phim! Phim mới nhất được set thời gian now().");
    }
}
