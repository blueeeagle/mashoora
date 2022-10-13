<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Schedule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DateTime;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function getslots($schedules){
        $event = [];
        foreach ($schedules as $key => $value) {
            if($value->schedule_type == 0){
                $eve = $this->StandardGenerateslot($value);
                $event = array_merge($event,$eve);
            }
            if($value->schedule_type == 1){
                $eve = $this->VariantGenerateslot($value);
                $event = array_merge($event,$eve);
            }
        }
        return $event;
    }

    function getslotsApi($schedules,$type){
        $event = [];
        $this->type = $type;
        foreach ($schedules as $key => $value) {
            if($value->schedule_type == 0){
                $eve = $this->StandardGenerateslot($value);
                $event = array_merge($event,$eve);
            }
            if($value->schedule_type == 1){
                $eve = $this->VariantGenerateslot($value);
                $event = array_merge($event,$eve);
            }
        }
        return $event;
    }

    function StandardGenerateslot($schedules){
        $days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
        $event = [];
        $ScheduleData = [];
        $currntDay = strtotime($schedules->from_date);
        $toDay = strtotime($schedules->recurring);
        $schedule = json_decode($schedules->schedule);
        
        foreach ($schedule as $key => $value) {
            $store = [];

            if(!isset($value->day)) continue;
            foreach ($value->kt_docs_repeater_nested_inner as $key2 => $temp) {
                
                $description = [];
                //API
                if(isset($this->type)){
                    $append = false;
                    if(isset($temp->video) && $this->type == 'video') { $description[] = 'Video'; $append = true; }
                    if(isset($temp->voice) && $this->type == 'voice') { $description[] = 'Voice'; $append = true; }
                    if(isset($temp->text) && $this->type == 'text') { $description[] = 'Text'; $append = true; }
                    if(isset($temp->direct) && $this->type == 'direct') { $description[] = 'Direct'; $append = true; }
                    if($append){
                        $store[] = ['description'=> \implode(", ",$description)." Schedule",'from'=>$temp->from,'to'=>$temp->to,'title'=>$days[$key].' Schedule','key'=>$key.'-'.$key2];
                    }
                }
                //Web
                else{
                    if(isset($temp->video)) { $description[] = 'Video'; }
                    if(isset($temp->voice)) { $description[] = 'Voice'; }
                    if(isset($temp->text)) { $description[] = 'Text'; }
                    if(isset($temp->direct)) { $description[] = 'Direct'; }

                    $store[] = ['description'=> \implode(", ",$description)." Schedule",'from'=>$temp->from,'to'=>$temp->to,'title'=>$days[$key].' Schedule','key'=>$key.'-'.$key2];
                }
            }
            $ScheduleData[] = [$days[$key] => $store];
        }

        for ( $i = $currntDay; $i <= $toDay; $i = $i + 86400 ) {

            $thisDate = date( 'D', $i );
            
            if(!isset($ScheduleData[$this->getDateKey($thisDate)])) continue;

            foreach($ScheduleData[$this->getDateKey($thisDate)] as $temps){
                foreach ($temps as $key => $temp) {
                    # code...
                    $event[] = [
                        'id' => $schedules->id.'-'.$temp['key'],
                        'title' => $temp['title'],
                        'start' => date("Y-m-d", $i).'T'.$temp['from'],
                        'end' => date("Y-m-d", $i).'T'.$temp['to'],
                        'description' => $temp['description'],
                        'className' => "fc-event-danger fc-event-solid-warning",
                        // 'location' => 'Federation Square',
                    ];
                }

            }
        }
        
        return $event;
    }

    function VariantGenerateslot($schedules){

        $event = [];
        $ScheduleData = [];
        $currntDay = strtotime($schedules->from_date);
        $toDay = strtotime($schedules->to_date);
        $schedule = json_decode($schedules->schedule);

        foreach ($schedule as $key => $value) {
            $store = [];

            if(!isset($value->day)) continue;
            foreach ($value->kt_docs_repeater_nested_inner as $key2 => $temp) {

                $description = [];
                //Api
                if(isset($this->type)){
                    $append = false;
                    if(isset($temp->video) && $this->type == 'video') { $description[] = 'Video'; $append = true; }
                    if(isset($temp->voice) && $this->type == 'voice') { $description[] = 'Voice'; $append = true; }
                    if(isset($temp->text) && $this->type == 'text') { $description[] = 'Text'; $append = true; }
                    if(isset($temp->direct) && $this->type == 'direct') { $description[] = 'Direct'; $append = true; }

                    if($append){
                        $store[] = ['description'=> \implode(", ",$description)." Schedule",'from'=>$temp->from,'to'=>$temp->to,'title'=>'Schedule','key'=>$key.'-'.$key2];
                    }
                }
                //Web
                else{
                    $append = false;
                    if(isset($temp->video)) { $description[] = 'Video';}
                    if(isset($temp->voice)) { $description[] = 'Voice';}
                    if(isset($temp->text)) { $description[] = 'Text';}
                    if(isset($temp->direct)) { $description[] = 'Direct';}

                    $store[] = ['description'=> \implode(", ",$description)." Schedule",'from'=>$temp->from,'to'=>$temp->to,'title'=>'Schedule','key'=>$key.'-'.$key2];
                }
            }
            $ScheduleData[] = $store;
        }

        $no = 0;
        for ( $i = $currntDay; $i <= $toDay; $i = $i + 86400 ) {

            if(!isset($ScheduleData[$no])) continue;
            foreach($ScheduleData[$no] as $key => $temp){
                # code...
                $event[] = [
                    'id' => $schedules->id.'-'.$temp['key'], 
                    'title' => $temp['title'],
                    'start' => date("Y-m-d", $i).'T'.$temp['from'],
                    'end' => date("Y-m-d", $i).'T'.$temp['to'],
                    'description' => $temp['description'],
                    'className' => "fc-event-danger fc-event-solid-warning",
                    // 'location' => 'Federation Square',
                ];
            }
            ++$no;
        }
        return $event;
    }

    function change_to_API_fORMET($DATA,$consultant){
        $loopdate = 14;
        $loopingSlot = 200;
        $event = [];
        $mor = [strtotime("5:00"),strtotime("11:59:59")];
        $aft = [strtotime("12:00"),strtotime("16:59:59")];
        $eve = [strtotime("17:00"),strtotime("20:59:59")];

        foreach ($DATA as $key => $value) {
            # code...
            
            $start_strtotime = strtotime($value['start']);
            $end_strtotime = strtotime($value['end']);
            $dummu;
            
            if(strtotime($value['start']) < strtotime(date("Y-m-dTH:i"))) continue;
            $date = date_create($value['start']);

            if(!isset($event[date_format($date,"y/M/d")])){
                $dummu = array(date_format($date,"y/M/d") => ['Morning'=>[],'Afternoon'=>[],'Evening'=>[],'Night '=>[]]);
                $event += $dummu;
                // $event[date_format($date,"y/M/d")] = ['Morning'=>[],'Afternoon'=>[],'Evening'=>[],'Night '=>[]];
            }
            $slor = 0;
            for ($i = $start_strtotime; $start_strtotime <= $end_strtotime ; $start_strtotime = $start_strtotime+(60*$consultant->preferre_slot)) {
                
                $day = $start_strtotime;
                $date = date_create(date('Y-m-dTH:i',$start_strtotime));
                
                $day = strtotime(date_format($date,"H:i:s"));
                if($day >= $mor[0]  && $day <= $mor[1]) $event[date_format($date,"y/M/d")]['Morning'][] = ['id'=>$value['id'].'-'.$slor,'time'=>date_format($date,"h:i:s a")];
                else if($day >= $aft[0] && $day <= $aft[1]) $event[date_format($date,"y/M/d")]['Afternoon'][] = ['id'=>$value['id'].'-'.$slor,'time'=>date_format($date,"h:i:s a")];
                else if($day >= $eve[0] && $day <= $eve[1] ) $event[date_format($date,"y/M/d")]['Evening'][] = ['id'=>$value['id'].'-'.$slor,'time'=>date_format($date,"h:i:s a")];
                else $event[date_format($date,"y/M/d")]['Night '][] = ['id'=>$value['id'].'-'.$slor,'time'=>date_format($date,"h:i:s a")];
                $slor++;
                
                if($slor == $loopingSlot) break;
            }
            if($key == $loopdate) break;
        }
        
        return $event;
    }

    function getDateKey($string){
        $days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
        return array_search($string,$days);
    }
    
    function getFromToTimeSchedule($schedule,$map){
        $schedule = json_decode($schedule->schedule);
        $from = date('h:i a' , strtotime($schedule[$map[1]]->kt_docs_repeater_nested_inner[$map[2]]->from));
        $to = date('h:i a' , strtotime($schedule[$map[1]]->kt_docs_repeater_nested_inner[$map[2]]->to));

        return "$from - $to";
    }
}
// // Prints the day
// echo date("D", strtotime('07/2/2022')) . "<br>";

// // Prints the day, date, month, year, time, AM or PM
// echo date("l jS \of F Y h:i:s A") . "<br>";

// // Prints October 3, 1975 was on a Friday
// echo "Oct 3,1975 was on a ".date("l", mktime(0,0,0,10,3,1975)) . "<br>";

// // Use a constant in the format parameter
// echo date(DATE_RFC822) . "<br>";

// // prints something like: 1975-10-03T00:00:00+00:00
// echo date(DATE_ATOM,mktime(0,0,0,10,3,1975));
