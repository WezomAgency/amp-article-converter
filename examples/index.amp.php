<?php

$loader = require_once '../vendor/autoload.php';

use WezomAgency\Amp\AmpArticleConverter;

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
	<script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
	<script async custom-element="amp-lightbox-gallery" src="https://cdn.ampproject.org/v0/amp-lightbox-gallery-0.1.js"></script>
	<script async custom-element="amp-audio" src="https://cdn.ampproject.org/v0/amp-audio-0.1.js"></script>
</head>
<body>
    <div class="container">
	    <div class="article">
		    <amp-accordion animate>
			    <section>
				    <h2 class="spec-header">AmpConvertFont2Span</h2>
				    <div>
					    <ol class="spec">
						    <li>
							    <amp-accordion animate>
								    <section>
									    <h4 class="method-header">setupConfiguration()</h4>
									    <div class="method-desc">
										    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
											    at
											    consectetur culpa dolorem doloremque, fugit minima repellendus
											    repudiandae! Adipisci architecto nihil quaerat veritatis. Blanditiis
											    hic
											    molestias odit ratione sed veniam!</p>
									    </div>
								    </section>
							    </amp-accordion>
						    </li>
						    <li>
							    <amp-accordion animate>
								    <section>
									    <h4 class="method-header">processingNecessaryAttributes()</h4>
									    <div class="method-desc">
										    <ul>
											    <li>
												    <em>if (saveFaceAttrValue === true)</em>
												    сохранить значения атрибута <code>face</code> <br>
												    как значение для CSS свойcтва
												    <code>font-family</code>
											    </li>
											    <li>
												    <em>if (saveColorAttrValue === true)</em>
												    сохранить значения атрибута <code>color</code> <br>
												    как значение для CSS свойcтва <code>color</code>
											    </li>
											    <li>
												    <em>if (saveSizeAttrValue === true)</em>
												    сохранить значения атрибута <code>size</code> <br>
												    как значение для CSS свойcтва <code>font-size</code><br>
												    с конвертацией значения:
												    <em>целое число</em>
												    <ul>
													    <li><b>1</b> - <code>font-size: x-small</code></li>
													    <li><b>2</b> - <code>font-size: small</code></li>
													    <li><b>3</b> - <code>font-size: medium</code></li>
													    <li><b>4</b> - <code>font-size: large</code></li>
													    <li><b>5</b> - <code>font-size: x-large</code></li>
													    <li><b>6</b> - <code>font-size: xx-large</code></li>
													    <li><b>7</b> - <code>font-size: 3rem; font-size:
															    -webkit-xxx-large</code>
													    </li>
												    </ul>
											    </li>
										    </ul>
									    </div>
								    </section>
							    </amp-accordion>
						    </li>
						    <li>
							    <amp-accordion animate>
								    <section>
									    <h4 class="method-header">removeProhibitedAttributes()</h4>
									    <div class="method-desc">
										    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
											    at
											    consectetur culpa dolorem doloremque, fugit minima repellendus
											    repudiandae! Adipisci architecto nihil quaerat veritatis. Blanditiis
											    hic
											    molestias odit ratione sed veniam!</p>
									    </div>
								    </section>
							    </amp-accordion>
						    </li>
						    <li>
							    <amp-accordion animate>
								    <section>
									    <h4 class="method-header">changeTagName()</h4>
									    <div class="method-desc">
										    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium at
											    consectetur culpa dolorem doloremque, fugit minima repellendus
											    repudiandae! Adipisci architecto nihil quaerat veritatis. Blanditiis hic
											    molestias odit ratione sed veniam!</p>
									    </div>
								    </section>
							    </amp-accordion>
						    </li>
						    <li>
							    <amp-accordion animate>
								    <section>
									    <h4 class="method-header">finish()</h4>
									    <div>
										    <div>
											    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
												    at
												    consectetur culpa dolorem doloremque, fugit minima repellendus
												    repudiandae! Adipisci architecto nihil quaerat veritatis. Blanditiis
												    hic
												    molestias odit ratione sed veniam!</p>
										    </div>
									    </div>
								    </section>
							    </amp-accordion>
						    </li>
					    </ol>
				    </div>
			    </section>
		    </amp-accordion>

		    <p><em>рабочий код</em></p>
		    <?php
		        $content = file_get_contents('./content/font.php');
                $article = new AmpArticleConverter($content, [
                		// 'noscript_fallback' => false
                ]);
                $article->convertAll();
                echo $article;
		    ?>
		    <hr>
	    </div>
    </div>
</body>
</html>
