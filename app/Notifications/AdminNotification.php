<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $type; 
    public $notification; 
    public $data = []; 
    public function __construct($type,$message,$data)
    {
        $this->type = $type;
        $this->notification = $message;
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */

     
    public function via($notifiable)
    {
        // return ['database','mail'];
        return $notifiable->prefers_sms ? ['vonage'] : ['mail', 'database'];

        
        
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
    
        return (new MailMessage)
       ->subject('A Contact Information has arrived.') // Set the email subject
        ->greeting('Hello !')
        ->line('A Contact Information has arrived from '.$this->data['name'].'.')
        ->line('Email : '.$this->data['email'])
        ->line('Login admin panel to see more details.');
   
       

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type' => $this->type,
            'notification' => $this->notification,
        ];
    }
}
