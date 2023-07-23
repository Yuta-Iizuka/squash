<?php
namespace App\Services;

use App\Repositories\EventRepository;

class EventService
{
    protected $EventRepository;

    public function __construct(
        EventRepository $EventRepository)
    {
        $this->EventRepository = $EventRepository;
    }

    public function getEvent($id)
    {
        return $this->EventRepository->getEvent($id);
    }

    public function getEventEdit($id)
    {
        return $this->EventRepository->getEventEdit($id);
    }

    public function getEventList($id)
    {
        return $this->EventRepository->getEventList($id);
    }

    public function getEventId($user)
    {
        $id = $user->info[0]->id;
        return $id;
    }

    public function eventCreate($request)
    {
        return $this->EventRepository->eventCreate($request);
    }

    public function eventSave($request,$id)
    {
        return $this->EventRepository->eventSave($request,$id);
    }

}

