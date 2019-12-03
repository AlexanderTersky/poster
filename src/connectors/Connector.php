<?php


namespace Wtolk\Poster\Connectors;

use Carbon\Carbon;

class Connector
{
    private $tasks = [];

    /**
     * Add tasks into tasks property
     * @param array $data
     * @param string $action
     * @param string $connector
     */
    protected function addTask($data, $action, $connector)
    {
        $data['action'] = $action;
        $data['connector'] = $connector;
        $this->tasks[] = $data;
    }

    /**
     * Validate fieds and set datetime
     * @param array $post
     * @param array $rules
     * @return array
     * @throws \Exception
     */
    protected static function prepare($post, $rules)
    {
        foreach ($rules as $field => $rule) {

            if (in_array('required', $rule)) {
                if (!isset($post[$field])) {
                    throw new \Exception('Field ' . $field . ' is required !');
                }
            }

            if (in_array('datetime', $rule)) {
                $time = Carbon::parse($post[$field]);
                if (!$time) {
                    throw new \Exception('Invalid datetime format in field "' . $field . '" !');
                }
                $post[$field] = $time->startOfMinute()->toDateTimeString();
            }
        }
        return $post;
    }

    /**
     * Get array of tasks
     * @return array
     */
    public function getTasks()
    {
        return $this->tasks;
    }
}