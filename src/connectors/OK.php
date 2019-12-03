<?php


namespace Wtolk\Poster\Connectors;

class OK extends Connector
{
    const CONNECTOR = 'ok';
    const WALLPOST = 'wallpost';

    /**
     * Add wallpost task
     * @param array $post
     * @throws \Exception
     */
    public function wallpost($post)
    {
        $post = self::prepare($post, [
            'message' => ['required'],
            'execute_at' => ['required', 'datetime']
        ]);

        $this->addTask($post, self::WALLPOST, self::CONNECTOR);
    }
}