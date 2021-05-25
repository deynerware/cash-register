<?php

namespace Merqueo\Traits;

trait ResponseJson
{
    public function sendOk($data, $code = 200)
    {
        $array = [
            'status' => true,
            'data'   => $data,
            'code'   => $code,
        ];

        return response()->json($array);
    }
}
