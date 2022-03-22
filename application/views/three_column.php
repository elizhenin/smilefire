<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="apple-touch-startup-image" href="/css/images/favicon.png"/>
    <link rel="apple-touch-icon" href="/css/images/favicon.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="/css/images/favicon.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="/css/images/favicon.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="/css/images/favicon.png"/>
    <link rel="shortcut icon" href="/css/images/favicon.png">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>

    <meta name="application-name" content="<?= $title ?>"/>
    <meta name="msapplication-tooltip" content="<?php if (!empty($description)) {echo $description;} ?>"/>

    <meta name="format-detection" content="telephone=no"/>
    <meta name="format-detection" content="address=no"/>

    <title><?= $title ?></title>
    <meta charset="utf-8">
    <?php if (!empty($description)) { ?>
    <meta name="Description" content="<?= $description ?>">
    <?php } ?>
    <?php if (!empty($keywords)) { ?>
    <meta name="Keywords" content="<?= $keywords ?>">
    <?php } ?>
  <link rel="image_src" href="/images/gallery/<?=(!empty($vk_image))?$vk_image:'logo.png'?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="http://www.google-analytics.com/ga.js"></script>
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="stylesheet" href="/css/viewbox.css" type="text/css">
    <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css">

    <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="/js/backtop.js"></script>
    <script type="text/javascript" src="/js/viewbox.js"></script>
    <script type="text/javascript" src="/js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="/js/jquery.lazyload.min.js"></script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-4300928-2']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <?php if (!empty($canonical)) { ?>
        <link rel="canonical" href="<?= $canonical ?>"/>
    <?php } ?>
<meta name='yandex-verification' content='6647259fbb9fab66' />
</head>
<body id="top">
   <script type="text/javascript">    
  if ((window.parent.frames.length > 0)&&(window.parent.location !='webvisor.com')) {
    window.stop();
    window.parent.location = "http://smilefire.ru";  }
</script>
<!-- Google floating autorization block -->
<div id="auth">
    <?=$auth_side?>
</div>
  <!--End autorization block -->
<table style="width: 100%;padding:0px;border:0px;">
<tbody>
<tr>
    <td colspan="3" style="white-space: nowrap;">
        <div style="text-align:center;width:478px;margin:auto;"><a href="/">
                <span
                    style="margin:auto;display:block;background:url(/css/images/logo.png);background-size:cover;height:160px;width:478px;"></span>
            </a></div>
    </td>
</tr>
<?=$top_menu?>
<tr>
    <td style="text-align:center;vertical-align:top;width:200px;">

        <table style="width:100%;border:0px;">
            <tr>
                <td class="window" style="padding:15px;vertical-align:top;text-align:left;">
<?=$menu_side?>
                </td>
            </tr>
        </table>
        <br/></td>

    <td style="text-align:center;vertical-align:top;">
        <table style="width:100%;border:0px;">
            <tr>
                <td class="window" style="padding:15px;vertical-align:top;text-align:center;">
                    <?= $content ?>
                </td>
            </tr>
        </table>
    </td>
    <br/>
    </td>
    <td style="text-align:center;vertical-align:top;width:200px;">

        <table style="width:100%;border:0px;">
            <tr>
                <td class="window" style="padding:15px;vertical-align:top;text-align:left;">
                    <?php echo $contacts_side;?>
                </td>
            </tr>
        </table>
        <br/>
        <table style="width:100%;border:0px;">
            <tr>
                <td class="window" style="padding:15px;vertical-align:top;text-align:center">
                    <?php echo $random_image;?>
                </td>
            </tr>
        </table>
        <br/></td>
</tr>
<tr>
    <td colspan="3">
<?=$footer?>
</tr>
</tbody>
</table>
<p id="back-top">
    <a href="#top"><span></span>Вверх</a>
</p>
</body>
<script>
$('.images-container').magnificPopup({
  delegate: 'a',
  type: 'image',
  gallery:{enabled:true},
   removalDelay: 300,
  zoom: {
    enabled: true, 
    duration: 300, 
    easing: 'ease-in-out', 
    opener: function(openerElement) {
      return openerElement.is('img') ? openerElement : openerElement.find('img');
    }
  }
});
</script>
</html>
