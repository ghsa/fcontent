<?php

namespace FContent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Field extends Model 
{

    protected $fillable = [
        'page_id',
        'user_id',
        'name',
        'type',
        'value'
    ];


    const TYPE_TEXT = 1;
    const TYPE_HTML = 2;
    const TYPE_IMAGE = 3;
    const TYPE_FILE = 4;

    const FILE_PATH_BASE= "fcontent_uploads";

    public static function getTypeByName($typeName) 
    {
        $typesArray = [
            'text'  => self::TYPE_TEXT,
            'html'  => self::TYPE_HTML,
            'image' => self::TYPE_IMAGE,
            'file'  => self::TYPE_FILE,
        ];

        return $typesArray[$typeName];
    }

    public static function getNameByType($type) 
    {
        $typesArray = [
            self::TYPE_TEXT => 'text',
            self::TYPE_HTML => 'html',
            self::TYPE_IMAGE => 'image',
            self::TYPE_FILE =>  'file',
        ];

        return $typesArray[$type];
    }

    public function getProperName()
    {
        $name = str_replace([".", '_'], " ", $this->name);
        return \ucwords($name);
    }

    public function uploadFile(UploadedFile $file)
    {
        $upload = $file->store(self::FILE_PATH_BASE, config('fcontent.file_driver'));
        return $upload;
    }


    public function deleteFile()
    {
        if(base_path().self::FILE_PATH_BASE.$this->value) {
            unlink(base_path().self::FILE_PATH_BASE.$this->value);
        }

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getField(Page $page, $type, $name) {
        $field = Field::where('page_id', $page->getId())
            ->where('type', self::getTypeByName($type))
            ->where('name', $name)
            ->first();

        if(!($field instanceof Field)) {
            $field = Field::create([
                'page_id' => $page->getId(),
                'type' => self::getTypeByName(),
                'name' => $name,
                'value' => self::getFakeValue(self::getTypeByName($type))
            ]);
        }

        return $field;
        
    }

    public static function getFakeValue($type)
    {
        switch($type){
            case self::TYPE_TEXT:
                return "fake value";
            case self::TYPE_HTML:
                return "fake html value ....";
            case self::TYPE_IMAGE:
                return null;
            case self::TYPE_FILE:
                return null;
        }
    }


    public function getType() 
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function saveField($type, $name)
    {
        $this->save();
    }

    public function uploadAndSaveFile(UploadedFile $file)
    {
        $upload = $this->uploadFile($file);
        $this->value = $upload;
        $this->save();
    }

    public function getFormName()
    {
        return $this->type."_".$this->name;
    }
    
}
