<?php
//php lubed --plan=springboot2.default --output=springboot2_default --data=dingtalk --service=Spring.SpringPlan

return [
    'plan'=>'springboot2',
    'dataSourceClass'=>'\\Lubed\\Data\\MySQLDataSource',
    //输出 路径
    'outputPath'=>'%sdist/%s/',
    //生成器
    'generator'=>[
        'base'=>[
            //命名空间
            'namespace'=>'com.lubed',
            'baseNamespace'=>'com.lubed.common',
            //源代码 路径
            'sourcePath'=>'src/java/main/',
            'composerName'=>'jeecg/lubed',//TODO.MAVEN
            'projectErrInitNum'=>13900,//TODO:???
            'errorNumIncrease'=>100 //TODO:??
        ],
        'project'=>[
            'platform'=>[
                'oa_departments'=>'OaDepartments',
            ],
        ],
        'templates'=>[
            //generate spring web Controller
            'default/Controller.java'=>[
                'path'=>'src/java/main/controllers/%s.java',
                'generate_by_project'=>true,
                'base_class'=>'BaseAuthController', //parent class
                'suffix'=>'Controller',
            ],
//            //generate mybatis Model
//            'mapper.java'=>[
//                'path'=>'src/java/main/mappers/%s.java',
//                'generate_by_project'=>true,
//                'use_module'=>0, //TODO:???
//            ],

        ],
    ],
];