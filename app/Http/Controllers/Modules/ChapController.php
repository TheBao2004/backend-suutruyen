<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Chap;
use App\Models\Comic;
use Illuminate\Http\Request;

class ChapController extends Controller
{

    private function muckData () {

        return [

            'Hài Đế Vi Tôn' => [
                'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                'Chap1' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'Quảng Cáo' => [
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    ]
                ],
                'Chap2' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ],
                'Chap3' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ]
            ],
            'Bắt Đầu Livestream Ở Địa Phủ: Phát Sóng Trực Tiếp Ở Đây Ai Dám Đến' => [
                'Chap1' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'Quảng Cáo' => [
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    ]
                ],
                'Chap2' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ],
                'Chap3' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ]
            ],
            'Ta Là Nhân Vật Phản Diện Đại Thiếu Gia' => [
                'Chap1' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'Quảng Cáo' => [
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    ]
                ],
                'Chap2' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ],
                'Chap3' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ]
            ],
            'Đường Thần Thiên Mệnh' => [
                'Chap1' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'Quảng Cáo' => [
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    ]
                ],
                'Chap2' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ],
                'Chap3' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ]
            ],
            'Tu Tiên Phải Dựa Vào Sugar Mommy' => [
                'Chap1' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'Quảng Cáo' => [
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    ]
                ],
                'Chap2' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ],
                'Chap3' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ]
            ],
            'Luân Bàn Thế Giới' => [
                'Chap1' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'Quảng Cáo' => [
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    ]
                ],
                'Chap2' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ],
                'Chap3' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ]
            ],
            'Nhân Vật Webtoon Na Kang Lim' => [
                'Chap1' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'Quảng Cáo' => [
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                        'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    ]
                ],
                'Chap2' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ],
                'Chap3' => [
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                    'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
                ]
            ],
                  'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
            'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
            'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
            'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
            'https://th.bing.com/th/id/OIP.UTjbPMGFdNG7lr0OKqlkRQHaNL?pid=ImgDet&w=184&h=327&c=7&dpr=1.3',
        ];

    }


    public function index (Comic $comic) {

        $model = Chap::where('comic_id', $comic->id)->orderBy('stt', 'desc')->get();

        return view('modules.chap.index', compact(['comic', 'model']));

    }


    public function add (Comic $comic) {

        $folderImage = FileController::FolderCheckBoxChooseImageChap();

        return view('modules.chap.add', compact(['comic', 'folderImage']));

    }


    public function store (Comic $comic, Request $request) {

        if($comic->book == 1){

            $request->validate([
                'name' => 'required|min:3',
                'stt' => ['required', 'min:1', function($attribute, $value, $fail) use ($comic) {
                    $check = Chap::where('stt', $value)->where('comic_id', $comic->id)->first();
                    if(!empty($check)) $fail("$attribute này đã được chọn");
                }],
                'content' => 'required',
            ], [
                'required' => ':attribute bắt buộc phải nhập',
                'min' => ':attribute phải lớn hơn :min ký tự',
            ], [
                'name' => 'Tên',
                'content' => 'Nội dung',
                'stt' => 'Thứ tự'
            ]);

        }else{

            $request->validate([
                'name' => 'required|min:3',
                'stt' => ['required', 'min:1', function($attribute, $value, $fail) use ($comic) {
                    $check = Chap::where('stt', $value)->where('comic_id', $comic->id)->first();
                    if(!empty($check)) $fail("$attribute này đã được chọn");
                }],
                'path_image_chap_comic' => 'required',
            ], [
                'name.required' => ':attribute bắt buộc phải nhập',
                'path_image_chap_comic.required' => ':attribute bắt buộc phải chọn',
                'min' => ':attribute phải lớn hơn :min ký tự',
            ], [
                'name' => 'Tên',
                'path_image_chap_comic' => 'Ảnh',
                'stt' => 'Thứ tự'
            ]);

        }

        $chap = new Chap();

        $chap->name = $request->name;
        $chap->stt = $request->stt;
        $chap->slug = createSlug($comic->name.'-'.$request->name).'-'.rand(100000, 999999);
        $chap->comic_id = $comic->id;
        if(!empty($request->active)){
            $chap->active = $request->active;
        }
        if($comic->book == 0){
            $content = json_encode($request->path_image_chap_comic);
            $chap->content = $content;
        }else{
            $chap->content = $request->content;
        }

        $chap->save();

        return redirect()->route('admin.chap.index', ['comic' => $comic ])->with('msg', 'Thêm chương truyện '.$comic->name.' thành công');

    }


    public function edit (Chap $item) {

        $folderImage = FileController::FolderCheckBoxChooseImageChap();

        return view('modules.chap.edit', compact(['item', 'folderImage']));

    }


    public function update (Chap $item, Request $request) {

        if ($item->comic->book == 1) {
            $request->validate([
                'name' => 'required|min:3',
                'stt' => ['required', 'min:1', function($attribute, $value, $fail) use ($item){
                    $check = Chap::where('stt', $value)->where('comic_id', $item->comic->id)->where('id', '<>', $item->id)->first();
                    if(!empty($check)) $fail("$attribute này đã được chọn");
                }],
                'content' => 'required',
            ], [
                'required' => ':attribute bắt buộc phải nhập',
                'min' => ':attribute phải lớn hơn :min ký tự',
            ], [
                'name' => 'Tên',
                'content' => 'Nội dung',
                'stt' => 'Thứ tự'
            ]);
        } else {
            $request->validate([
                'name' => 'required|min:3',
                'stt' => ['required', 'min:1', function($attribute, $value, $fail) use ($item){
                    $check = Chap::where('stt', $value)->where('comic_id', $item->comic->id)->where('id', '<>', $item->id)->first();
                    if(!empty($check)) $fail("$attribute này đã được chọn");
                }],
                'path_image_chap_comic' => 'required',
            ], [
                'name.required' => ':attribute bắt buộc phải nhập',
                'path_image_chap_comic.required' => ':attribute bắt buộc phải chọn',
                'min' => ':attribute phải lớn hơn :min ký tự',
            ], [
                'name' => 'Tên',
                'path_image_chap_comic' => 'Ảnh',
                'stt' => 'Thứ tự'
            ]);
        }




        $item->name = $request->name;
        $item->stt = $request->stt;
        $item->slug = createSlug($item->comic->name.'-'.$request->name).'-'.rand(100000, 999999);
        if(!empty($request->active)){
            $item->active = $request->active;
        }else{
            $item->active = 0;
        }
        if($item->comic->book == 0){
            $content = json_encode($request->path_image_chap_comic);
            $item->content = $content;
        }else{
            $item->content = $request->content;
        }

        $item->save();

        return back()->with('msg', 'Sửa chương '.$item->name.' - truyện '.$item->comic->name.' thành công');

    }


    public function delete () {


    }



}
