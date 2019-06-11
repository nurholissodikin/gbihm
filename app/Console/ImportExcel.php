<?php

namespace App\Console\Commands;

use App\Imports\PengerjaImport;
use Illuminate\Console\Command;

class ImportExcel extends Command
{
    protected $signature = 'import:excel';

    protected $description = 'Laravel Excel importer';

    public function handle()
    {
        $this->output->title('Starting import');
        (new PengerjaImport)->withOutput($this->output)->import('users.xlsx');
        $this->output->success('Import successful');
    }
}