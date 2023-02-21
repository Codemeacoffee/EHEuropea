<?php


namespace Eheuropea\Http\Controllers;

use Eheuropea\Contact;
use Eheuropea\Course;
use Eheuropea\Course_departure;
use Eheuropea\Http\Controllers\Auth\ValidateController;
use Eheuropea\Image;
use Eheuropea\News;
use Eheuropea\Professional_departure;
use Eheuropea\Sector;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Eheuropea\Admin;
use Eheuropea\Ips;
use Illuminate\Support\Facades\File;
use Eheuropea\Course_module;
use Eheuropea\Module;
use Eheuropea\Module_formative;
use Eheuropea\Unit_formative;
use Illuminate\Support\Facades\Validator;

class AdminController extends ValidateController
{

    function index($code){
        $admin = Admin::where('email', $code)->first();
        if(!$admin){
            abort(404);
        }else if($this->is_logged()){
            $contacts = Contact::all();
            $news = News::all();
            $images = Image::all();
            $course = Course::all();
            $modules = Module::all();
            $relationCourseModule = Course_module::all();
            $units = Unit_formative::all();
            $relationModuleUnitFormative = Module_formative::all();
            $departures = Professional_departure::all();
            $relationCourseDeparture = Course_departure::all();
            return view('controlPanel')
                ->with('contacts', $contacts)
                ->with('news', $news)
                ->with('images', $images)
                ->with('courses', $course)
                ->with('modules', $modules)
                ->with('units', $units)
                ->with('relationCourseModule', $relationCourseModule)
                ->with('relationModuleUnitFormative', $relationModuleUnitFormative)
                ->with('courseDeparture', $relationCourseDeparture)
                ->with('departures', $departures);
        }else{
            return redirect('admin');
        }
    }

    function frontier(){
        $admin = $this->is_logged();
        if($admin){
            return redirect('admin/'.$admin->email);
        }
        return view('adminCheck');
    }

    function checkAdmin(Request $request)
    {
        $ip = $this->getIP();
        $register = Ips::where('ip', $ip)->first();
        $now = new DateTime(date('Y/m/d H:i:s', time()));
        if ($register != null)
            $time = new DateTime($register->timestamp);
        if (($register != null) && (3 == $register->tries) && ($time > $now)) {
            $interval = $time->diff($now);
            $remainingTime = $interval->format('%i minutos %s segundos');
            return view('temporaryBlock')->with('remainingTime', $remainingTime);
        } else {
            $email = htmlspecialchars($request->input('email'));
            $password = htmlspecialchars($request->input('password'));

            $admin = Admin::where('email', $email)->first();
            if (!$admin) {
                return $this->displayView();
            } else {
                if (Hash::check($password, $admin->password)) {
                    if (Hash::needsRehash($admin->password)) {
                        $admin->password = Hash::make($password);
                        $admin->save();
                    }
                    $value = bin2hex(random_bytes(32));
                    $admin->_session = $value;
                    $admin->save();
                    session()->put('adminSession', array(
                        'idAdmin' => encrypt($admin->email),
                        'value' => $value,
                    ));
                    return redirect('admin/' . $admin->email);
                }else{
                    return $this->displayView();
                }
            }
        }
    }

    function compress($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);
        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);
        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }

    function dragDrop(Request $request){
        $admin = $this->is_logged();
        if($admin){
            $file = $request['data'];
            if ($file != null) {
                $name = time().str_random(15). '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/images/uploads');
                $validator = Validator::make($request->all(), ['file' => 'mimes:jpeg,png,jpg,gif']);
                if($validator->fails()){
                    abort(404);
                }else if (filesize($file)>2000000){
                    $destination = $destinationPath."/".$name;
                    $this->compress($file, $destination, 75 );
                }else{
                    $file->move($destinationPath, $name);
                }
                return $name;
            } else {
                return false;
            }
        }
    }

    protected function  getIP(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $localIP = getHostByName(getHostName());
        $ip = $ip.'_'.$localIP;
        return $ip;
    }

    private function displayView(){
        $check = $this->checkAccess();
        if($check == 'displayBlock'){
            return view('temporaryBlock')->with('remainingTime', '10 minutos 00 segundos');
        }else{
            return view('adminCheck')->with('error', 'error');
        }
    }

    protected function checkAccess(){
        $ip = $this->getIP();
        $register = Ips::where('ip', $ip)->first();
        if($register == null){
            $date = new DateTime(date('Y/m/d H:i:s', time()));
            Ips::create([
                'ip'=>$ip,
                'tries'=>1,
                'timestamp'=>$date
            ]);
        }else if(1 == $register->tries){
            $hour = new DateTime($register->timestamp);
            $hour->modify("+5 minutes");
            $now = new DateTime(date('Y/m/d H:i:s', time()));
            if($hour>$now){
                $register->tries = 2;
                $register->timestamp = $now;
                $register->save();
            }else{
                $register->tries=1;
                $register->timestamp = $now;
                $register->save();
            }
        }else if(2 == $register->tries){
            $hour = new DateTime($register->timestamp);
            $hour->modify("+10 minutes");
            $now = new DateTime(date('Y/m/d H:i:s', time()));
            if($hour>$now){
                $register->tries = 3;
                $now->modify("+10 minutes");
                $register->timestamp = $now;
                $register->save();
                return 'displayBlock';
            }else{
                $register->tries=1;
                $register->timestamp = $now;
                $register->save();
            }
        }else if(3 == $register->tries){
            $now = new DateTime(date('Y/m/d H:i:s', time()));
            $register->tries=1;
            $register->timestamp = $now;
            $register->save();
        }
    }

    function ajaxAutofillUnits(Request $request){
        if($this->is_logged()){
            $value = $request['search'];
            $relation = Module_formative::where('cod_mod', $value)->get();
            $units = Unit_formative::all();
            $results = array();
            foreach ($relation as $current){
                foreach ($units as $unit){
                    if($current['cod_unitformative'] == $unit['code']){
                        if(!in_array($unit, $results)){
                            array_push($results, $unit);
                        }
                    }
                }
            }

            return $results;
        }
        abort(404);
    }

    function ajaxModules(Request $request){
        if($this->is_logged()){
            $value = $request['search'].'%';
            $results = Module::where('code', 'LIKE', '%'.$value.'%')->get();

            return $results;
     }
         abort(404);
    }

    function ajaxUnits(Request $request){
        if($this->is_logged()){
            $value = $request['search'].'%';
            $results = Unit_formative::where('code', 'LIKE', '%'.$value.'%')->get();
            return $results;
        }
        abort(404);
    }

    function ajaxDepartures(Request $request){
        if($this->is_logged()){
            $value = $request['search'].'%';
            $results = Professional_departure::where('name', 'LIKE', '%'.$value.'%')->get();
            $list = array();
            foreach ($results as $result){
                array_push($list, $result->name);
            }
            return $list;
        }
        abort(404);
    }

    function ajaxSectors(Request $request){
        if($this->is_logged()){
            $value = $request['search'].'%';
            $results = Sector::where('name', 'LIKE', '%'.$value.'%')->get();
            $list = array();
            foreach ($results as $result){
                array_push($list, $result->name);
            }
            return $list;
        }
        abort(404);
    }

    function uploadContact(Request $request){
        $admin = $this->is_logged();
        if($admin){
            $random = str_random(25);
            $interval = ($request->input('days')[0])."-".($request->input('days')[1]);
            Contact::create([
                'area' => htmlspecialchars($request->input('area')),
                'telephone' => htmlspecialchars($request->input('phone')),
                'email' => htmlspecialchars($request->input('mail')),
                'location' => htmlspecialchars($request->input('place')),
                'hours' => htmlspecialchars($request->input('hour')),
                'days' => $interval,
                'img_code' => $random
            ]);

                if(isset($request['file'])){
                    if(($request['file'])!=null){
                        $file = $request['file'];
                        $name = time().str_random(15). '.' . $file->getClientOriginalExtension();
                            $destinationPath = public_path('/images/uploads');
                            $validator = Validator::make($request->all(), ['file' => 'mimes:jpeg,png,jpg,gif']);
                            if($validator->fails()){
                                abort(404);
                            }else if (filesize($file)>2000000){
                                $destination = $destinationPath."/".$name;
                                $this->compress($file, $destination, 75 );
                            }else{
                                $file->move($destinationPath, $name);
                            }
                            Image::create([
                                'code'=>$random,
                                'img_link'=>("images/uploads/".$name)
                            ]);

                    }
                }
                else{
                    if($request['dropped']){
                        Image::create([
                            'code'=>$random,
                            'img_link'=>("images/uploads/".htmlspecialchars($request['dropped']))
                        ]);

                        if(isset($images)){
                            if(File::exists($images->img_link)){
                                File::delete($images->img_link);
                                $images->delete();
                            }
                        }
                    }else{
                        abort(403);
                    }
                }
            return redirect('admin/'.$admin->email)->with('contacts', 'contacts');
        }else{
            abort(404);
        }
    }

    function uploadNew(Request $request)
    {
        $admin = $this->is_logged();
        if($admin){
        $random = str_random(25);
        $drop = false;
        if($request['dropped']){
            $drop = true;
            Image::create([
                'code'=>$random,
                'img_link'=>("images/uploads/".htmlspecialchars($request['dropped']))
            ]);
        }
        try{
            foreach ($request['files'] as $file) {
                if ($file != null) {
                    $name = time().str_random(15). '.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path('/images/uploads');
                    $validator = Validator::make($request->all(), ['file' => 'mimes:jpeg,png,jpg,gif']);
                    if($validator->fails()){
                        abort(404);
                    }else if (filesize($file)>2000000){
                        $destination = $destinationPath."/".$name;
                        $this->compress($file, $destination, 75 );
                    }else{
                        $file->move($destinationPath, $name);
                    }
                    Image::create([
                        'code'=>$random,
                        'img_link'=>("images/uploads/".$name)
                    ]);
                } else {
                    return 'No se ha recibido imagen.';
                }
            }
        }catch (\Exception $e){
            if(!$drop){
                abort(403);
            }
        }
        News::create([
            'title'=>htmlspecialchars($request->input('title')),
            'text'=>htmlspecialchars($request->input('text')),
            'date'=>htmlspecialchars($request->input('date')),
            'img_code'=>$random
        ]);
            return redirect('admin/'.$admin->email)->with('news', 'news');
        }else{
            abort(404);
        }
    }

    function updateContact(Request $request){
        $admin = $this->is_logged();
        if($admin){
            if($request->input('delete') != null){
                $contact = Contact::where('id', $request->input('oldTitle'))->first();
                $imagesToDelete = Image::where('code', $contact->img_code)->get();
                foreach ($imagesToDelete as $deleteThis){
                    if(File::exists($deleteThis->img_link)) {
                        File::delete($deleteThis->img_link);
                        $deleteThis->delete();
                    }
                }
                $contact->delete();
                return redirect('admin/'.$admin->email);
            }
            $contact = Contact::where('area', htmlspecialchars($request->input('oldName')))->first();
            if(!$contact){
                abort(404);
            }else{
                $interval = ($request->input('days')[0])."-".($request->input('days')[1]);
                if(strlen(htmlspecialchars($request->input('area'))) != 0){
                    $contact->area = htmlspecialchars($request->input('area'));
                }if(strlen(htmlspecialchars($request->input('phone'))) != 0){
                    $contact->telephone = htmlspecialchars($request->input('phone'));
                }if(strlen(htmlspecialchars($request->input('mail'))) != 0){
                    $contact->email = htmlspecialchars($request->input('mail'));
                }if(strlen(htmlspecialchars($request->input('place'))) != 0){
                    $contact->location = htmlspecialchars($request->input('place'));
                }if(strlen(htmlspecialchars($request->input('hour'))) != 0){
                    $contact->hours = htmlspecialchars($request->input('hour'));
                }if(strlen($interval) != 0){
                    $contact->days = $interval;
                }
                $images = Image::where('code', $contact->img_code)->first();

                    if(isset($request['file'])){
                        if(($request['file'])!=null){
                            $file = ($request['file']);
                            $name = time().str_random(15). '.' . $file->getClientOriginalExtension();
                                $destinationPath = public_path('/images/uploads');
                                $validator = Validator::make($request->all(), ['file' => 'mimes:jpeg,png,jpg,gif']);
                                if($validator->fails()){
                                    abort(404);
                                }else if (filesize($file)>2000000){
                                    $destination = $destinationPath."/".$name;
                                    $this->compress($file, $destination, 75 );
                                }else{
                                    $file->move($destinationPath, $name);
                                }
                                if(isset($images)){
                                    if(File::exists($images->img_link)){
                                        File::delete($images->img_link);
                                        $images->delete();
                                    }
                                }
                                Image::create([
                                    'code'=>$contact->img_code,
                                    'img_link'=>("images/uploads/".$name)
                                ]);
                        }
                    }else{
                        if($request['dropped']){
                            Image::create([
                                'code'=>$contact->img_code,
                                'img_link'=>("images/uploads/".htmlspecialchars($request['dropped']))
                            ]);
                            if(isset($images)){
                                if(File::exists($images->img_link)){
                                    File::delete($images->img_link);
                                    $images->delete();
                                }
                            }
                        }
                    }

                $contact->save();
                return redirect('admin/'.$admin->email)->with('contacts', 'contacts');
            }
        }
        abort(404);
    }

    function editNew(Request $request){
        $admin = $this->is_logged();
        if($admin){
            $new = News::where('id', htmlspecialchars($request->input('oldTitle')))->first();
            if(!$new){
                abort(404);
            }else{
                if($request->input('delete') != null){
                    $imagesToDelete = Image::where('code', $new->img_code)->get();
                    foreach ($imagesToDelete as $deleteThis){
                        if(File::exists($deleteThis->img_link)) {
                            File::delete($deleteThis->img_link);
                            $deleteThis->delete();
                        }
                    }
                    $new->delete();
                    return redirect('admin/'.$admin->email)->with('news', 'news');
                }
                if(strlen(htmlspecialchars($request->input('title'))) != 0){
                    $new->title = htmlspecialchars($request->input('title'));
                }if(strlen(htmlspecialchars($request->input('text'))) != 0){
                    $new->text = htmlspecialchars($request->input('text'));
                }if(strlen(htmlspecialchars($request->input('date'))) != 0){
                    $new->date = htmlspecialchars($request->input('date'));
                }
                $images = Image::where('code', $new->img_code)->get();

                if($request['dropped']){
                    $oldImage = Image::where('code', $new->img_code)->first();
                    Image::create([
                        'code'=>$new->img_code,
                        'img_link'=>("images/uploads/".htmlspecialchars($request['dropped']))
                    ]);
                    if($oldImage){
                        $oldImage->delete();
                    }
                }
                for ($i = 0; $i<5; $i++){
                    if(isset($request['files'][$i])){
                        if(($request['files'][$i])!=null){
                            $file = ($request['files'][$i]);
                            $name = time().str_random(15). '.' . $file->getClientOriginalExtension();
                            if(substr($file->getMimeType(), 0, 6 ) === "video/"){
                                $destinationPath = public_path('/videos');
                                $file->move($destinationPath, $name);
                                if(isset($images[$i])){
                                    if(File::exists($images[$i]->img_link)){
                                        File::delete($images[$i]->img_link);
                                        $images[$i]->delete();
                                    }
                                }
                                Image::create([
                                    'code'=>$new->img_code,
                                    'img_link'=>("videos/".$name),
                                    'video'=>1
                                ]);
                            }else{
                                $destinationPath = public_path('/images/uploads');
                                $validator = Validator::make($request->all(), ['file' => 'mimes:jpeg,png,jpg,gif']);
                                if($validator->fails()){
                                    abort(404);
                                }else if (filesize($file)>2000000){
                                    $destination = $destinationPath."/".$name;
                                    $this->compress($file, $destination, 75 );
                                }else{
                                    $file->move($destinationPath, $name);
                                }
                                if(isset($images[$i])){
                                    if(File::exists($images[$i]->img_link)){
                                        File::delete($images[$i]->img_link);
                                        $images[$i]->delete();
                                    }
                                }
                                Image::create([
                                    'code'=>$new->img_code,
                                    'img_link'=>("images/uploads/".$name)
                                ]);
                            }
                        }
                    }
                }
                };
                $new->save();
                return redirect('admin/'.$admin->email)->with('news', 'news');
            }
        abort(404);
    }

    function editCourse(Request $request)
    {
        $admin = $this->is_logged();
        if ($admin) {
            $altermodule = '';
            $course = Course::where('id', htmlspecialchars($request->input('oldTitle')))->first();
            if (!$course ) {
                abort(404);
            }else{
                if($request->input('delete') != null){
                    $image = Image::where('code', $course->img_code)->first();
                    if(($image != null) && File::exists($image->img_link)) {
                        File::delete($image->img_link);
                        $image->delete();
                    }
                    $course->delete();
                    return redirect('admin/'.$admin->email);
                }
                $schedule = htmlspecialchars($request->input('scheduleLeft'))."-".htmlspecialchars($request->input('scheduleRight'));
                if(strlen($schedule)>1){
                    $course->schedule = $schedule;
                }if(strlen(htmlspecialchars($request->input('offset')))!= 0){
                    $course->img_offset = htmlspecialchars($request->input('offset'));
                }if(strlen(htmlspecialchars($request->input('selector'))) != 0){
                    $course->display = htmlspecialchars($request->input('selector'));
                }if(strlen(htmlspecialchars($request->input('name'))) != 0){
                    $course->name = htmlspecialchars($request->input('name'));
                }if(strlen(htmlspecialchars($request->input('description'))) != 0){
                    $course->description = htmlspecialchars($request->input('description'));
                }if(strlen(htmlspecialchars($request->input('init_date'))) != 0){
                    $course->init_date = htmlspecialchars($request->input('init_date'));
                }if(strlen(htmlspecialchars($request->input('level'))) != 0){
                    $course->level = htmlspecialchars($request->input('level'));
                }if(strlen(htmlspecialchars($request->input('presencial'))) != 0){
                    switch (htmlspecialchars($request->input('presencial'))){
                        case 'Presencial':
                            $course->presencial = 0;
                            break;
                        case 'Semipresencial':
                            $course->presencial = 1;
                            break;
                        case 'Teleformación':
                            $course->presencial = 2;
                            break;
                    }
                }if(strlen(htmlspecialchars($request->input('public'))) != 0){
                    switch (htmlspecialchars($request->input('public'))){
                        case 'Gratuito':
                            $course->public = 0;
                            break;
                        case 'Privado':
                            $course->public = 1;
                            break;
                        case 'Para Empresas':
                            $course->public = 2;
                            break;
                    }
                }if(strlen(htmlspecialchars($request->input('type'))) != 0){
                    switch (htmlspecialchars($request->input('type'))){
                        case 'Trabajadores':
                            $course->type = 0;
                            break;
                        case 'Desempleados':
                            $course->type = 1;
                            break;
                    }
                }if(strlen(htmlspecialchars($request->input('location'))) != 0){
                    $course->location = htmlspecialchars($request->input('location'));
                }if(strlen(htmlspecialchars($request->input('sector'))) != 0){
                    $sector = Sector::where('name', htmlspecialchars($request->input('sector')))->first();
                    if(!$sector){
                        Sector::create([
                            'name' => htmlspecialchars($request->input('sector'))
                        ]);
                    }
                    $course->sector = htmlspecialchars($request->input('sector'));
                }if(strlen(htmlspecialchars($request->input('hours'))) != 0){
                    $course->hours = htmlspecialchars($request->input('hours'));
                }if (!empty($request->input('moduleCode')) || !empty($request->input('moduleName')) || !empty($request->input('moduleHours'))) {
                    if (!empty($request->input('moduleName'))) {
                        for( $j = 0; $j<(count($request->input('moduleName'))); $j++){
                            if(htmlspecialchars(($request->input('moduleName'))[$j]) != null) {
                                $module = Module::where('code', htmlspecialchars(($request->input('oldModuleCode'))[$j]))->first();
                                $module->name = htmlspecialchars(($request->input('moduleName'))[$j]);
                                $module->save();
                            }
                        }
                    }if (!empty($request->input('moduleHours'))) {
                        for( $j = 0; $j<(count($request->input('moduleHours'))); $j++){
                            if(htmlspecialchars(($request->input('moduleHours'))[$j]) != null) {
                                $module = Module::where('code', htmlspecialchars(($request->input('oldModuleCode'))[$j]))->first();
                                $module->hours = htmlspecialchars(($request->input('moduleHours'))[$j]);
                                $module->save();
                            }
                        }
                    }
                    if (!empty($request->input('deleteElement'))) {
                        for( $j = 0; $j<(count($request->input('deleteElement'))); $j++) {
                            if (htmlspecialchars($request->input('deleteElement')[$j]) == "deleteElement") {
                                try{
                                    $courseModule = Course_module::where('id_course', $course->id)
                                        ->where('cod_mod', htmlspecialchars(($request->input('oldModuleCode'))[$j]))->first();
                                    if ($courseModule != null) {
                                        $courseModule->delete();
                                    }
                                }catch (\Exception $e){}
                            }
                        }
                    }
                } if (!empty($request->input('unitCode')) || !empty($request->input('unitName')) || !empty($request->input('unitHours'))) {
                    if (!empty($request->input('unitName'))) {
                        for( $j = 0; $j<(count($request->input('unitName'))); $j++){
                            if(htmlspecialchars(($request->input('unitName'))[$j]) != null) {
                                $unit = Unit_formative::where('code', htmlspecialchars(($request->input('oldUnitCode'))[$j]))->first();
                                $unit->name = htmlspecialchars(($request->input('unitName'))[$j]);
                                $unit->save();
                            }
                        }
                    }if (!empty($request->input('unitHours'))) {
                        for( $j = 0; $j<(count($request->input('unitHours'))); $j++){
                            if(htmlspecialchars(($request->input('unitHours'))[$j]) != null) {
                                $unit = Unit_formative::where('code', htmlspecialchars(($request->input('oldUnitCode'))[$j]))->first();
                                $unit->hours = htmlspecialchars(($request->input('unitHours'))[$j]);
                                $unit->save();
                            }
                        }
                    }
                    if (!empty($request->input('unitCode'))) {
                        for($i = 0; $i<(count($request->input('oldModuleCode'))); $i++){
                            for($j = 0; $j<(count($request->input('unitCode'))); $j++){
                                if(htmlspecialchars(($request->input('unitCode'))[$j]) != null){
                                    $testIfExist = Unit_formative::where('code', htmlspecialchars(($request->input('unitCode'))[$j]))->first();
                                    $relation = Module_formative::where('cod_mod', htmlspecialchars($request->input('oldModuleCode')[$i]))
                                        ->where('cod_unitformative', htmlspecialchars(($request->input('unitCode'))[$j]))->first();
                                    if(!$testIfExist){
                                        $unit = Unit_formative::where('code', htmlspecialchars(($request->input('oldUnitCode'))[$j]))->first();
                                        $unit->code = htmlspecialchars(($request->input('unitCode'))[$j]);
                                        $unit->save();
                                    }else{
                                        if(!$relation){
                                            $beforeMod = Module_formative::where('cod_mod', htmlspecialchars($request->input('oldModuleCode')[$i]))
                                                ->where('cod_unitformative', htmlspecialchars(($request->input('oldUnitCode'))[$j]))->first();
                                            if($beforeMod != null){
                                                $beforeMod->delete();
                                            }
                                            Module_formative::create([
                                                'cod_mod' =>htmlspecialchars($request->input('oldModuleCode')[$i]),
                                                'cod_unitformative' => htmlspecialchars(($request->input('unitCode'))[$j])
                                            ]);
                                        }
                                    }
                                }
                            }
                        }
                    }if (!empty($request->input('deleteUnitElement'))) {
                        for($i = 0; $i<(count($request->input('oldModuleCode'))); $i++){
                            for( $j = 0; $j<(count($request->input('deleteUnitElement'))); $j++) {
                                if (htmlspecialchars($request->input('deleteUnitElement')[$j]) == "deleteElement") {
                                    try{
                                        $modUnit = Module_formative::where('cod_mod', htmlspecialchars(($request->input('oldModuleCode'))[$i]))
                                            ->where('cod_unitformative', htmlspecialchars($request->input('oldUnitCode')[$j]))->first();
                                        if($modUnit){
                                            $modUnit->delete();
                                        }
                                    }catch (\Exception $e){}
                                }
                            }
                        }
                    }
                } if(!empty($request->input('newModuleCode')) || (!empty($request->input('newModuleName')))) {
                    for ($j = 0; $j < (count($request->input('newModuleCode'))); $j++) {
                        if(htmlspecialchars(($request->input('newModuleCode'))[$j]) != null) {
                            $mod = Module::where('code', htmlspecialchars($request->input('newModuleCode')[$j]))->first();
                            if(!$mod && (strlen(htmlspecialchars($request->input('newModuleName')[$j]))>0) && (strlen(htmlspecialchars($request->input('newModuleHours')[$j]))>0)){
                                Module::create([
                                    'code' => htmlspecialchars($request->input('newModuleCode')[$j]),
                                    'name' => htmlspecialchars($request->input('newModuleName')[$j]),
                                    'hours' => htmlspecialchars($request->input('newModuleHours')[$j])
                                ]);
                            }
                            $relation = Course_module::where('id_course', $course->id)
                                ->where('cod_mod', htmlspecialchars(($request->input('newModuleCode'))[$j]))->first();
                            if(!$relation && (strlen(htmlspecialchars($request->input('newModuleName')[$j]))>0) && (strlen(htmlspecialchars($request->input('newModuleHours')[$j]))>0)){
                                Course_module::create([
                                    'id_course' => $course->id,
                                    'cod_mod' => htmlspecialchars($request->input('newModuleCode')[$j]),
                                ]);
                            }
                        }else{
                            if(strlen(htmlspecialchars($request->input('newModuleName')[$j]))>0){
                                $cod= 'AM-'.random_int(1000, 9999).' ('.htmlspecialchars($request->input('newModuleName')[$j]).')';
                                $altermodule = $cod;
                                if(htmlspecialchars($request->input('newModuleHours')[$j]) != null){
                                    Module::create([
                                        'code' => $cod,
                                        'name' => htmlspecialchars($request->input('newModuleName')[$j]),
                                        'hours' => htmlspecialchars($request->input('newModuleHours')[$j])
                                    ]);
                                }else{
                                    Module::create([
                                        'code' => $cod,
                                        'name' => htmlspecialchars($request->input('newModuleName')[$j]),
                                        'hours' => 0
                                    ]);
                                }
                                if(strlen(htmlspecialchars($request->input('newModuleName')[$j]))>0){
                                    Course_module::create([
                                        'id_course' => $course->id,
                                        'cod_mod' => $cod,
                                    ]);
                                }
                            }
                        }
                    }
                }if (!empty($request->input('newUnitCode')) || (!empty($request->input('newUnitName')))) {
                    for ($j = 0; $j < (count($request->input('newUnitCode'))); $j++) {
                        if (htmlspecialchars(($request->input('newUnitCode'))[$j]) != null) {
                            $unit = Unit_formative::where('code',htmlspecialchars($request->input('newUnitCode')[$j]))->first();
                            if(!$unit && (strlen(htmlspecialchars($request->input('newUnitName')[$j]))>0) && (strlen(htmlspecialchars($request->input('newUnitHours')[$j]))>0)){
                                Unit_formative::create([
                                    'code' => htmlspecialchars($request->input('newUnitCode')[$j]),
                                    'name' => htmlspecialchars($request->input('newUnitName')[$j]),
                                    'hours' => htmlspecialchars($request->input('newUnitHours')[$j])
                                ]);
                            }
                            if((strlen(htmlspecialchars($request->input('newUnitName')[$j]))>0) && (strlen(htmlspecialchars($request->input('newUnitHours')[$j]))>0)){
                                $Exists = Module_formative::where('cod_mod', htmlspecialchars($request->input('newUnitRelationCode')[$j]))->where('cod_unitformative', htmlspecialchars($request->input('newUnitCode')[$j]))->first();
                                if(!$Exists){
                                    Module_formative::create([
                                        'cod_mod' => htmlspecialchars($request->input('newUnitRelationCode')[$j]),
                                        'cod_unitformative' => htmlspecialchars($request->input('newUnitCode')[$j])
                                    ]);
                                }
                            }
                        }else{
                            if(strlen(htmlspecialchars($request->input('newUnitName')[$j]))>0){
                                $cod= 'AU-'.random_int(1000, 9999).' ('.htmlspecialchars($request->input('newUnitName')[$j]).')';
                                if(htmlspecialchars($request->input('newUnitHours')[$j]) != null){
                                    Unit_formative::create([
                                        'code' => $cod,
                                        'name' => htmlspecialchars($request->input('newUnitName')[$j]),
                                        'hours' => htmlspecialchars($request->input('newUnitHours')[$j])
                                    ]);
                                }else{
                                    Unit_formative::create([
                                        'code' => $cod,
                                        'name' => htmlspecialchars($request->input('newUnitName')[$j]),
                                        'hours' => 0
                                    ]);
                                }
                                if(strlen(htmlspecialchars($request->input('newUnitName')[$j])) >0){
                                    if(htmlspecialchars($request->input('newUnitRelationCode')[$j]) != 'undefined'){
                                        $Exists = Module_formative::where(['cod_mod', htmlspecialchars($request->input('newUnitRelationCode')[$j])], ['cod_unitformative', $cod])->first();
                                        if(!$Exists){
                                            Module_formative::create([
                                                'cod_mod' => htmlspecialchars($request->input('newUnitRelationCode')[$j]),
                                                'cod_unitformative' => $cod
                                            ]);
                                        }
                                    }else{
                                        $Exists = Module_formative::where(['cod_mod', $altermodule], ['cod_unitformative', $cod])->first();
                                        if(!$Exists){
                                            Module_formative::create([
                                                'cod_mod' => $altermodule,
                                                'cod_unitformative' => $cod
                                            ]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }if (!empty($request->input('moduleCode'))) {
                    for($j = 0; $j<(count($request->input('moduleCode'))); $j++){
                        if(htmlspecialchars(($request->input('moduleCode'))[$j]) != null){
                            $modBefore = Module::where('code', htmlspecialchars($request->input('moduleCode')[$j]))->first();
                            $relation = Course_module::where('id_course', $course->id)
                                ->where('cod_mod', htmlspecialchars(($request->input('moduleCode'))[$j]))->first();
                            if(!$modBefore){
                                $module = Module::where('code', htmlspecialchars(($request->input('oldModuleCode'))[$j]))->first();
                                $module->code = htmlspecialchars(($request->input('moduleCode'))[$j]);
                                $module->save();
                            }else{
                                if(!$relation){
                                    try{
                                        $relation = Course_module::where('id_course', $course->id)
                                            ->where('cod_mod', htmlspecialchars(($request->input('oldModuleCode'))[$j]))
                                            ->first();
                                        $relation->cod_mod = htmlspecialchars($request->input('moduleCode')[$j]);
                                        $relation->save();
                                    }catch (\Exception $e){}
                                }
                            }
                        }
                    }
                }
                if((!empty($request->input('departures'))) && (!empty($request->input('oldDepartures')))) {
                    if (!empty($request->input('deleteProfession'))) {
                        for( $j = 0; $j<(count($request->input('deleteProfession'))); $j++) {
                            if (htmlspecialchars($request->input('deleteProfession')[$j]) == "deleteElement") {
                                $departure = Professional_departure::where('name', htmlspecialchars($request->input('oldDepartures')[$j]))->first();
                                $courseDepart = Course_departure::where('id_course', $course->id)
                                    ->where('id_departure', $departure->id);
                                if ($courseDepart != null) {
                                    $courseDepart->delete();
                                }
                            }
                        }
                    }
                    for ($j = 0; $j < (count($request->input('departures'))); $j++) {
                        if (htmlspecialchars(($request->input('departures'))[$j]) != null){
                          $departure = Professional_departure::where('name', htmlspecialchars($request->input('oldDepartures')[$j]))->first();
                          $departure->name = htmlspecialchars($request->input('departures')[$j]);
                          $departure->save();
                        }
                    }
                }if(!empty($request->input('newDepartures'))){
                    for ($j = 0; $j < (count($request->input('newDepartures'))); $j++) {
                        if (htmlspecialchars(($request->input('newDepartures'))[$j]) != null){
                            $depart = Professional_departure::where('name', htmlspecialchars(($request->input('newDepartures'))[$j]))->first();
                            if(!$depart){
                                Professional_departure::create([
                                    'name' => htmlspecialchars(($request->input('newDepartures'))[$j])
                                ]);
                                $depart = Professional_departure::where('name', htmlspecialchars(($request->input('newDepartures'))[$j]))->first();
                            }
                            Course_departure::create([
                                'id_course' => $course->id,
                                'id_departure' => $depart->id

                            ]);
                        }
                        }
                }
                $variable = Image::where('code', $course->img_code)->get();
                if ($request->hasFile('file')) {
                    $image = $request->file('file');
                    $name = time().str_random(15).'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/images/uploads');
                    $validator = Validator::make($request->all(), ['file' => 'mimes:jpeg,png,jpg,gif']);
                    if($validator->fails()){
                        abort(404);
                    }else if (filesize($image)>2000000){
                        $destination = $destinationPath."/".$name;
                        $this->compress($image, $destination, 75 );
                    }else{
                        $image->move($destinationPath, $name);
                    }
                        Image::create([
                            'code'=>$course->img_code,
                            'img_link'=>("images/uploads/".$name)
                        ]);
                        if($variable) {
                            foreach ($variable as $current){
                                if(File::exists($current->img_link)){
                                    File::delete($current->img_link);
                                }
                                $current->delete();
                            }
                        }
                    }else if($request['dropped']){
                        Image::create([
                            'code'=>$course->img_code,
                            'img_link'=>("images/uploads/".htmlspecialchars($request['dropped']))
                        ]);
                    if($variable) {
                        foreach ($variable as $current){
                            if(File::exists($current->img_link)){
                                File::delete($current->img_link);
                            }
                            $current->delete();
                        }
                    }
                    }
                };
            $course->save();
            return redirect('admin/'.$admin->email);
        }
        abort(404);
    }

    function addCourse(Request $request)
    {
        $admin = $this->is_logged();
        if ($admin) {
            $altermodule = '';
            $random = str_random(25);
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $name = time() . str_random(15) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/uploads');
                $validator = Validator::make($request->all(), ['file' => 'mimes:jpeg,png,jpg,gif']);
                if($validator->fails()){
                    abort(404);
                }else if (filesize($image)>2000000){
                    $destination = $destinationPath."/".$name;
                    $this->compress($image, $destination, 75 );
                }else{
                    $image->move($destinationPath, $name);
                }
                Image::create([
                    'code' => $random,
                    'img_link' => ("images/uploads/" . $name)
                ]);
            }else if($request['dropped']){
                Image::create([
                    'code'=>$random,
                    'img_link'=>("images/uploads/".htmlspecialchars($request['dropped']))
                ]);
            } else {
                return 'Se ha producido un problema con la carga de la imagen.';
            }
            $schedule = htmlspecialchars($request->input('scheduleLeft'))."-".htmlspecialchars($request->input('scheduleRight'));
            $presencial = 0;
            $public = 0;
            $type = 0;
            switch (htmlspecialchars($request->input('presencial'))){
                case 'Presencial':
                    $presencial = 0;
                    break;
                case 'Semipresencial':
                    $presencial = 1;
                    break;
                case 'Teleformación':
                    $presencial = 2;
                    break;
            }

            switch (htmlspecialchars($request->input('public'))){
                case 'Gratuito':
                    $public = 0;
                    break;
                case 'Privado':
                    $public = 1;
                    break;
                case 'Para Empresas':
                    $public = 2;
                    break;
            }

            switch (htmlspecialchars($request->input('type'))){
                case 'Trabajadores':
                    $type = 0;
                    break;
                case 'Desempleados':
                    $type = 1;
                    break;
            }

            $courseValues = [
                'name' => htmlspecialchars($request->input('name')),
                'description' =>htmlspecialchars($request->input('description')),
                'init_date' => htmlspecialchars($request->input('init_date')),
                'schedule' =>$schedule,
                'level' => htmlspecialchars($request->input('level')),
                'presencial' => $presencial,
                'public' => $public,
                'img_offset' => htmlspecialchars($request->input('offset')),
                'display' => htmlspecialchars($request->input('selector')),
                'type' => $type,
                'location' => htmlspecialchars($request->input('location')),
                'sector' => htmlspecialchars($request->input('sector')),
                'img_code' => $random
            ];

            if(strlen(htmlspecialchars($request->input('hours')))>0){
                $courseValues['hours'] = htmlspecialchars($request->input('hours'));
            }
            
            Course::create($courseValues);

            $sector = Sector::where('name', htmlspecialchars($request->input('sector')))->first();
            if(!$sector){
                Sector::create([
                    'name' => htmlspecialchars($request->input('sector'))
                ]);
            }
            $course = Course::where('id', Course::max('id'))->first();
            if (!empty($request->input('newModuleCode')) || (!empty($request->input('newModuleName')))) {
                for ($j = 0; $j < (count($request->input('newModuleCode'))); $j++) {
                    if (htmlspecialchars(($request->input('newModuleCode'))[$j]) != null) {
                        $module = Module::where('code', htmlspecialchars($request->input('newModuleCode')[$j]))->first();
                        if(!$module && (strlen(htmlspecialchars($request->input('newModuleName')[$j]))>0) && (strlen(htmlspecialchars($request->input('newModuleHours')[$j]))>0)){
                            Module::create([
                                'code' => htmlspecialchars($request->input('newModuleCode')[$j]),
                                'name' => htmlspecialchars($request->input('newModuleName')[$j]),
                                'hours' => htmlspecialchars($request->input('newModuleHours')[$j])
                            ]);
                        }
                        if(strlen(htmlspecialchars($request->input('newModuleName')[$j]))>0 && strlen(htmlspecialchars($request->input('newModuleHours')[$j]))>0){
                            Course_module::create([
                                'id_course' => $course->id,
                                'cod_mod' => htmlspecialchars($request->input('newModuleCode')[$j]),
                            ]);
                        }

                    }else{
                        if(strlen(htmlspecialchars($request->input('newModuleName')[$j]))>0){
                            $cod= 'AM-'.random_int(1000, 9999).' ('.htmlspecialchars($request->input('newModuleName')[$j]).')';
                            $altermodule = $cod;
                            if(htmlspecialchars($request->input('newModuleHours')[$j]) != null){
                            Module::create([
                                'code' => $cod,
                                'name' => htmlspecialchars($request->input('newModuleName')[$j]),
                                'hours' => htmlspecialchars($request->input('newModuleHours')[$j])
                            ]);
                            }else{
                                Module::create([
                                    'code' => $cod,
                                    'name' => htmlspecialchars($request->input('newModuleName')[$j]),
                                    'hours' => 0
                                ]);
                            }
                            if(strlen(htmlspecialchars($request->input('newModuleName')[$j]))>0){
                                Course_module::create([
                                    'id_course' => $course->id,
                                    'cod_mod' => $cod,
                                ]);
                            }
                        }
                    }
                }
            }
            if (!empty($request->input('newUnitCode')) || (!empty($request->input('newUnitName')))) {
                for ($j = 0; $j < (count($request->input('newUnitCode'))); $j++) {
                    if (htmlspecialchars(($request->input('newUnitCode'))[$j]) != null) {
                        $unit = Unit_formative::where('code',htmlspecialchars($request->input('newUnitCode')[$j]))->first();
                        if(!$unit && (strlen(htmlspecialchars($request->input('newUnitName')[$j]))>0) && (strlen(htmlspecialchars($request->input('newUnitHours')[$j]))>0)){
                            Unit_formative::create([
                                'code' => htmlspecialchars($request->input('newUnitCode')[$j]),
                                'name' => htmlspecialchars($request->input('newUnitName')[$j]),
                                'hours' => htmlspecialchars($request->input('newUnitHours')[$j])
                            ]);
                        }
                        if((strlen(htmlspecialchars($request->input('newUnitName')[$j]))>0) && (strlen(htmlspecialchars($request->input('newUnitHours')[$j]))>0)) {
                            $check = Module_formative::where('cod_mod', htmlspecialchars($request->input('newUnitRelationCode')[$j]))
                                ->where('cod_unitformative', htmlspecialchars($request->input('newUnitCode')[$j]))->first();
                            if(!$check) {
                                Module_formative::create([
                                    'cod_mod' => htmlspecialchars($request->input('newUnitRelationCode')[$j]),
                                    'cod_unitformative' => htmlspecialchars($request->input('newUnitCode')[$j])
                                ]);
                            }
                        }
                    }else{
                        if(strlen(htmlspecialchars($request->input('newUnitName')[$j]))>0){
                            $cod= 'AU-'.random_int(1000, 9999).' ('.htmlspecialchars($request->input('newUnitName')[$j]).')';
                            if(htmlspecialchars($request->input('newUnitHours')[$j]) != null){
                                Unit_formative::create([
                                    'code' => $cod,
                                    'name' => htmlspecialchars($request->input('newUnitName')[$j]),
                                    'hours' => htmlspecialchars($request->input('newUnitHours')[$j])
                                ]);
                            }else{
                                Unit_formative::create([
                                    'code' => $cod,
                                    'name' => htmlspecialchars($request->input('newUnitName')[$j]),
                                    'hours' => 0
                                ]);
                            }
                            if((strlen(htmlspecialchars($request->input('newUnitName')[$j]))>0)){
                                if(htmlspecialchars($request->input('newUnitRelationCode')[$j]) != 'undefined'){
                                    Module_formative::create([
                                        'cod_mod' => htmlspecialchars($request->input('newUnitRelationCode')[$j]),
                                        'cod_unitformative' => $cod
                                    ]);
                                }else{
                                    Module_formative::create([
                                        'cod_mod' => $altermodule,
                                        'cod_unitformative' => $cod
                                    ]);
                                }
                            }
                        }
                    }
                }
            }
            if (!empty($request->input('newDepartures'))) {
                for ($j = 0; $j < (count($request->input('newDepartures'))); $j++) {
                    if (htmlspecialchars(($request->input('newDepartures'))[$j]) != null) {
                        $departure = Professional_departure::where('name', htmlspecialchars(($request->input('newDepartures'))[$j]))->first();
                        if(!$departure){
                            Professional_departure::create([
                                'name' => htmlspecialchars(($request->input('newDepartures'))[$j])
                            ]);
                            $departure = Professional_departure::where('name', htmlspecialchars(($request->input('newDepartures'))[$j]))->first();
                        }
                        Course_departure::create([
                            'id_course' => $course->id,
                            'id_departure' => $departure->id
                        ]);
                    }
                }
            }
                return redirect('admin/' . $admin->email);
            } else {
                abort(404);
            }
        }
        
         function activateCourse(Request $request)
        {
            $admin = $this->is_logged();
            if ($admin) {
                $course = Course::where('id', htmlspecialchars($request['id']))->first();
                if (!$course) {
                    abort(404);
                } else {
                    switch ($course){
                        case ($course->visibility == 0):
                            $course->visibility = 1;
                            break;
                        case ($course->visibility == 1):
                            $course->visibility = 0;
                            break;
                    }
                    $course->save();
    
                    return;
                }
            }else{
                abort(404);
            }
        }

        function closeSession(){
                session()->flush();
                return redirect('/');
        }
}