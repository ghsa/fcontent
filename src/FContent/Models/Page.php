<?php

namespace FContent\Models;

use Illuminate\Database\Eloquent\Model;
use FContent\Interfaces\PageInterface;
use Illuminate\Support\Facades\Auth;

class Page extends Model implements PageInterface
{
    protected $fillable = [
        'user_id',
        'name',
        'path',
        'notes'
    ];

    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getPage($path)
    {

        $page = Page::where('path', $path)->first();

        if(!($page instanceOf Page)) {
            $page = Page::create([
                'name' => self::getTempName($path),
                'path' => $path,
                'user_id' => Auth::user()->id
            ]);
        }
        return $page;
    }



    public static function getTempName($path)
    {
        $name =  str_replace([".php", "/", '.blade'], ['', '.', ''], $path);
        return $name;
    }

    public function getAbsolutePath()
    {
        return base_path()."/resources/views/".$this->path;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getPath()
    {
        return $this->path;
    }
    public function setPath($path)
    {
        $this->path = $path;
    }

    public function savePage()
    {
        $this->save();
    }

    public function createOrUpdateField($type, $name, $default = null)
    {
        
        $field = Field::where('type', Field::getTypeByName($type))
            ->where('name', $name)
            ->first();
        if(!($field instanceof Field)) {
            $field = Field::create([
                'page_id' => $this->id,
                'type' => Field::getTypeByName($type),
                'name' => $name,
                'value' => $default != null ? $default : Field::getFakeValue(Field::getTypeByName($type)),
                'user_id' => Auth::user()->id
            ]);
        }
        return $field;
    }

    public function getFields()
    {
        return $this->fields;
    }

}
