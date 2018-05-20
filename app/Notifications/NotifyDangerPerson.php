<?php

namespace App\Notifications;

use App\Person;
use App\DangerPerson;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyDangerPerson extends Notification
{
    use Queueable;

    public $person;
    public $danger_notification;

    public function __construct(Person $person, DangerPerson $danger_notification)
    {
        $this->person = $person;
        $this->danger_notification = $danger_notification;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'person' => $this->person,
            'danger_notification' => $this->danger_notification
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'data' => [
                'person' => $this->person,
                'danger_notification' => $this->danger_notification
            ]
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
