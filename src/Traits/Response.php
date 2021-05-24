<?php

namespace Merqueo\Traits;

trait Response
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
