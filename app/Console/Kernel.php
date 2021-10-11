<?php

namespace App\Console;
use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function () {
            
            /*$area_limit = DB::table('area_limit')->select(DB::raw('area_id, running_area'))->where(['running_area'=>1,'status'=>1])->first();

            $area_limit_next = DB::table('area_limit')->select(DB::raw('area_id, running_area'))
            ->where('running_area',0)
            ->where('status',1)
            ->orderBy(DB::raw('RAND()'))
            ->first();

            DB::transaction(function () use($area_limit_next,$area_limit){
                DB::table('area_limit')->where('area_id',$area_limit_next->area_id)->update(['running_area' => 1]);
                DB::table('area_limit')->where('area_id',$area_limit->area_id)->update(['running_area' => 0]);
            });*/

            $ivr_jars = DB::select("select id,ivr_jar_count(range_min,range_max,gender) counted from ivr_jar;
");
            DB::transaction(function () use($ivr_jars){
                
                foreach($ivr_jars as $ivr_jar){

                    $status = $ivr_jar->counted >= 385 ? 1:0;
                    
                    DB::table('ivr_jar')
                    ->where('id', $ivr_jar->id)
                    ->update(array('done_limit' => $ivr_jar->counted,'status'=>$status));
                    
                }
            });

            $data = \App\Models\IvrJar::all()->toArray();
            \Storage::disk('public')->put('js/ivr_jar.json', json_encode($data));

        }); 
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
