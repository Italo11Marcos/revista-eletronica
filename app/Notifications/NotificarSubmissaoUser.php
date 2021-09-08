<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotificarSubmissaoUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->from('ergaomnes@favernorte.edu.br', 'ErgaOmnes')
                    ->subject('Confirmação Submissão - ErgaOmnes')
                    ->greeting('Olá!')
                    ->line('Agradecemos considerar nossa revista como meio de compartilhar seu trabalho.')
                    ->line('Em caso de dúvidas, entre em contato pelo e-mail: ergaomnes@favenorte.edu.br')
                    ->line('Profa. Ma. Heidy Cristina Boaventura Siqueira')
                    ->line('Revista Eletrônica Norte Mineira de Direito Erga Omnes');
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
            //
        ];
    }
}
