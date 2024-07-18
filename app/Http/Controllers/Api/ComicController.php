<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Chap;
use App\Models\Comic;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Saboohy\HttpStatus\Success;
use Saboohy\HttpStatus\Server;

class ComicController extends Controller
{

    public function lastChapComic()
    {

        try {

            $response = [];

            $comicsCollection = Comic::where('active', 1)->orderBy('updated_at', 'desc')->take(16);

            if ($comicsCollection->count() >= 1) {

                $comics = [];

                foreach ($comicsCollection->get() as $com) {

                    $comics[] = [
                        'comic' => $com,
                        'chaps' => $com->chaps->count()
                    ];

                }

                $response = response()->json([
                    'success' => true,
                    'data' => $comics,
                    'message' => Success::OK->message(),
                    'alert' => 'Dữ liệu đã được lấy'
                ], Success::OK->value);
            } else {
                $response = response()->json([
                    'success' => true,
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




    public function fullComic()
    {

        try {

            $response = [];

            $comicsCollection = Comic::where('active', 1)->where('status', 3)->orderBy('updated_at', 'desc')->take(16);

            if ($comicsCollection->count() >= 1) {

                $comics = [];

                foreach ($comicsCollection->get() as $com) {

                    $comics[] = [
                        'comic' => $com,
                        'chaps' => $com->chaps->count()
                    ];

                }

                $response = response()->json([
                    'success' => true,
                    'data' => $comics,
                    'message' => Success::OK->message(),
                    'alert' => 'Dữ liệu đã được lấy'
                ], Success::OK->value);
            } else {
                $response = response()->json([
                    'success' => true,
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


    public function newComic()
    {

        try {

            $response = [];

            $comicsCollection = Comic::where('active', 1)->where('status', 1)->orderBy('updated_at', 'desc')->take(10);

            if ($comicsCollection->count() >= 1) {

                $comics = [];

                foreach ($comicsCollection->get() as $com) {

                    $arrKeyword = [];
                    $countKeyword = 0;

                    foreach (json_decode($com->keywords, true) as $key) {
                        $nameSlug = Keyword::getNameSlug(str_replace('tu-khoa-', '', $key));
                        $arrKeyword[] = [
                            'name' => $nameSlug['name'],
                            'slug' => $nameSlug['slug'],
                        ];
                        $countKeyword++;
                        if($countKeyword >= 3) break;

                    }

                    $comics[] = [
                        'comic' => $com,
                        'keywords' => $arrKeyword,
                        'chaps' => $com->chaps->count()
                    ];
                }

                $response = response()->json([
                    'success' => true,
                    'data' => $comics,
                    'message' => Success::OK->message(),
                    'alert' => 'Dữ liệu đã được lấy'
                ], Success::OK->value);
            } else {
                $response = response()->json(
                    [
                        'success' => true,
                        'data' => [],
                        'message' => Success::NO_CONTENT->message(),
                        'alert' => 'Không có dữ liệu'
                    ],
                    Success::OK->value
                );
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



    public function updateComic()
    {

        try {

            $response = [];

            $comicsCollection = Comic::where('active', 1)->where('status', 2)->orderBy('updated_at', 'desc')->take(16);

            if ($comicsCollection->count() >= 1) {

                $comics = [];

                foreach ($comicsCollection->get() as $com) {

                    $comics[] = [
                        'comic' => $com,
                        'chaps' => $com->chaps->count()
                    ];

                }

                $response = response()->json([
                    'success' => true,
                    'data' => $comics,
                    'message' => Success::OK->message(),
                    'alert' => 'Dữ liệu đã được lấy'
                ], Success::OK->value);
            } else {
                $response = response()->json([
                    'success' => true,
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



    public function categoryComic($slug = '')
    {

        try {

            $response = [];

            $category = Category::where('slug', $slug)->where('active', 1)->first();

            if(!empty($category)){

                $comicsCollection = Comic::where('categories', 'like', '%' . '"' . 'danh-muc-'.$category->id . '"' . '%')->where('active', 1)->orderBy('updated_at', 'desc')->take(16);

                if ($comicsCollection->count() >= 1) {

                    $comics = [];

                    foreach ($comicsCollection->get() as $com) {

                        $comics[] = [
                            'comic' => $com,
                            'chaps' => $com->chaps->count()
                        ];

                    }

                    $response = response()->json([
                        'success' => true,
                        'data' => [
                            'category' => $category,
                            'list' => $comics
                        ],
                        'message' => Success::OK->message(),
                        'alert' => 'Dữ liệu đã được lấy'
                    ], Success::OK->value);
                } else {
                    $response = response()->json([
                        'success' => true,
                        'data' => [
                            'category' => $category,
                            'list' => []
                        ],
                        'message' => Success::NO_CONTENT->message(),
                        'alert' => 'Không có dữ liệu'
                    ], Success::OK->value);
                }
            }else{
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



    public function keywordComic($slug = '')
    {

        try {

            $response = [];

            $keyword = Keyword::where('slug', $slug)->where('active', 1)->first();

            if(!empty($keyword)){

                $comicsCollection = Comic::where('keywords', 'like', '%' . '"' . 'tu-khoa-'.$keyword->id . '"' . '%')->where('active', 1)->orderBy('updated_at', 'desc')->take(16);

                if ($comicsCollection->count() >= 1) {
                    $response = response()->json([
                        'success' => true,
                        'data' => [
                            'keyword' => $keyword,
                            'list' => $comicsCollection->get()
                        ],
                        'message' => Success::OK->message(),
                        'alert' => 'Dữ liệu đã được lấy'
                    ], Success::OK->value);
                } else {
                    $response = response()->json([
                        'success' => true,
                        'data' => [
                            'keyword' => $keyword,
                            'list' => []
                        ],
                        'message' => Success::NO_CONTENT->message(),
                        'alert' => 'Không có dữ liệu'
                    ], Success::OK->value);
                }
            }else{
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




    public function detailComic($slug = '')
    {


        try {

            $response = [];

            $comic = Comic::where('slug', $slug)->where('active', 1)->first();

            if (!empty($comic)) {

                $arrCategory = [];

                foreach (json_decode($comic->categories, true) as $key) {
                    $nameSlug = Category::getNameSlug(str_replace('danh-muc-', '', $key));
                    $arrCategory[] = [
                        'name' => $nameSlug['name'],
                        'slug' => $nameSlug['slug'],
                    ];
                }

                $arrKeyword = [];

                foreach (json_decode($comic->keywords, true) as $key) {
                    $nameSlug = Keyword::getNameSlug(str_replace('tu-khoa-', '', $key));
                    $arrKeyword[] = [
                        'name' => $nameSlug['name'],
                        'slug' => $nameSlug['slug'],
                    ];
                }

                $response = response()->json([
                    'success' => true,
                    'data' => [
                        'comic' => $comic,
                        'chaps' => Chap::listShow($comic->id),
                        'categories' => $arrCategory,
                        'keywords' => $arrKeyword,
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
