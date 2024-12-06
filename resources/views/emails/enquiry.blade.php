<x-mail::message>
# {{$data['subject']}}

<h3>First Name: {{$data['firstname']}}</h3>
<h3>Last Name: {{$data['lastname']}}</h3>
<h3>Email: {{$data['email']}}</h3>
<h3>Message: {{$data['contentMessage']}}</h3>

<x-mail::button :url="$url">
New Products
</x-mail::button>

Thanks,<br>
H&l Gifts @Support_team
</x-mail::message>