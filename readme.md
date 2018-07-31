# FContent Documentation

FContent is a CMS project, build to help php programers that use Laravel and Blade template engine to manage a web page content as easyer as possible. 

All you need to do is put FContent tags with the name and type of your field, along the web page content.

After create your web page, you can open FContent panel and generate fields of these pages, and then, you will be able to edit de content.



## Installation
Clone repository into you app

### Service Provider
Copy de service provider im config/app.php 

```
FContent\Providers\FContentServiceProvider::class
```

Copy de middleware authentication or use your own authentication middleware in kernel.php
```
...
fcontent.auth' => \FContent\Middleware\FContentAuth::class,
...
```



## Tags for Fields
To create a tag field with FContent you put your tag in this form: [[ type:field_name ]]

Filed types:
- text
- html
- image
- file