<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\Activity;
use App\Models\Workday;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class RegisteredActivities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:activities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia el numero de actividades creadas ';

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
        /*
        // Cotador de actividades creada en un dia 
        $totalActivities = \DB::table('activities')
        ->whereRaw('Date(created_at) = CURDATE()')
        ->count();
        \Log::info($totalActivities);*/

        $currentDate = Carbon::today();
        //\Log::info($currentDate);

        // Obtener los registros que son anteriores al día actual
        //$registrosAntiguos = Workday::where('date_work', '<', $currentDate)->get();

        // Obtener los registros y cambiar la descripcion del dia de trabajo 
        //$registrosAntiguos = Workday::where('date_work', '<', $currentDate)->update(['description' => 'No realizada']);
       
       
        /*BORRADOR
        $registrosAntiguos = Workday::where('date_work', '<', $currentDate)
        ->update(['activities.status' => 'No realizada'])
        ->whereID ('activities.workday_id','workday.id');
        */
        $registrosAntiguos = DB::table('workdays')
        ->join('activities', 'workdays.id', '=', 'activities.workday_id')
        ->where('workdays.date_work', '<', $currentDate)
        ->where('activities.status', 'pendiente')
        ->update(['activities.status' => 'No realizada']);

        Log::info($registrosAntiguos);
        
        //pluc
        //where id in

    }
}
