<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Mockery\Exception;

class TestController extends Controller
{
    public function __invoke()
    {
        try {

            throw new Exception('Sorry no response');
        }
        catch (\Exception $e){

                return response()->json([
                    'status'=> true,
                    'payload'=>([
                        'message' => $e->getMessage()
                    ]),
                    '_time' => time(),]);

        }
    }
}
