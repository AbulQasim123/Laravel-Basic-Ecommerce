<x-mail::message>
# Introduction

The body of your message.
<h2>{{ $details["title"] }}</h2>

<x-mail::button :url="''">
	<h2 align="center">Introduction</h2>
</x-mail::button>

<x-mail::panel>
	<h3>This is the panel content.</h3>
</x-mail::panel>

<x-mail::table>
	<table style="border: 1px solid black; text-align:center">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
	</tr>
	<tr>
		<td>1</td>
		<td>Abul</td>
		<td>abulqasimansari842</td>
	</tr>
	<tr>
		<td>1</td>
		<td>Abul</td>
		<td>abulqasimansari842</td>
	</tr>
	<tr>
		<td>1</td>
		<td>Abul</td>
		<td>abulqasimansari842</td>
	</tr>
	</table>
</x-mail::table>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
