@props(['url'])
<table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:22px 0;">
  <tr>
    <td align="center" bgcolor="#FDB912" style="border-radius:8px;">
      <a href="{{ $url }}" target="_blank" rel="noopener"
         style="display:inline-block; padding:14px 30px; font-family:'Poppins',Arial,sans-serif; font-size:15px; font-weight:600; color:#0E1726; text-decoration:none; border-radius:8px; background:#FDB912;">
        {{ $slot }}
      </a>
    </td>
  </tr>
</table>
