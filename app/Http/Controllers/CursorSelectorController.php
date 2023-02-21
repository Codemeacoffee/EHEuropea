<?php
/**
 * Created by PhpStorm.
 * User: Lionel
 * Date: 16/07/2018
 * Time: 12:09
 */

namespace Eheuropea\Http\Controllers;


use Eheuropea\Course;
use Eheuropea\Course_departure;
use Eheuropea\Course_module;
use Eheuropea\Image;
use Eheuropea\Module;
use Eheuropea\Module_formative;
use Eheuropea\Professional_departure;
use Eheuropea\Unit_formative;

class CursorSelectorController
{
    function index($code){
        if(!isset($_GET["key"])){
            abort(404);
        }

        $course = Course::where('id', $_GET["key"])->first();
    
        if(!$course || ($course['display'] != '2' && $course['public'] != '1' && $course['presencial'] != '1' && (strtotime($course['init_date']) < strtotime(date('Y-m-d'))))){
            abort(404);
        }
        $pro_departure = Course_departure::where('id_course', $course['id'])->get();
        $modulesIDs = Course_module::where('id_course', $course['id'])->get();
        $modules = array();
        $units = array();
        $j = 0;
        if($course){
        foreach($modulesIDs as $moduleID){
            $modules[$j] = Module::where('code', $moduleID['cod_mod'])->first();
            $units_formativesIDs = Module_formative::where('cod_mod', $modules[$j]['code'])->get();
            $formUnits = array();
            $k = 0;
            foreach($units_formativesIDs as $units_formativesID){
                $formUnits[$k] = Unit_formative::where('code', $units_formativesID['cod_unitformative'])->first();
                $k++;
            }
            $units[$modules[$j]['code']] = $formUnits;
            $j++;
        }
        $departures = array();
        $i = 0;
        foreach($pro_departure as $item0){
            $departures[$i] = Professional_departure::where('id', $item0['id_departure'])->get();
            $i++;
        }
        $otherCourses = Course::where([['id', '<>', $course['id']], ['sector', $course['sector']], ['init_date','>', date('Y-m-d')]])->take(3)->orderBy('init_date', 'ASC')->get();
        $otherCourses2 = array();
        $otherCourses3 = array();
        if(sizeof($otherCourses) < 3){
            $otherCourses2 = Course::where([['location', $course['location']], ['id', '<>', $course['id']], ['sector', '<>', $course['sector']], ['init_date','>', date('Y-m-d')]])->take(3 - sizeof($otherCourses))->orderBy('init_date', 'ASC')->get();
            if(sizeof($otherCourses) + sizeof($otherCourses2) < 3){
                $otherCourses3 = Course::where([['id', '<>', $course['id']], ['display', 2]])->take(3 - (sizeof($otherCourses) + sizeof($otherCourses2)))->orderBy('init_date', 'ASC')->get();
            }
        }
        $img = Image::where('code', $course['img_code'])->get()->first();
        return view('fichaCurso')->with('course', $course)->with('departures', $departures)->with('otherCourses', [$otherCourses, $otherCourses2, $otherCourses3])->with('img', $img)->with('modules', $modules)->with('units', $units);
        } else {
            abort('404');
        }
    }
}