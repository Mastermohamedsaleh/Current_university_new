<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAssignmentAdded extends Notification implements ShouldQueue
{
    use Queueable;

    protected $assignment;

    public function __construct($assignment)
    {
        $this->assignment = $assignment;
    }




    public function via($notifiable)
    {
      return ['database', 'broadcast'];
    }



    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    
    public function toArray($notifiable)
    {
        return [
            'message' => '📘 تم إضافة واجب جديد: ' . $this->assignment->name,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => '📘 تم إضافة واجب جديد: ' . $this->assignment->name,
        ]);
    }

    public function broadcastOn()
    {
        return new PrivateChannel('student.' . $this->assignment->classroom_id);
    }

}
