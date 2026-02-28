<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IdealJobFound extends Notification
{
    use Queueable;

    public function __construct(
        private string $jobTitle,
        private string $company,
        private string $location
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('¡Oferta Ideal Encontrada! 🎯')
            ->greeting('¡Buenas noticias!')
            ->line("Hemos encontrado una oferta ideal para ti:")
            ->line("**{$this->jobTitle}** en **{$this->company}**")
            ->line("Ubicación: {$this->location}")
            ->action('Ver la oferta', url('/'))
            ->line('¡No dejes pasar esta oportunidad!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => '¡Oferta Ideal Encontrada! 🎯',
            'message' => "{$this->jobTitle} en {$this->company}",
            'company' => $this->company,
            'location' => $this->location,
            'type' => 'ideal_job'
        ];
    }
}
