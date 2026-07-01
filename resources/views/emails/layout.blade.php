<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="color-scheme" content="light only">
  <meta name="supported-color-schemes" content="light only">
  <title>{{ config('event.short_name') }}</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Poppins:wght@400;500;600&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
  <!--[if mso]><style>* { font-family: Arial, sans-serif !important; }</style><![endif]-->
  <style>
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    a { color: #264185; }
    @media only screen and (max-width: 620px) {
      .wrap { width: 100% !important; }
      .px { padding-left: 22px !important; padding-right: 22px !important; }
      .h1 { font-size: 28px !important; }
    }
  </style>
</head>
<body style="margin:0; padding:0; background:#F4F1E8;">
  <span style="display:none !important; visibility:hidden; opacity:0; color:transparent; height:0; width:0; overflow:hidden; mso-hide:all;">@yield('preheader')</span>

  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#F4F1E8;">
    <tr>
      <td align="center" style="padding:28px 12px;">
        <table role="presentation" class="wrap" width="600" cellpadding="0" cellspacing="0" border="0" style="width:600px; max-width:600px;">

          <!-- HEADER -->
          <tr>
            <td class="px" style="background:#264185; border-radius:16px 16px 0 0; padding:30px 36px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td style="font-family:'JetBrains Mono',Consolas,monospace; font-size:11px; letter-spacing:2px; color:#FDB912; text-transform:uppercase;">Cod'On &middot; Session {{ config('event.session') }}</td>
                  <td align="right" style="font-family:'JetBrains Mono',Consolas,monospace; font-size:11px; letter-spacing:1px; color:#9fb0cf;">&gt;_ #MadeInGabao</td>
                </tr>
              </table>
              <div class="h1" style="font-family:'Montserrat','Segoe UI',Arial,sans-serif; font-weight:800; font-size:34px; line-height:1.05; letter-spacing:-1px; color:#ffffff; margin-top:16px;">MADE IN <span style="color:#FDB912;">GABAO.</span></div>
              <div style="font-family:'Poppins',Arial,sans-serif; font-size:13px; color:#cdd8f0; margin-top:8px;">{{ config('event.tagline') }}</div>
            </td>
          </tr>

          <!-- BODY -->
          <tr>
            <td class="px" style="background:#ffffff; padding:34px 36px; font-family:'Poppins',Arial,sans-serif; color:#2b3a4a; font-size:15px; line-height:1.6;">
              @yield('content')
            </td>
          </tr>

          <!-- FOOTER -->
          <tr>
            <td class="px" style="background:#0E1726; border-radius:0 0 16px 16px; padding:26px 36px;">
              <div style="font-family:'JetBrains Mono',Consolas,monospace; font-size:11px; letter-spacing:1px; color:#FDB912;">&gt;_ Compilé au Gabon</div>
              <div style="font-family:'Poppins',Arial,sans-serif; font-size:12px; color:#9fb0cf; margin-top:10px;">
                {{ config('event.organizer') }} &middot;
                <a href="{{ config('event.website') }}" style="color:#cdd8f0; text-decoration:none;">{{ str_replace(['https://','http://'], '', config('event.website')) }}</a> &middot;
                <a href="mailto:{{ config('event.contact_email') }}" style="color:#cdd8f0; text-decoration:none;">{{ config('event.contact_email') }}</a>
              </div>
              <div style="font-family:'Poppins',Arial,sans-serif; font-size:11px; color:#5b6b86; margin-top:10px;">#MadeInGabao &middot; #VeilleesCodOn &middot; #CodeIsPoetry</div>
            </td>
          </tr>

          <tr><td style="height:18px; line-height:18px; font-size:0;">&nbsp;</td></tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
