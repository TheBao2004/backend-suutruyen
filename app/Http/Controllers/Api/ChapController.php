<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chap;
use Illuminate\Http\Request;
use Saboohy\HttpStatus\Success;
use Saboohy\HttpStatus\Server;

class ChapController extends Controller
{


    public function detail ($slug = '') {

        try {

            $response = [];

            $chap = Chap::where('slug', $slug)->where('active', 1)->first();

            if (!empty($chap)) {
                $response = response()->json([
                    'success' => true,
                    'data' => [
                        'chap' => $chap,
                        'comic' => $chap->comic,
                        'list' => Chap::listShow($chap->comic_id, false)
                    ],
                    'message' => Success::OK->message(),
                    'alert' => 'Dữ liệu đã được lấy'
                ], Success::OK->value);
            } else {
                $response = response()->json([
                    'success' => false,
                    'data' => [],
                    'message' => Success::NO_CONTENT->message(),
                    'alert' => 'Không có dữ liệu'
                ], Success::OK->value);
            }

            return $response;

        } catch (\Throwable $th) {

            return response()->json(
                [
                    'message' => Server::INTERNAL_SERVER_ERROR->message(),
                    'alert' => 'Lỗi liên kết đến server'
                ],
                Server::INTERNAL_SERVER_ERROR->value
            );
        }

    }



}
