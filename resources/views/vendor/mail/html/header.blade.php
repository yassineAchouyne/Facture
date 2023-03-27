@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://i.postimg.cc/xCRNVwhF/icon-logo-png.webp" class="logo" alt="Factura Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
