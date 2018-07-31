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



### Create you template
To create a tag field with FContent you put inside you page.blade.php file:

```
$fcontent['type:name_of_field']
``` 
Example:
```
<h1>
{{$fcontent['text:title']}}
</h1>
<p>
{!! $fcontent['html:content_page'] !!}
</p>
```

### Configure your page
1. Open http://localhost:8000/fcontent
2. Put your user and password
3. Insert the page with the name of your file relative to resources folder
4. Fields will be generated
5. Fill fields


### Render the page
````
use FContent\FContent;
````

```
$page = Page::find(1);

$name = "Just an example var";

return FContent::pageRender($page, compact('name'));
```


Filed types:
- text
- html
- image
- file