<?php


namespace Wtolk\Poster;

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;
use Wtolk\Poster\Connectors\VK;
use Wtolk\Poster\Connectors\OK;
use Wtolk\Poster\Connectors\Telegram;

class Poster
{
    private $vk;
    private $telegram;
    private $ok;

    public function vk(): VK
    {
        if (!$this->vk) {
            $this->vk = new VK();
        }
        return $this->vk;
    }

    public function telegram(): Telegram
    {
        if (!$this->telegram) {
            $this->telegram = new Telegram();
        }
        return $this->telegram;
    }

    public function ok(): OK
    {
        if (!$this->ok) {
            $this->ok = new OK();
        }
        return $this->ok;
    }

    public function toArray(): array
    {
        $output = [];
        try {
            $output['uuid'] = Uuid::uuid1()->toString();
        } catch (UnsatisfiedDependencyException $e) {
            $output['uuid'] = uniqid('', true);
        }
        $output['tasks'] = array_merge(
            $this->vk->getTasks(),
            $this->telegram->getTasks(),
            $this->ok->getTasks()
        );
        return $output;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}