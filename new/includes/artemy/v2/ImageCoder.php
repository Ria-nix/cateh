<?php
namespace v2artemy;
use FileNotFoundException;
use FileNotImageException;
use FileUploadException;
use MaxFileSizeException;

class ImageCoder
{
    const DEFAULT_LOGO_SIZE = 6291456;
    /**
     * @var array|mixed
     */
    public array $file;
    private int $max_file_size;

    /**
     * FilePostUploader constructor.
     * @param string $post_file_name
     * @param int $max_file_size
     */
    public function __construct(string $post_file_name, int $max_file_size)
    {
        if (!empty($_FILES[$post_file_name])) {
            $this->file = $_FILES[$post_file_name];
        }
        $this->max_file_size = $max_file_size;
    }

    /**
     * @throws FileNotFoundException
     * @throws MaxFileSizeException
     * @throws FileUploadException
     * @throws FileNotImageException
     */
    public function encode(): string
    {

        //проверка на наличие файла
        if (empty($this->file)) {
            throw new FileNotFoundException("Файл не был загружен.");
        }

        //проверка на ошибки с POST массива файла
        switch ($this->file["error"]) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new MaxFileSizeException("Клиентская проверка на максимальный размер файла на сервере не пройдена.");
            case UPLOAD_ERR_PARTIAL:
            case UPLOAD_ERR_NO_FILE:
            case UPLOAD_ERR_NO_TMP_DIR:
            case UPLOAD_ERR_CANT_WRITE:
            case UPLOAD_ERR_EXTENSION:
                throw new FileUploadException("Клиентская ошибка загрузки файла.");
        }

        //проверка веса файла на сервере
        if (filesize($this->file["tmp_name"]) > $this->max_file_size) {
            throw new MaxFileSizeException("Серверная проверка на максимальный размер файла на сервере не пройдена.");
        }


        //проверка на расширение
        $file_extension = match (mime_content_type($this->file["tmp_name"])) {
            "image/png" => "png",
            "image/jpeg" => "jpg",
            "image/svg+xml" => "svg",
            default => throw new FileNotImageException("Недопустимый тип файла"),
        };
            //запись файла на сервер с расширением
    return file_get_contents($this->file["tmp_name"]);
    }

    public function getMimeType(): string
    {
        return mime_content_type($this->file["tmp_name"]);
    }
}