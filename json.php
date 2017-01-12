<?php

/**

 * Created by PhpStorm.

 * User: kevin

 * Date: 11/19/16

 * Time: 5:40 PM

 */



$output = [

    'success'=>true,

    'data'=>[

        [

            'recipe_name'=>"Roasted Brussels Sprouts with Pomegranate",

            "sourceDisplayName"=> "Vodka and Biscuits",

            'ingredients'=>[

                "brussels sprouts",

                "olive oil",

                "salt",

                "pepper",

                "pomegranate",

                "toasted pine nuts",

                "grated parmesan cheese",

                "lemon"

            ],

            "totalTimeInSeconds"=> 2700,

            "imageUrlsBySize"=> [

                "90"=> "https://lh3.googleusercontent.com/5y3EDiTt6VGRX5BizPvwK1C3LGDEa897vkBWHj4kq44OHBQMNlywdoDcP5PJCDUeym73zFS-U2q899xUMcUq_w=s90-c"

            ]

        ],

        [

            "recipe_name"=> "Dump-and-Bake Smothered Chicken with Bacon",

            "sourceDisplayName"=> "The Seasoned Mom",

            "ingredients"=> [

                "boneless skinless chicken breasts",

                "ranch salad dressing mix",

                "Alfredo sauce",

                "chopped bacon",

                "provolone cheese",

                "fresh parsley"

            ],

            "totalTimeInSeconds"=> 2400,

            "imageUrlsBySize"=> [

                "90"=> "https://lh3.googleusercontent.com/vVQAeakPF0f4PFA0daxvauCyZg3wlEykn600epqWfsuBh4F25NwimdE0mDYPRlJbMxr888pJLYixrBWw5jPBsw=s90-c"

            ]

        ]

    ]

];



$outputString = json_encode($output);



print($outputString);

?>