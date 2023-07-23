<?php

namespace App\Repositories;

use App\Event;

class EventRepository
{
    public static function getEvent($id)
    {
        $event = Event::where('information_id', '=', $id)
                        ->first();
        return $event;
    }

    public static function getEventEdit($id)
    {
        $event = Event::where('id', '=', $id)
                        ->get()
                        ->toArray();
        return $event;
    }

    public static function getEventList($id)
    {
        $event = Event::where('information_id', '=', $id)
                        ->get()
                        ->toArray();
        return $event;
    }

    public static function eventCreate($request)
    {
        $event = new Event;

        $columns = ['information_id','date','event_name'];
        foreach($columns as $column){
            $event->$column = $request->$column;
        }

        $event->save();
        return $event;
    }

    public static function eventSave($request,$id)
    {
        $event = new Event;
        $record = $event->find($id);

        $columns = ['information_id','date','event_name'];
        foreach($columns as $column){
            $record->$column = $request->$column;
        }

        $record->save();
        return $event;
    }

}
