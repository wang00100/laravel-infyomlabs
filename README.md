### 在InfyOmLabs上加了一点
https://github.com/InfyOmLabs

要求：php 7.3

运行步骤
```
git clone  https://github.com/wang00100/laravel-infyomlabs.git
composer install

rm vendor/infyomlabs
git checkout .

php artisan key:generate
```

如果修改 vue 组件 resources/js 中的内容则运行
```
npm install
npm run dev
```


### resources/model_schemas json 文件 examples
```
[
    {
        "name": "id",
        "dbType": "increments",
        "htmlType": "number",
        "validations": "",
        "searchable": true,
        "fillable": false,
        "primary": true,
        "inForm": false,
        "inIndex": true,
        "inView": true
    },
    {
        "name": "title",
        "title": "标题",
        "dbType": "string",
        "htmlType": "text",
        "validations": "",
        "searchable": true,
        "fillable": true,
        "primary": false,
        "inForm": true,
        "inIndex": true,
        "inView": true
    },
    {
        "name": "cover",
        "title": "封面",
        "dbType": "string",
        "htmlType": "vince.fields.avatar", //单张图上传
        "validations": "",
        "searchable": true,
        "fillable": true,
        "primary": false,
        "inForm": true,
        "inIndex": true,
        "inView": true
    },

    {
        "name": "staffs",
        "title": "作者",
        "dbType": "string",
        "htmlType": "vince.fields.select", //逻辑关系
        "data_url": "/api/v1/staff",
        "validations": "",
        "searchable": true,
        "fillable": true,
        "primary": false,
        "inForm": true,
        "inIndex": true,
        "inView": true
    },
    {
        "name": "media",
        "title": "媒体文件",
        "dbType": "string",
        "htmlType": "vince.fields.file", //文件 mp3 mp4
        "validations": "",
        "searchable": true,
        "fillable": true,
        "primary": false,
        "inForm": true,
        "inIndex": true,
        "inView": true
    },
    {
        "name": "content",
        "title": "介绍内容",
        "dbType": "text",
        "htmlType": "vince.fields.quill_editor", //富文本编辑
        "validations": "",
        "searchable": true,
        "fillable": true,
        "primary": false,
        "inForm": true,
        "inIndex": true,
        "inView": true
    },
    {
        "name": "created_at",
        "dbType": "timestamp",
        "htmlType": "date",
        "validations": "",
        "searchable": false,
        "fillable": false,
        "primary": false,
        "inForm": false,
        "inIndex": false,
        "inView": true
    },
    {
        "name": "updated_at",
        "dbType": "timestamp",
        "htmlType": "date",
        "validations": "",
        "searchable": false,
        "fillable": false,
        "primary": false,
        "inForm": false,
        "inIndex": true,
        "inView": true
    }
]

```




# 使用文档


php artisan migrate
<!-- 初始化 users 数据库 -->
> https://infyom.com/open-source/schema-builder/docs


php artisan infyom:scaffold $MODEL_NAME$
详细用法 https://blog.csdn.net/weixin_28686771/article/details/116050577

php artisan infyom:api_scaffold cat --

// 回滚删除
php artisan infyom:rollback staff api_scaffold
php artisan infyom:rollback cat api_scaffold
php artisan infyom:rollback tag api_scaffold
php artisan infyom:rollback config api_scaffold
php artisan infyom:rollback page_config api_scaffold
php artisan infyom:rollback Post api_scaffold
php artisan infyom:rollback test api_scaffold
php artisan infyom:rollback vince api_scaffold
php artisan infyom:rollback article api_scaffold

//分类
php artisan infyom:api_scaffold cat --fieldsFile=resources/model_schemas/cat.json --paginate=60

//从表中生产
```
php artisan blueprint:build # 根据 /draft.yaml生成
php artisan backpack:crud table_name #  table_name 替换为实际的表名
```


draft.yaml
```
models:
  keyword:
    title: string:100

  article:
    title: string:400
    type: enum:video,audio,article
    content: text
    keywors: string:400

```



php artisan infyom:api_scaffold keyword --fieldsFile=resources/model_schemas/keyword.json
php artisan infyom:api_scaffold staff --fieldsFile=resources/model_schemas/staff.json --paginate=30
php artisan infyom:api_scaffold staff --fieldsFile=resources/model_schemas/staff.json


php artisan migrate


php artisan infyom:rollback keyword scaffold_api



#综合
```
php artisan blueprint:build && php artisan migrate && php artisan backpack:crud #table_name
```

##### 第一步  

通过 [Blueprin][Blueprin]   
生成 Controllers factories migrations Models Feature  等   
生成 view.blade.php   
更新 routes  

```
php artisan blueprint:build # 创建
php artisan blueprint:erase # 删除
php artisan blueprint:init
php artisan blueprint:new  
php artisan blueprint:stubs
php artisan blueprint:trace
```

##### 第二步
运行 migrations 建立数据库表 （数据库迁移）
```
php artisan migrate #建立
php artisan migrate:rollback --step=1 #回滚
```

##### 第三部
根据数据库的表生成backpack将使用的实际文件
```
php artisan backpack:crud tag
```




[Blueprin]: https://blueprint.laravelshift.com/docs/generating-components/
[Backpack]: https://backpackforlaravel.com/docs/5.x/crud-tutorial#generate-files
