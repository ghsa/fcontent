# FContent 

FContent is a CMS designed to Laravel developers which usually creates html/css files with blade and need a fast way to make dynamic alterable fields.

All you need to do is put FContent code with the type and name of your field, along the web page content.

After create your web page, you can open FContent panel and generate fields of these pages, and then, you will be able to edit de content.


## Installation
```
composer require ghsa/fcontent
```

### Service Provider
Copy de service provider in config/app.php 

```
FContent\Providers\FContentServiceProvider::class
```

Copy de middleware authentication  in kernel.php or use your own authentication middleware publishing de config file.
```
...
'fcontent.auth' => \FContent\Middleware\FContentAuth::class,
...
```

## How to Use
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
2. Put your username and password
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