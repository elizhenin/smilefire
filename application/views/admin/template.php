<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/css/bootstrap-combined.min.css" rel="stylesheet">
     <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="shortcut icon" href="/css/images/favicon.png">
    <script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/css/bootstrap-datetimepicker.min.css">
    <link type="text/css" rel="stylesheet" href="/js/redactor/redactor.css">
    <script src="/js/redactor/redactor.min.js"></script>
    <script src="/js/redactor/lang/ru.js"></script>
    <script>
        $(document).ready(function(){
            $('.redactor').redactor({
                lang: 'ru',
                minHeight: 400,
                imageUpload: '/ajax/imageUpload',
                toolbarFixedBox: true
            });
        });
    </script>
        <style>
        .redactor-box,
	.redactor-editor {
	  background: transparent url("images/cell.png") repeat;
	}
	.redactor-toolbar {
	  background: #000 !important;
	}
	.redactor-toolbar li a{
	  color: #fff;
	  background: #000;
	}
	
	.redactor-editor,
	.redactor-editor td,
	.redactor-editor h1,
	.redactor-editor h2 {
	  font-size: 14pt;
	  text-shadow: 1px 1px 1px #000;
	  color: #FC3;
	}
	.redactor-editor hr{
	  border-width: 1px 0px;
	  border-style: dashed solid solid;
	  border-color: #F00 -moz-use-text-color;
	  height: 2px;
	}
	.redactor-editor a{
	  font-family: inherit;
	  font-size: 14pt;
	  text-shadow: 2px 2px 2px #000;
	  color: #FF9C27;
	  text-decoration: none;
	  cursor: pointer;
	}
    </style>
</head>
<body id="top">
<table style="width: 100%;padding:0px;border:0px;">
<tbody>

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
</tr>
</tbody>
</table>
</body>

</html>