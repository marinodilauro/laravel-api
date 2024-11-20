<x-mail::message>
  # New Contact Form Message

  <x-mail::panel>
    ## Sender Details
    **Name:** {{ $lead->name }}
    **Email:** {{ $lead->email }}
  </x-mail::panel>

  <x-mail::panel>
    ## Message Content
    {{ $lead->message }}
  </x-mail::panel>

  <x-mail::table>
    | Sent At |
    |:--------|
    | {{ $lead->created_at->format('F j, Y - g:i A') }} |
  </x-mail::table>

  Thanks,<br>
  {{ config('app.name') }}

  <small>This message was sent from your portfolio website's contact form.</small>
</x-mail::message>
