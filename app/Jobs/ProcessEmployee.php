<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Employee;

class ProcessEmployee implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use Queueable;

    /**
     * Create a new job instance.
     */
 public function __construct(public array $employeeData)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $exists = Employee::where('id', $this->employeeData['id'])->exists();

        if (!$exists) {
            Employee::create([
                'name' => $this->employeeData['employee_name'],
                'salary' => $this->employeeData['employee_salary'],
                'age' => $this->employeeData['employee_age'],
                'profile_picture' => $this->employeeData['profile_image']
            ]);
        }
    }
}


