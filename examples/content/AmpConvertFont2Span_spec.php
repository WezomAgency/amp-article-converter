<amp-accordion disable-session-states animate>
	<section>
		<h3 class="spec-header">AmpConvertFont2Span::class</h3>
		<div>
			<ol class="spec">
				<li>
					<amp-accordion disable-session-states animate>
						<section>
							<h4 class="method-header">setupConfiguration(<code>$configuration = []</code>)</h4>
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
					<amp-accordion disable-session-states animate>
						<section>
							<h4 class="method-header">processingImportantAttributes()</h4>
							<div class="method-desc">
								<ul>
									<li>
                                        <b>обработка атрибута <code>face</code></b><br>
										<em>if ($this->saveFaceAttrValue === true)</em>
										сохранить значения атрибута<br>
										как значение для CSS свойcтва<code>font-family</code>
									</li>
									<li>
                                        <b>обработка атрибута <code>color</code></b><br>
										<em>if ($this->saveColorAttrValue === true)</em>
										сохранить значения атрибута<br>
										как значение для CSS свойcтва <code>color</code>
									</li>
									<li>
                                        <b>обработка атрибута <code>size</code></b><br>
										<em>if ($this->saveSizeAttrValue === true)</em>
										сохранить значения атрибута<br>
										как значение для CSS свойcтва <code>font-size</code><br>
										с конвертацией значения:
										<amp-accordion disable-session-states animate>
											<section>
												<h5 class="method-header">если значение - целое число</h5>
												<div class="method-desc">
													<ul>
														<li><code>size="1"</code> &rarr; <code>font-size: x-small</code></li>
														<li><code>size="2"</code> &rarr; <code>font-size: small</code></li>
														<li><code>size="3"</code> &rarr; <code>font-size: medium</code></li>
														<li><code>size="4"</code> &rarr; <code>font-size: large</code></li>
														<li><code>size="5"</code> &rarr; <code>font-size: x-large</code></li>
														<li><code>size="6"</code> &rarr; <code>font-size: xx-large</code></li>
														<li><code>size="7"</code> &rarr; <code>font-size: 3rem; font-size:
																-webkit-xxx-large</code>
														</li>
													</ul>
												</div>
											</section>
										</amp-accordion>
										<amp-accordion disable-session-states animate>
											<section>
												<h5 class="method-header">если значение - относительное число</h5>
												<div class="method-desc">
													<ul>
														<li><code>size="+1"</code> &rarr; <code>font-size: large</code></li>
														<li><code>size="+2"</code> &rarr; <code>font-size: x-large</code></li>
														<li><code>size="+3"</code> &rarr; <code>font-size: xx-large</code></li>
														<li><code>size="+4"</code> &rarr; <code>font-size: 3rem; font-size:
																-webkit-xxx-large</code>
														<li><code>size="+5"</code> &rarr; <code>font-size: 3rem; font-size:
																-webkit-xxx-large</code>
														<li><code>size="+6"</code> &rarr; <code>font-size: 3rem; font-size:
																-webkit-xxx-large</code>
														<li><code>size="+7"</code> &rarr; <code>font-size: 3rem; font-size:
																-webkit-xxx-large</code>
														</li>
													</ul>
													<br>
													<ul>
														<li><code>size="-1"</code> &rarr; <code>font-size: small</code>
														</li>
														<li><code>size="-2"</code> &rarr; <code>font-size: x-small</code></li>
														<li><code>size="-3"</code> &rarr; <code>font-size: x-small</code></li>
														<li><code>size="-4"</code> &rarr; <code>font-size: x-small</code>
														<li><code>size="-5"</code> &rarr; <code>font-size: x-small</code>
														<li><code>size="-6"</code> &rarr; <code>font-size: x-small</code>
														<li><code>size="-7"</code> &rarr; <code>font-size: x-small</code>
														</li>
													</ul>
												</div>
											</section>
										</amp-accordion>
										<amp-accordion disable-session-states animate>
											<section>
												<h5 class="method-header">если значение - содержит число не из списка возможных для атрибута size</h5>
												<div class="method-desc">
													<ul>
														<li><code>больше 7</code> &rarr; <code>font-size: 3rem; font-size:
																-webkit-xxx-large</code>
														</li>
														<li><code>меньше -7</code> &rarr; <code>font-size: x-small</code>
														</li>
														<li><code>равно 0</code> &rarr; <code>font-size: x-small</code>
														</li>
													</ul>
												</div>
											</section>
										</amp-accordion>
										<amp-accordion disable-session-states animate>
											<section>
												<h5 class="method-header">если значение - не числовое или не попадает под один критерий, из выше перечисленных</h5>
												<div class="method-desc">
													<p>не сохранять значение и пропустить</p>
												</div>
											</section>
										</amp-accordion>
									</li>
								</ul>
							</div>
						</section>
					</amp-accordion>
				</li>
				<li>
					<amp-accordion disable-session-states animate>
						<section>
							<h4 class="method-header">removeProhibitedAttributes()</h4>
							<div class="method-desc">
                                <ul>
                                    <li>удалить атрибут <code>face</code></li>
                                    <li>удалить атрибут <code>color</code></li>
                                    <li>удалить атрибут <code>size</code></li>
                                </ul>
							</div>
						</section>
					</amp-accordion>
				</li>
				<li>
					<amp-accordion disable-session-states animate>
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
					<amp-accordion disable-session-states animate>
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
