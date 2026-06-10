<?php

namespace App\Notifications;

use App\Models\Idea;
use Illuminate\Bus\Queueable; //საჭიროა იმისთვის, რომ თუ მომავალში ბევრი იმეილის გაგზავნა
use Illuminate\Contracts\Queue\ShouldQueue; //მოგვიწევს, საიტი არ "გაიჭედოს" და გაგზავნის პროცესი ფონურ რეჟიმში (რიგებში - Queues) გადავიდეს.
use Illuminate\Notifications\Messages\MailMessage; //ეს გვეხმარება, რომ იმეილის დიზაინი (ტექსტები, ლამაზი ღილაკები) კოდით მარტივად ავაწყოთ, HTML-ის წერის გარეშე.
use Illuminate\Notifications\Notification; // მთავარი "მშობელი" კლასი. მისგან მემკვიდრეობით იღებს შენი IdeaPublished კლასი ყველა იმ თვისებას, რაც ნოტიფიკაციას სჭირდება.

class IdeaPublished extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected Idea $idea)
    {
        // აქ შემოგვაქვს მონაცემები
    }

    /**
     * ეს მეთოდი ლარაველს ეუბნება: "საით გაუშვა ეს შეტყობინება?". ამჟამად
     * მასში წერია მხოლოდ ['mail'], რაც ნიშნავს, რომ შეტყობინება გაიგზავნება
     * მხოლოდ ელ-ფოსტაზე. თუ აქ ჩაწერდი ['mail', 'database'],
     * მაშინ იმეილთან ერთად ბაზაშიც შეინახავდა.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * ეს არის ფუნქცია, რომელიც აგენერირებს იმეილის შინაარსს. ->line(...)
     * — ამატებს ჩვეულებრივ ტექსტის ხაზს (აბზაცს). ->action(...) —
     * ქმნის დიდ, ლამაზ ღილაკს. პირველი პარამეტრია ღილაკის ტექსტი,
     * მეორე კი — ბმული (URL), სადაც მომხმარებელი გადავა დაჭერისას.
     * იმეილის აწყობა
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/ideas/index/' . $this->idea->id);
        return (new MailMessage)
            ->greeting('Hello')
            ->line('You succesfully published a new idea') // ეს არის მაგალითები და შემიძლია შევცვალო
            ->action('Read it', $url) // ეს არის მაგალითები და შემიძლია შევცვალო
            ->line('Thank you '); // ეს არის მაგალითები და შემიძლია შევცვალო
    }

    /**

     * ეს მეთოდი ახლა ცარიელია, რადგან via მეთოდში ბაზა
     * (database) არ გაქვს მითითებული. თუ გადაწყვეტ, რომ
     * შეტყობინებები მონაცემთა ბაზაშიც შეინახო (მაგალითად,
     *  საიტზე "ზანზალაკის" ნიშანზე დასახატად), აქ ჩაწერდი
     * იმ მონაცემებს, რისი შენახვაც გინდა JSON ფორმატში
     * (მაგ. ['idea_title' => $this->idea->title]).
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
