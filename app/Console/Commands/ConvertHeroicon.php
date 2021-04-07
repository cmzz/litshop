<?php

namespace LitShop\Console\Commands;

use Illuminate\Console\Command;

class ConvertHeroicon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tool:codegen:icon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert heriocons svg to icon templates.';

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
        $path = resource_path('heroicons/outline/');
        $dst = resource_path('views/components/icon/');

        foreach (glob($path."*.svg") as $filename) {
            $contents = file_get_contents($filename);
            $s = '<svg {{ $attributes->merge([\'class\' => \'inline-block w-5 h-5\']) }} fill="none" stroke="currentColor" aria-hidden="true" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">';
            $contents = preg_replace('/(<svg.*>)/iUs', $s, $contents);

            $iconName = basename($filename, '.svg');

            echo "$filename => " . $iconName . ".blade.php \n";

            file_put_contents($dst.$iconName.'.blade.php', $contents);
        }

        return 0;
    }
}
