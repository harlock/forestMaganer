<?php

namespace App\Http\Livewire;

use App\Models\Application;
use App\Models\Orchard;
use App\Models\Dose;
use App\Models\RegistrationPhenophase;
use App\Models\Workday;
use App\Models\TypeJob;
use App\Models\Activity;
use App\Models\ApplicationMode;
use App\Models\ChemicalElement;
use App\Models\NutrientAnalysi;
use App\Models\Supplie;
use App\Models\ProductCategory;
use App\Models\Unit;
use App\Models\MarkSupplie;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use PhpParser\Node\Expr\FuncCall;

class CalendarController extends Component
{
    use WithFileUploads;

    public $mess, $dia, $mes_actual, $fecha_completa;
    public $data, $mesingles, $mespanish, $lastmosth, $nextmonth;
    public $user_id, $id_orchard, $datos_orchard;

    public $phenophases, $month, $cont;

    public  $modalworkday = 0,  $modal = 0, $clickedit = 0;

    public $isconfirm = 0, $getid = 0;

    public $workdays, $workday_id, $date_work, $general_expenses, $description, $idfinal, $finaldate;
    public $clicksave = true;

    public $activities, $activities_id, $type_job_id, $cost, $activitiesxday, $table_activities, $dia_mes;

    public $application_id, $application_modes, $aplication_workday_id, $application_mode_id, $day_aplication, $type_job, $date, $note, $id_actividad;
    public $modalApplication = false;

    public $idfinal_app, $dose_id, $app_id, $supplie_id, $unit_id, $dose, $data_dose;
    public $modalDose = false, $table_doses=false;

    public $nutrient_analysis, $nutrient_analysi_id, $date_sample, $path_nutrient_analysi, $data_view;
    public $modalnutrient_analysi = 0, $modalview_nutrient_analysi = 0;

    public $supplies, $name_supplie, $n_registry_supplie, $data_sheet_supplie, $security_supplie, $product_category_id_supplie;
    public $modalsupplie = 0,$modalaplication = false,$aplication_mode_id,$general_supplies;
    public $activity_workday_id,$modalview_supplies =false,$data_supplie=0,$id_view_supplie_safety=0,$modalview_supplies_safety=false;
    public $supplements_modal=false,$modelo;
    public function render()
    {
        $datos_orchard = $this->datos_orchard;

        $this->mess = date("m");
        $this->dia = date("d");
        $this->mes_actual = $this->month_actual($this->mess);
        $this->fecha_completa = date("Y-m-d");

        $data = $this->data;
        //dd($data);
        $mesingles = $this->mesingles;
        $mespanish = $this->mespanish;
        $this->lastmosth = $data['last'];
        $this->nextmonth = $data['next'];

        $this->phenophases = $this->fenofase();
        //dd($this->phenophases);
        $this->cont = count($this->phenophases);
        $this->workdays = $this->workday();
        //dd($this->workdays);
        $this->activities = $this->activitiesxmes();
        //dd($this->activities);
        $this->nutrient_analysis = $this->nutrient_analysi();
        //dd($this->nutrient_analysis);
        $this->general_supplies = $this->supplies();

        return view('livewire.calendar_orchards.calendar-controller', [
            'datos_orchard' => $datos_orchard,
            'data' => $data,
            'mesingles' => $mesingles,
            'mespanish' => $mespanish,
            'type_jobs' => TypeJob::all(),
            'produc_category' => ProductCategory::all(),
            'workdays' => Workday::all(),
            'applicationMode' => ApplicationMode::all(),

            'applications' => Application::all(),
            'chemical_elements' => ChemicalElement::all(),
            'units' => Unit::all(),
            'dose' => Dose::all(),
            'supplie' => Supplie::all(),
        ]);
    }

    public function mount($id)
    {
        $this->id_orchard = $id;
        $this->datos_orchard = Orchard::findOrFail($this->id_orchard);
        $this->user_id = Auth::id();
        $this->calendario();
    }
/////////////////////////////////////////////////////////////////////CALENDARIO
    public function calendario()
    {
        $month = date("Y-m");
        //dd($month); //Obtenemos el mes y año en el que estamos de tipo entero
        $this->data = $this->calendar_month($month);
        //dd($this->data); //Obtenemos el mes-año aterior, el mes-año actual, el mes-año siguiente y el calendario de el mes actual por semana y dia y el dia tiene mes-dia-fecha
        $this->mesingles = $this->data['month'];
        //dd($this->mesingles); //Obtenemos el nombre del mes actual en ingles
        // obtener mes en espanol
        $this->mespanish = $this->spanish_month($this->mesingles);
        //dd($this->mespanish); //Obtenemos el nombre del mes actual en español
        $this->mesingles = $this->data['month'];
        //dd($this->mesingles); //Obtenemos el nombre del mes actual en ingles
        $this->render();
    }
    public function last_year()
    {
        //dd('entra al mes anterior');
        $this->data = $this->calendar_month($this->lastmosth);
        $this->mesingles = $this->data['month'];
        // obtener mes en espanol
        $this->mespanish = $this->spanish_month($this->mesingles);
        $this->mesingles = $this->data['month'];
        //return redirect('livewire.calendar_orchards.calendar-controller');
        $this->render();
    }
    public function next_year()
    {
        //dd('entra al mes posterior');
        $this->data = $this->calendar_month($this->nextmonth);
        $this->mesingles = $this->data['month'];
        // obtener mes en espanol
        $this->mespanish = $this->spanish_month($this->mesingles);
        $this->mesingles = $this->data['month'];

        $this->render();
    }
    public static function calendar_month($month)
    {
        //$mes = date("Y-m");
        $mes = $month;
        //dd($mes);
        //sacar el ultimo de dia del mes
        $daylast =  date("Y-m-d", strtotime("last day of " . $mes));
        //dd($daylast);
        //sacar el dia de dia del mes
        $fecha      =  date("Y-m-d", strtotime("first day of " . $mes));
        //dd($fecha);
        $daysmonth  =  date("d", strtotime($fecha));
        $montmonth  =  date("m", strtotime($fecha));
        $yearmonth  =  date("Y", strtotime($fecha));
        //dd($yearmonth);
        // sacar el lunes de la primera semana
        $nuevaFecha = mktime(0, 0, 0, $montmonth, $daysmonth, $yearmonth);
        //dd($nuevaFecha);
        $diaDeLaSemana = date("w", $nuevaFecha);
        $nuevaFecha = $nuevaFecha - ($diaDeLaSemana * 24 * 3600); //Restar los segundos totales de los dias transcurridos de la semana
        $dateini = date("Y-m-d", $nuevaFecha);
        //$dateini = date("Y-m-d",strtotime($dateini."+ 1 day"));
        // numero de primer semana del mes
        //dd($fecha);
        if (date("m", strtotime($fecha)) == 1) {
            $semana1 = 1;
        } else {
            $semana1 = date("W", strtotime($fecha));
        }
        // numero de ultima semana del mes
        $semana2 = date("W", strtotime($daylast));
        // semana todal del mes
        //dd($semana1);
        // en caso si es diciembre
        if (date("m", strtotime($mes)) == 12) {
            $semana = 5;
        } else {
            $semana = ($semana2 - $semana1) + 1;
        }
        //dd($semana);
        // semana todal del mes
        $datafecha = $dateini;
        $calendario = array();
        //dd($calendario);
        $iweek = 0;
        while ($iweek < $semana) :
            $iweek++;
            //echo "Semana $iweek <br>";
            //
            $weekdata = [];
            for ($iday = 0; $iday < 7; $iday++) {
                // code...
                $datafecha = date("Y-m-d", strtotime($datafecha . "+ 1 day"));
                $datanew['mes'] = date("M", strtotime($datafecha));
                $datanew['dia'] = date("d", strtotime($datafecha));
                $datanew['fecha'] = $datafecha;
                //AGREGAR CONSULTAS EVENTO
                //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                array_push($weekdata, $datanew);
            }
            $dataweek['semana'] = $iweek;
            $dataweek['datos'] = $weekdata;
            //dd($dataweek);
            //$datafecha['horario'] = $datahorario;
            array_push($calendario, $dataweek);
        endwhile;
        $nextmonth = date("Y-M", strtotime($mes . "+ 1 month"));
        $lastmonth = date("Y-M", strtotime($mes . "- 1 month"));
        $month = date("M", strtotime($mes));
        $yearmonth = date("Y", strtotime($mes));
        //$month = date("M",strtotime("2019-03"));
        $data = array(
            'next' => $nextmonth, //obtenemos el mes-año siguiente
            'month' => $month, //obtenemos el mes actual
            'year' => $yearmonth, //obtenemos el año actual
            'last' => $lastmonth, //obtenemos el mes-año anterior
            'calendar' => $calendario, //Obtenemos los dias con
        );
        return $data;
    }
    public static function spanish_month($month)
    {
        $mes = $month;
        if ($month == "Jan") {
            $mes = "Enero";
        } elseif ($month == "Feb") {
            $mes = "Febrero";
        } elseif ($month == "Mar") {
            $mes = "Marzo";
        } elseif ($month == "Apr") {
            $mes = "Abril";
        } elseif ($month == "May") {
            $mes = "Mayo";
        } elseif ($month == "Jun") {
            $mes = "Junio";
        } elseif ($month == "Jul") {
            $mes = "Julio";
        } elseif ($month == "Aug") {
            $mes = "Agosto";
        } elseif ($month == "Sep") {
            $mes = "Septiembre";
        } elseif ($month == "Oct") {
            $mes = "Octubre";
        } elseif ($month == "Nov") {
            $mes = "Noviembre";
        } elseif ($month == "Dec") {
            $mes = "Diciembre";
        } else {
            $mes = $month;
        }
        return $mes;
    }
    public function month_actual($month)
    {
        $mes = '';
        if ($month == "01") {
            $mes = "Jan";
        } elseif ($month == "02") {
            $mes = "Feb";
        } elseif ($month == "03") {
            $mes = "Mar";
        } elseif ($month == "04") {
            $mes = "Apr";
        } elseif ($month == "5") {
            $mes = "May";
        } elseif ($month == "06") {
            $mes = "Jun";
        } elseif ($month == "07") {
            $mes = "Jul";
        } elseif ($month == "08") {
            $mes = "Aug";
        } elseif ($month == "09") {
            $mes = "Sep";
        } elseif ($month == "10") {
            $mes = "Oct";
        } elseif ($month == "11") {
            $mes = "Nov";
        } elseif ($month == "12") {
            $mes = "Dec";
        }
        return $mes;
    }
    ///////////////////////Para confirmar la eliminacion de un dia de trabajo, aun no se usan///////////////////////////
    public function openModaldelete()
    {
        $this->isconfirm = true;
    }
    public function closeModaldelete()
    {
        $this->isconfirm = false;
    }
  
    public function ConfirmaDelete($id)
    {
        $this->openModaldelete();
        $this->getid = $id;
    }

    //FENOFASES---------------------------------------------------------------------------------------------------------
    public function fenofase()
    {
        $datos = RegistrationPhenophase::join("orchards", "orchards.id", "registration_phenophases.orchard_id")
            ->where("registration_phenophases.orchard_id", $this->id_orchard)
            ->get();
        return $datos;
    }

    // FUNCIONES PARA LOS DIAS DE TRABAJO y ACTIVIDADES
    public function workday()
    {
        $datos = Workday::join("orchards", "orchards.id", "workdays.orchard_id")
            ->join("users", "users.id", "workdays.user_id")
            ->where("workdays.orchard_id", $this->id_orchard)
            ->where("users.id", $this->user_id)
            ->select("workdays.*")
            ->get();
        //$datos=DB::table("workdays")->where("orchard_id",$this->idd)->get();
        return $datos;
    }
    public function supplies()
    {
        
        $general_supplies = Supplie::all();
        return $general_supplies;
        return view('livewire.calendar_orchards.supplements_view', [
            'product_categories' => ProductCategory::all(),
            'mark_supplies' => MarkSupplie::all(),
        ]);
    }
    public  function activitiesxday($id)
    {
        $datos = Activity::join('workdays', 'workdays.id', 'activities.workday_id')
            ->join('type_jobs', 'type_jobs.id', 'activities.type_job_id')
            ->where("workdays.orchard_id", $this->id_orchard)
            ->where("workdays.id", $id)
            ->select('activities.*')
            ->get();
        return $datos;
    }
    public function activitiesxmes()
    {
        $datos = Activity::join('workdays', 'workdays.id', 'activities.workday_id')
            ->join('type_jobs', 'type_jobs.id', 'activities.type_job_id')
            ->where("workdays.orchard_id", $this->id_orchard)
            ->select('activities.*')
            ->get();
        return $datos;
    }
    public function storeworkday()
    {
        $this->validate([
            'user_id' => 'required',
            'date_work' => 'required',
            'general_expenses' => 'required',
            'description' => 'required',
        ]);
        Workday::updateOrCreate(['id' => $this->workday_id], [
            'user_id' => $this->user_id,
            'orchard_id' => $this->id_orchard,
            'date_work' => $this->date_work,
            'general_expenses' => $this->general_expenses,
            'description' => $this->description,
        ]);
        $this->idfinal = Workday::latest('id')->first();
        $this->finaldate = Workday::latest('date_work')->first();
        $this->clicksave = false;
    }
    public function final_store(){
        $this->idfinal = Workday::latest('id')->first();
        $this->activity_workday_id = $this->idfinal->id;
        $sql = "CALL rest_activity($this->activity_workday_id)";
        DB::select(DB::raw($sql));

        //dd(DB::select(DB::raw($sql)));
        
    }
    public function storeactiviti()
    {


        $this->validate([
            'type_job_id' => 'required',
            'cost' => 'required',

        ]);
        Activity::updateOrCreate(['id' => $this->activities_id], [
            'workday_id' => $this->idfinal->id,
            'type_job_id' => $this->type_job_id,
            'cost' => $this->cost,
            'status' => 'pendiente',
            
        ]);
        if ($this->type_job_id == "5" || $this->type_job_id == "6") {
            $this->modalApplication = true;
        } 

        $this->type_job_id = '';
        $this->cost = '';

        $this->activitiesxday = $this->activitiesxday($this->idfinal->id);
        //dd($this->activitiesxday );
        $this->table_activities = true;

        
          
    }
    public function storeDose()
    {
        $this->validate([
            'supplie_id' => 'required',
            'unit_id' => 'required',
            'dose' => 'required',
        ]);
        Dose::updateOrCreate(['id' => $this->dose_id], [
            'application_id' => $this->idfinal_app->id,
            'supplie_id' => $this->supplie_id,
            'unit_id' => $this->unit_id,
            'dose' => $this->dose,
        ]);
        $this->modalDose = false;
        $this->idfinal_app = Application::latest('id')->first();
        
    }
    public function openDose()
    {
        $this->modalDose = true;
    }
    public function close_create_dose()
    {
        $this->supplie_id = '';
        $this->unit_id = '';
        $this->dose = '';
        $this->modalDose = false;
    }
    public function changeValueCombo()
    {
        if ($this->type_job_id == "5" || $this->type_job_id == "6") {
            $this->modalApplication = true;
        } else {
            $this->modalApplication = false;
        }
    }
    public  function data_dose($id)
    {
        $datos = Dose::join('applications', 'applications.id', 'doses.application_id')
            ->join('supplies', 'supplies.id', 'doses.supplie_id')
            ->join('workdays', 'workdays.id', 'applications.workday_id')
            ->where("workdays.orchard_id", $this->id_orchard)
            ->where("workdays.id", $id)
            ->select('doses.*')
            ->get();
        return $datos;
    }
    public function store_application()
    {
        $this->validate([
            'application_mode_id' => 'required',
            'note' => 'required',
            'supplie_id' => 'required',
            'dose' => 'required',
        ]);
        Application::updateOrCreate(['id' => $this->application_id], [
            'workday_id' => $this->idfinal->id,
            'application_mode_id' => $this->application_mode_id,
            'date' => $this->finaldate->date_work,
            'note' => $this->note,
        ]);
        $this->idfinal_app = Application::latest('id')->first();
        
        Dose::updateOrCreate(['id' => $this->dose_id], [
            'application_id' => $this->idfinal_app->id,
            'supplie_id' => $this->supplie_id,
            'dose' => $this->dose,
        ]);


        $this->data_dose = $this->data_dose($this->idfinal->id);
        $this->workday_id = '';
        $this->application_mode_id = '';
        $this->date = '';
        $this->note = '';
        $this->supplie_id = '';
        $this->dose = '';
        $this->table_doses = true;
    }

    public function deleteApp($id_dose,$id_app)
    {
        //dd($id_dose,$id_app);
        Dose::find($id_dose)->delete();
        Application::find($id_app)->delete();
        if ($this->id_dose && $this->id_app ) {
            $this->supplements_modal = true;
        } 
        $this->supplements_modal=true;
        $this->emit('modeloRecargado');

    }
    public function recargarModelo()
    {
    }

    public function open_create_application()
    {
        $this->modalApplication = true;
    }

    public function close_create_application()
    {
        $this->workday_id = '';
        $this->application_mode_id = '';
        $this->date = '';
        $this->note = '';
        $this->modalApplication = false;
    }

    public function do_activiti($id_activiti, $id_workday)
    {
        Activity::updateOrCreate(['id' => $id_activiti], [
            'status' => 'realizado'
        ]);
        $this->activitiesxday = $this->activitiesxday($id_workday);
    }
    public function do_worday_activiti_aplication()
    {
        $this->validate([
            'aplication_mode_id' => 'required',
            'note' => 'required',
        ]);
        Application::updateOrCreate(['id' => $this->application_id], [
            'workday_id' => $this->aplication_workday_id,
            'application_mode_id' => $this->aplication_mode_id,
            'date' => $this->date_work,
            'note' => $this->note,
        ]);
        
        $this->do_activiti($this->id_actividad, $this->aplication_workday_id);
        $this->closemodalaplication();
    }
    //Funciones para Analicis Nutricional
    public function nutrient_analysi()
    {
        $datos = NutrientAnalysi::join('orchards', 'orchards.id', 'nutrient_analysis.orchard_id')
            ->where("nutrient_analysis.orchard_id", $this->id_orchard)
            ->select("nutrient_analysis.*")
            ->get();
        return $datos;
    }
    public function save_nutrient_analisi()
    {
        //dd('Entra a la funcion para guardar el path');
        $this->validate([
            'date_sample' => 'required',
            'path_nutrient_analysi' => 'required'
        ], [
            'path.required' => 'Agrega el archivo.',
            'path.max' => 'El archivo no debe ser mayor a 5mb.',
            'path.mimes' => 'El archivo debe ser un PDF',
        ]);
        $this->path_nutrient_analysi = $this->path_nutrient_analysi->store('file_nutrient_analysis', 'public');
        NutrientAnalysi::updateOrCreate(['id' => $this->nutrient_analysi_id], [
            'orchard_id' => $this->id_orchard,
            'date_sample' => $this->date_sample,
            'path' => $this->path_nutrient_analysi,
        ]);
        $this->closemodalnuetrient_analysis();
    }
    public function download_pdf($path)
    {
        $file = NutrientAnalysi::where('path', $path)->firstOrFail();
        $path_file = storage_path('app/public' . $file->path);
        return response()->download($path_file);
    }
    //->->->->->->->->->->->->->->->->->->->->->->->->->->-MODALES Y BANDERAS>->->->->->->->->->->->->->->->->->->->->->
    //Modal para agregar un dia de trabajo
    public function openmodal($fecha)
    {
        $this->date_work = $fecha;
        $this->modal = true;
        $this->modalworkday = true;
    }
    public function closemodal()
    {
        $this->workday_id = '';
        $this->idfinal = '';
        $this->date_work = '';
        $this->description = '';
        $this->general_expenses = '';
        $this->clicksave = true;
        $this->table_activities = false;
        $this->table_doses = false;
        $this->clickedit = false;
        $this->modalworkday = false;
        $this->modal = false;
        $this->modalApplication = false;
    }
    //Despues de agregrar el dia de trabajo, agregar las actividades
    public function openmodalworkday()
    {
        $this->modalworkday = true;
    }
    public function closemodalworkday()
    {
        $this->general_expenses = '';
        $this->modalworkday = false;
    }
    //modales para agregar una aplicacion de actividad
    
    public function openmodalsupplements($id_workday,$type_job, $activiti_id){
        

        $this->application_modes=ApplicationMode::all();
        $this->aplication_workday_id=$id_workday;
        $this->type_job=$type_job;
        $this->day_aplication=date('Y-m-d');
        $this->id_actividad=$activiti_id;
        $this->data_dose = $this->data_dose($id_workday);
        $this->supplements_modal=true;
        $this->table_doses = true;
    }
    public function close_modal_supplies(){
        $this->supplements_modal=false;
        $this->table_doses = false;
    }
    public function closemodalaplication(){
        $this->application_id='';
        $this->aplication_workday_id='';
        $this->aplication_mode_id='';
        $this->type_job='';
        $this->day_aplication='';
        $this->note='';
        $this->id_actividad='';
        $this->modalaplication=false;
    }
    //Modales para Analicis Nutricional
    public function openmodalnuetrient_analysis($fecha)
    {
        $this->date_sample = $fecha;
        $this->modalnutrient_analysi = true;
    }
    public function closemodalnuetrient_analysis()
    {
        $this->modalnutrient_analysi = false;
        $this->date_sample = 0;
        $this->path_nutrient_analysi = 0;
    }
    public  function openmodalview_nuetrient_analysis($id)
    {
        $id_view = NutrientAnalysi::findOrFail($id);
        $this->data_view = $id_view;
        $this->modalview_nutrient_analysi = true;
    }
    
    public  function closemodalview_nuetrient_analysis()
    {
        $this->modalview_nutrient_analysi = false;
        $this->data_view = 0;
    }
    public  function openmodalview_supplies_data($id)
    {
        $id_view_supplie = Supplie::findOrFail($id);
        $this->data_supplie = $id_view_supplie;
        $this->modalview_supplies = true;
    }
    
    public  function closemodalview_supplies_data()
    {
        $this->modalview_supplies = false;
        $this->data_supplie = 0;
    }
    public  function openmodalview_supplies_safety($id)
    {
        $id_view_supplie_safety = Supplie::findOrFail($id);
        $this->data_supplie = $id_view_supplie_safety;
        $this->modalview_supplies_safety = true;
    }
    
    public  function closemodalview_supplies_safety()
    {
        $this->modalview_supplies_safety= false;
        $this->data_supplie = 0;
    }
}
