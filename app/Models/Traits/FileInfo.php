<?php


namespace App\Models\Traits;


use App\Filesystem\Local;

trait FileInfo
{

    public function getFileInfo()
    {
        $file_attribute = isset($this->file) ? $this->file : $this->link;
        if (empty($file_attribute)) return ['name' => null, 'extension' => null, 'filename' => null];
        $file = new Local();
        $file->setFileData($file_attribute);
        list($name, $extension, $filename) = $file->getFileData();
        return compact('name', 'extension', 'filename');
    }

    public function getTitledFileName()
    {
        $title = isset($this->title) ? $this->title : $this->entity->title;
        return "{$title}.{$this->getFileInfo()['extension']}";
    }

    public function getFileName()
    {
        $file = $this->getFileInfo();
        $explode = explode("_",$file['name']);
        if(count($explode)){
            unset($explode[0]);
            $file['name'] = implode("_",$explode);
        }
        return "{$file['name']}.{$file['extension']}";
    }

    public function getFileNameAttribute()
    {
        return $this->getFileName();
    }

}