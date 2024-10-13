<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Reminder extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $title, $link, $type, $m_id, $description;

    public function __construct($title, $link, $type, $m_id, $description)
    {
      
        $this->title       = $title;
        $this->link        = $link;
        $this->type        = $type;
        $this->m_id        = $m_id;
        $this->description = $description;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
       
        return [

            'title'       => $this->title,
            'link'        => $this->link,
            'type'        => $this->type,
            'm_id'        => $this->m_id,
            'description' => $this->description,

        ];
    }
}
