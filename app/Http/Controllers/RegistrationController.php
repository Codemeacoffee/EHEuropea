<?php

namespace Eheuropea\Http\Controllers;


use Eheuropea\Applicants;
use Eheuropea\Course;
use Eheuropea\PreRegistration;
use Eheuropea\Students;
use Illuminate\Support\Facades\Mail;

class RegistrationController
{

    function index(){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tel']);
        $mailList = [['central@eheuropea.com', 'Central'], ['formacion@eheuropea.com', 'Formacion'], ['elizabeth@eheuropea.com', 'Elizabeth'], ["puri@eheuropea.com", "Puri"], ['rrss@eheuropea.com', 'RRSS']];
        $course = $_POST['course'];

        $student = Students::where('email', $email)->first();

        if(!$student){
            Students::create([
                'name'=>$name,
                'email'=>$email,
                'telefono'=>$tel
            ]);
        }else{
            $student->name = $name;
            $student->telefono = $tel;
            $student->save();
        }

        $registration = PreRegistration::where('id_course', $course)
            ->where('email', $email)
            ->first();

        if(!$registration){
            PreRegistration::create([
                'id_course'=>$course,
                'email'=>$email
            ]);
        }

        $course = Course::where('id', $course)->first();


        $data = [
            "name" => $name,
            "email" => $email,
            "phone" => $tel,
            "course" => $course
        ];


        foreach($mailList as $emailData){

            $data = [
                "name" => $name,
                "email" => $email,
                "phone" => $tel,
                "course" => $course,
                "receiver" => $emailData[0],
                "receiverAlias" => $emailData[1]
            ];

            Mail::send('emails.preinscription', $data, function($message) use ($data) {
                $message->to($data['receiver'], $data['receiverAlias'])->subject('Preinscripción '.$data['course']['location']);
                $message->from('noreply@eheuropea.com', 'Eheuropea');
            });
        }
        
        

     
        return redirect()->back()->with('message', 'Gracias por matricularte en el curso ' . $course['name'] . ' Nivel ' . $course['level']);
    }
    
    function masterPreregistration(){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tel']);
        $mailList = [['central@eheuropea.com', 'Central EHEuropea'], ['puri@eheuropea.com', 'Puri EHEuropea']];
        $course = 'Máster internacional en dirección de empresas de turismo y ocio';

        $student = Students::where('email', $email)->first();

        if(!$student){
            Students::create([
                'name'=>$name,
                'email'=>$email,
                'telefono'=>$tel
            ]);
        }else{
            $student->name = $name;
            $student->telefono = $tel;
            $student->save();
        }

        foreach($mailList as $emailData){

            $data = [
                "name" => $name,
                "email" => $email,
                "phone" => $tel,
                "course" => $course,
                "receiver" => $emailData[0],
                "receiverAlias" => $emailData[1]
            ];

            Mail::send('emails.masterInscription', $data, function($message) use ($data) {
                $message->to($data['receiver'], $data['receiverAlias'])->subject('Inscripción Máster internacional en dirección de empresas de turismo y ocio');
                $message->from('noreply@eheuropea.com', 'EHEuropea');
            });
        }

        return redirect()->back()->with('message', 'Gracias por inscribirte en Máster internacional en dirección de empresas de turismo y ocio');
    }

    function validate(){
        $email = htmlspecialchars($_GET['email']);
        $course = $_GET['course'];
        $preRegistration = PreRegistration::where([['id_course', $course], ['email', $email]])->get();
        return $preRegistration;
    }

    function team(){
        $name = htmlspecialchars($_POST['fullName']);
        $email = htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tlf']);
        $puesto = htmlspecialchars($_POST['position']);
        $cv = htmlspecialchars($_FILES['cv']['tmp_name']);

        $cvName = $_FILES['cv']['name'];
        $ext = strtolower(substr($cvName, strripos($cvName, '.')+1));
        $encryptedName = hash('sha256', $cvName) . '.' . $ext;
        $temp = $cv;
        move_uploaded_file( "$temp" , "files/$encryptedName");

        $applicant = Applicants::where('email', $email)->first();

        if(!$applicant){
            Applicants::create([
                'name'=>$name,
                'email'=>$email,
                'telefono'=>$tel,
                'puesto'=>$puesto,
                'routeCV'=>"files/$encryptedName"
            ]);
        }else{
            $applicant->name = $name;
            $applicant->telefono = $tel;
            $applicant->puesto = $puesto;
            $applicant->routeCV = "files/$encryptedName";
            $applicant->save();
        }

        $data = [
            "name" => $name,
            "email" => $email,
            "phone" => $tel,
            "occupation" => $puesto,
            "pathToFile" => "files/$encryptedName"
        ];

        Mail::send('emails.applicant', $data, function($message) use ($data) {
            $message->to('enviatucvcanarias@gmail.com', 'CurriculumsCanarias')->subject('Solicitud de trabajo');
            $message->from('noreply@eheuropea.com', 'Eheuropea');
            $message->attach($data['pathToFile'],
                [
                    'as' => $data['name']."CV",
                    'mime' => 'application/pdf'
                ]);
        });

        return redirect()->back()->with('message', '¡Gracias por unirte a nuestro proceso de selección!');
    }

    function store(){
        $data = [
            "name" => htmlspecialchars($_POST['name']),
            "email" => htmlspecialchars($_POST['email']),
            "phone" => htmlspecialchars($_POST['tel'])
        ];

        Mail::send('emails.presupuestoSala', $data, function($message) use ($data) {
            $message->to('central@eheuropea.com', 'Central')->subject('Presupuesto de salas');
            $message->from('noreply@eheuropea.com', 'Eheuropea');
        });

        return redirect()->back()->with('message', 'En breve te contactaremos con más información sobre nuestras salas disponibles actualmente.');
    }
    
    function competences(){
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tel']);
        $isle = htmlspecialchars($_POST['isle']);
        $mailList = [['central@eheuropea.com', 'Central'], ['formacion@eheuropea.com', 'Formacion'], ['elizabeth@eheuropea.com', 'Elizabeth'], ["puri@eheuropea.com", "Puri"], ['rrss@eheuropea.com', 'RRSS']];
        $competence = $_POST['competence'];
        
        if($isle == 'grancanaria'){
            $isle = 'Gran Canaria';
        }

        $student = Students::where('email', $email)->first();

        if(!$student){
            Students::create([
                'name'=>$name,
                'email'=>$email,
                'telefono'=>$tel
            ]);
        }else{
            $student->name = $name;
            $student->telefono = $tel;
            $student->save();
        }

        foreach($mailList as $emailData){

            $data = [
                "name" => $name,
                "email" => $email,
                "phone" => $tel,
                "isle" => $isle,
                "competence" => $competence,
                "receiver" => $emailData[0],
                "receiverAlias" => $emailData[1]
            ];

            Mail::send('emails.inscription', $data, function($message) use ($data) {
                $message->to($data['receiver'], $data['receiverAlias'])->subject('Inscripción Oxford Test EHE');
                $message->from('noreply@eheuropea.com', 'EHEuropea');
            });
        }

        return redirect()->back()->with('message', 'Gracias por inscribirte en ' .$competence . ' ');
    }
}