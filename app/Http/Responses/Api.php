<?php
namespace App\Http\Responses;

/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 14.12.17
 * Time: 22:28
 */
class Api
{
    const STATUS_OK = 'OK';
    const STATUS_ERROR = 'error';

    /** @var array  */
    protected $data;

    /** @var string  */
    protected $status;

    /** @var array  */
    protected $errors;

    /**
     * Api constructor.
     * @param array $data
     * @param string $status
     * @param array $errors
     */
    public function __construct(array $data = [], $status = self::STATUS_OK, array $errors = [])
    {
        $this->data = $data;
        $this->status = $status;
        $this->errors = $errors;
    }


    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function toResponse()
    {
        return response()->json($this->toArray());
    }

    public function toArray()
    {
        return [
            'status' => $this->getStatus(),
            'data'   => $this->getData(),
            'errors' => $this->getErrors(),
        ];
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @param array $error
     */
    public function addError($error)
    {
        $this->errors[] = $error;
    }
}