<x-mail::message>

  # From:
  {{ $lead->email }} - {{ $lead->name }}

  # Message:
  {{ $lead->message }}

</x-mail::message>
