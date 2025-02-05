<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Saboohy\HttpStatus\Success;
use Saboohy\HttpStatus\Server;


class KeywordController extends Controller
{

    public function index () {


        try {

            $response = [];

            $keywordCollection = Keyword::where('active', 1)->orderBy('updated_at', 'desc')->take(16);

            if($keywordCollection->count() >= 1){
                $response = response()->json([
                    'success' => true,
                    'data' => $keywordCollection->get(),
                    'message' => Success::OK->message(),
                    'alert' => 'Dữ liệu đã được lấy'
                ], Success::OK->value);
            }else{
                $response = response()->json([
                        'success' => true,
                        'data' => [],
                        'message' => Success::NO_CONTENT->message(),
                        'alert' => 'Không có dữ liệu'
                    ], Success::OK->value);
            }

            return $response;

        } catch (\Throwable $th) {

            return response()->json([
                [
                    'message' => Server::INTERNAL_SERVER_ERROR->message(),
                    'alert' => 'Lỗi liên kết đến server'
                ]
            ], Server::INTERNAL_SERVER_ERROR->value);

        }


    }

}
