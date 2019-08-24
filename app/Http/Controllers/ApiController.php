<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable|array
     */
    public function menus()
    {
        $result = [
            [
                'name' => 'Наталья Владимировна',
                'latitude' => '43.222052',
                'longitude' => '76.871358',
                'foods' => [
                    [
                        'id' => 1,
                        'name' => 'Плов',
                        'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                        'images' => [
                            'https://e1.edimdoma.ru/data/recipes/0009/9458/99458-ed4_wide.jpg?1494418621',
                            'https://www.gastronom.ru/binfiles/images/20170418/b87bb973.jpg'
                        ]
                    ],
                    [
                        'id' => 2,
                        'name' => 'Манты',
                        'description' => 'Рубленное мясо говядины, лук.',
                        'images' => [
                            'https://img.delo-vcusa.ru/2017/05/Manty-s-myasom-wag-13-690x430.jpg',
                            'https://e0.edimdoma.ru/data/recipes/0010/8500/108500-ed4_wide.jpg?1511538678'
                        ]
                    ]
                ],
                'delivery' => [
                ]
            ]
        ];
        return $result;
    }
}
