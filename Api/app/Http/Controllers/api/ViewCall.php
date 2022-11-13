<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\viewCalls;
use App\Models\viewSession;
use App\Models\viewsessionlog;
use App\http\Resources\getCalls;
use App\http\Resources\getviewsessions;
use App\http\Resources\getviewsessionlog;

class ViewCall extends Controller
{
    public function ViewAllCalls()
    {
        $All = viewCalls::all();
        return GetCalls::Collection($All);
    }

    public function viewSessions()
    {
        $All = viewSession::all();
        return getviewsessionlog::Collection($All);
    }

    public function viewSessionLog()
    {
        $All = viewsessionlog::all();
        return getviewsessionlog::Collection($All);
    }

    public function recieveCall(Request $request)
    {
        if (preg_match("/^[0-9]{10}$/", $request->phoneNumber)) {
            DB::statement("
            -- recieve call
            declare @result as int;
            exec spReceiveCall
            @phoneNumber = '".$request->phoneNumber."',
            @status = @result output;
            select @result;
            ");
            $response["status"] = 200;
            $response["msg"] = "El numero ha sido guardado";
        }else{
            $response["status"] = 400;
            $response["msg"] = "Por favor ingresa un numero correcto";
        }

        return response()->json($response);
    }

    public function endcall(Request $request)
    {
        if (!preg_match("/^[0-4]{1}$/", $request->statusEndId)){
            $response["status"] = 202;
            $response["msg"] = "El status de la llamada debe ser un número del 1 al 4";
        }elseif (!preg_match("/^[0-9]{4}$/",$request->callId)) {
            $response["status"] = 202;
            $response["msg"] = "El número de la llamada debe ser de 4 dígitos";
        }else{
            $check = DB::table('viewCalls')
            ->where('callId', $request->callId)
            ->get();

            if ( $check == "[]"){
                $response["status"] = 202;
                $response["msg"] = "La llamada no existe";
            }else{
                if ($check[0]->callStatus == "Ended"){
                    $response["status"] = 202;
                    $response["msg"] = "La llamada ya había acabado";
                }else{
                    DB::statement("EXEC spEndCall ".$request->callId.",".$request->statusEndId.",1");
                    $response["status"] = 202;
                    $response["msg"] = "La llamada ha sido terminada";
                }
            }
        }

        return response()->json($response);
    }
    public function loginAgent(Request $request)
    {
        if (!preg_match("/^[0-9]{4}$/", $request->agentId)){
        $response["status"] = 202;
        $response["msg"] = "El número de agente debe contener 4 dígitos";
        }elseif(!preg_match("/^[0-9]{4}$/", $request->agentPin)){
        $response["status"] = 202;
        $response["msg"] = "El número de pin debe contener 4 dígitos";
        }elseif(!is_numeric($request->stationId)){
        $response["status"] = 202;
        $response["msg"] = "La estación debe ser un número";
        }else{
        $LoginState= DB::select(
        "--login agent
        declare @result as int;
        exec spLoginAgent
            @agentId = ".$request->agentId.",
            @agentPin = ".$request->agentPin.",
            @stationId = ".$request->stationId.",
            @status = @result output;
        select @result as result;");

        switch ($LoginState[0]->result) {
            case 1: 
                $response["status"] = 200;
                $response["msg"] = "No se pudo conectar al agente (id o pin inválido)";
                break;
            case 2:
                $response["status"] = 200;
                $response["msg"] = "El agente ya está conectado";
                break;
            case 3:
                $response["status"] = 200;
                $response["msg"] = "Estación inválida";
                break;
            case 4:
                $response["status"] = 200;
                $response["msg"] = "Estación no activa";
                break;
            case 5:
                $response["status"] = 200;
                $response["msg"] = "Estación en uso";
                break;   
        }
        }
        
        return response()->json($response);
    }
}

