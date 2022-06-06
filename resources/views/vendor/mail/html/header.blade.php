<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://indisirkular.id/images/icon-indi-pair-color.svg" class="logo" alt="indi-circular logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
