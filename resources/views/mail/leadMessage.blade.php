<x-mail::message>

  # From:
  {{ $lead->name }} - {{ $lead->email }}

  # Message:
  {{ $lead->message }}

</x-mail::message>
