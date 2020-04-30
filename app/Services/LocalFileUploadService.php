<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class LocalFileUploadService
{
    /**
     * @var mixed
     */
    private $file;

    /**
     * @var mixed
     */
    private $file_name;

    /**
     * @param UploadedFile $file
     */
    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * @param $path
     * @return mixed
     */
    public function save($path)
    {
        $this->file->storeAs($path, $this->generateFileName($path));

        return $this;
    }

    /**
     * @return mixed
     */
    protected function generateFileName()
    {
        return $this->file_name = $this->file->hashName();
    }
}
