<!DOCTYPE html>
<html>
<head>
    <title>Страница не найдена</title>
    <meta charset="utf-8">
    <?php if (!empty($description)) { ?>
        <meta name="Description" content="<?= $description ?>">
    <?php } ?>
    <?php if (!empty($keywords)) { ?>
        <meta name="Keywords" content="<?= $keywords ?>">
    <?php } ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="http://www.google-analytics.com/ga.js"></script>
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="stylesheet" href="/css/viewbox.css" type="text/css">
    <link rel="shortcut icon" href="/css/images/favicon.png">
    <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="/js/backtop.js"></script>
    <script type="text/javascript" src="/js/viewbox.js"></script>
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
<body>

            <div style="text-align:center;width:478px;margin:auto;"><a href="/">
                <span
                    style="margin:auto;display:block;background:url(/css/images/logo.png);background-size:cover;height:160px;width:478px;"></span>
                </a>
                <h1>404 - Страница не найдена</h1>
            </div>
</body>
</html>