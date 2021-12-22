<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Services\ExamService;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    private $examService;

    public function __construct(ExamService $examService){
        $this->examService = $examService;
    }
    public function index()
    {
        try{
            return response()->json([
                'status'=> '',
                'code'  => ''

            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => '',
                'code'   => '', 
                'essage' => ''
            ]);
        }
    }
}
