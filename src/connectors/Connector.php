<?php


namespace Wtolk\Poster\Connectors;

use Carbon\Carbon;

class Connector
{
    private $tasks = [];

    protected function addTask($data, $action, $connector)
    {
        $data['action'] = $action;
        $data['connector'] = $connector;
        $this->tasks[] = $data;
    }

    protected static function prepare($post, $rules)
    {
        foreach ($rules as $field => $rule) {

            if (in_array('required', $rule)){
                if (!isset($post[$field])) {
                    throw new \Exception('Field ' . $field . ' is required !');
                }
            }

            if (in_array('datetime', $rule)){
                $time = Carbon::parse($post[$field]);
                if (!$time){
                    throw new \Exception('Invalid datetime format in field "' . $field . '" !');
                }
                $post[$field] = $time->startOfMinute()->toDateTimeString();
            }
        }
        return $post;
    }

    public function getTasks()
    {
        return $this->tasks;
    }
}