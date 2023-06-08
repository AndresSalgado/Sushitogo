@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<!-- <img src="{{ asset('Img/logox1.png') }}" class="logo" alt="Logo Sushi To go"> -->
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
