<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Jobs\ProcessEmployee;

class FetchDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-data-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('http://dummy.restapiexample.com/api/v1/employees');

        if ($response->successful()) {
            $employees = $response->json()['data'];
            
            foreach ($employees as $employee) {
             ProcessEmployee::dispatch($employee);
            }

            $this->info(count($employees).' empleados agregados a la cola de trabajos');
        } else {
            $this->error('Error al obtener datos de la API');
        }
    }
}
