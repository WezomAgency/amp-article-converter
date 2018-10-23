<?php

$loader = require_once '../vendor/autoload.php';
use WezomAgency\AmpArticleConverter;

?>
<!doctype html>
<html amp lang="en">
<head>
	<script async src="https://cdn.ampproject.org/v0.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<link rel="canonical" href="./index.php">
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,700,700i" rel="stylesheet">
	<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
	<style amp-custom><?= file_get_contents('./assets/css/style.css') ?></style>
	<script async custom-element="amp-lightbox-gallery" src="https://cdn.ampproject.org/v0/amp-lightbox-gallery-0.1.js"></script>
	<script async custom-element="amp-audio" src="https://cdn.ampproject.org/v0/amp-audio-0.1.js"></script>
</head>
<body>
    <div class="container">
	    <div class="article">
		    <?php
		        $content = file_get_contents('./content/images.php');
                $article = new AmpArticleConverter($content, (object)[
                		// 'noscript_fallback' => false
                ]);
                $article->converAll();
		        echo $article;
		    ?>
		    <hr>
            <?php
	            $content = file_get_contents('./content/audio.php');
	            $article = new AmpArticleConverter($content, (object)[
	                // 'noscript_fallback' => false
	            ]);
	            $article->converAll();
	            echo $article;
            ?>
		    <hr>
	    </div>
    </div>
</body>
</html>
