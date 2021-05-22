<?php

namespace App\Console\Commands;

use App\Services\ImageToText;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\SignalableCommandInterface;

class ConvertImageToText extends Command implements SignalableCommandInterface
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laratext:convert {--image-address=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert images to text';

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
     * @return int
     */
    public function handle()
    {
        $imageAddress = $this->option('image-address');
        if(empty($imageAddress)) {
            $imageAddress = $this->ask('Type your image address absolutely');
        }
        $this->line(ImageToText::getTextFromImage($imageAddress));
        return 0;
    }

    /**
     * Get the list of signals handled by the command.
     *
     * @return array
     */
    public function getSubscribedSignals(): array
    {
        return [SIGINT, SIGTERM];
    }

    /**
     * Handle an incoming signal.
     *
     * @param int $signal
     * @return void
     */
    public function handleSignal(int $signal): void
    {
        if ($signal === SIGINT || $signal === SIGTERM) {
            printf('Terminating ...'.PHP_EOL);
            exit(0);
        }
    }
}
