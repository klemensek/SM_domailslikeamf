<!DOCTYPE html>
<html class=no-js>

<head>
	<meta charset=utf-8>
	<title>editor</title>
	<meta name=description content="">
	<meta name=viewport content="width=device-width">
	<link rel="shortcut icon" href="/libs/styles/6df2b309.favicon.ico">
	<link rel=stylesheet href="/libs/styles/375d021c.vendor.css">
	<link rel=stylesheet href="/libs/styles/main.1.css">
	<link rel=stylesheet href="/libs/jquery-ui-1.10.4.custom/css/salesmanago-new/jquery-ui-1.10.4.custom.min.css">

	<script type="text/javascript" src="/libs/jquery-ui-1.10.4.custom/js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="/libs/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script type="text/javascript" src="/libs/scripts/tinymce.min.js"></script>

</head>

<body class="edit">
	<!--[if lt IE 10]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
your browser</a> to improve your experience.</p>
<![endif]-->
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'))

	</script>




	<input id="emailTemplateId" name="emailTemplateId" style="display: none;" value="">

	<div class=editor-navigation>

		<div>
			<ul class="nav editor-mode navbar-nav">
				<li><a href=# class=lp-editor style="display: none;"><i class="fa fa-globe"></i> Landing Page</a></li>
				<li class=active>
					<a class="email-editor" style="display: none;"><i class="fa fa-envelope"></i> Email</a>
				</li>
			</ul>
			<ul class="nav navbar-nav">
				<li><a href=# id=edit_preview><i class="fa fa-edit"></i> Edit</a></li>
			</ul>
			<div class="preview-btn btn-group hide" data-toggle=buttons>
				<label class="btn btn-lg btn-primary" data-toggle=tooltip title="Desktop (full width)">
					<input type=radio name=responsive-preview id=desktop autocomplete=off checked> <i class="fa fa-fw fa-desktop"></i> </label>
				<label class="btn btn-lg btn-primary" data-toggle=tooltip title="Tablet view (768x1024)">
					<input type=radio name=responsive-preview id=tablet autocomplete=off>
					<i class="fa fa-fw fa-tablet"></i> </label>
				<label class="btn btn-lg btn-primary" data-toggle=tooltip title="Mobile view (360x640)">
					<input type=radio name=responsive-preview id=mobile autocomplete=off>
					<i class="fa fa-fw fa-mobile"></i> </label>
			</div>
		</div>
	</div>

	<div class=widgets-container style="position: fixed;">
		<div role=tabpanel>
			<ul class=ribbon role=tablist>
				<li role=presentation class=active><a href=#tab-layout aria-controls=tab-layout role=tab data-toggle=tab>
						Layout</a>
				</li>
				<li role=presentation><a href=#tab-widgets aria-controls=tab-widgets role=tab data-toggle=tab>
						Widgets</a>
				</li>
				<li role=presentation><a href=#tab-social aria-controls=tab-social role=tab data-toggle=tab>
						Social Buttons</a></li>

				<ul class="nav navbar-nav pull-right">
					<li><a href=# id=edit><i class="fa fa-edit"></i> Edit</a></li>
					<li><a href=# id=sourcepreview><i class="fa fa-eye"></i> Preview</a></li>
					<li><a href=# id=clear data-target=#clear><i class="fa fa-trash"></i> <span class="hidden-xs hidden-sm">
							Clear</span></a>

						<li>
							<a href=# id=button-download-modal data-target=#downloadModal data-toggle=modal>
								<i class="fa fa-download"></i> <span class="hidden-xs hidden-sm">Save Email</span></a>
						</li>
				</ul>
			</ul>
			<!-- Tab panes -->
			<div class=ribbon-content>
				<div role=tabpanel class="tab-pane active" id=tab-layout>
					<div class="lyrow ui-draggable">
						<div class=widget-name><i class=icon-col-1></i> One Column</div>
						<div class=view>
							<div class="row clearfix">
								<div class="col-md-12 column"></div>
							</div>
						</div>
					</div>
					<div class="lyrow ui-draggable">
						<div class=widget-name><i class=icon-col-2></i> Two Columns</div>
						<div class=view>
							<div class="row clearfix">
								<div class="col-md-6 column"></div>
								<div class="col-md-6 column"></div>
							</div>
						</div>
					</div>
					<div class="lyrow ui-draggable">
						<div class=widget-name><i class=icon-col-2a></i> Column + Sidebar</div>
						<div class=view>
							<div class="row clearfix">
								<div class="col-md-8 column"></div>
								<div class="col-md-4 column"></div>
							</div>
						</div>
					</div>
					<div class="lyrow ui-draggable">
						<div class=widget-name><i class=icon-col-2b></i> Sidebar + Column</div>
						<div class=view>
							<div class="row clearfix">
								<div class="col-md-4 column"></div>
								<div class="col-md-8 column"></div>
							</div>
						</div>
					</div>
					<div class="lyrow ui-draggable">
						<div class=widget-name><i class=icon-col-3a></i> Three Columns</div>
						<div class=view>
							<div class="row clearfix">
								<div class="col-md-4 column"></div>
								<div class="col-md-4 column"></div>
								<div class="col-md-4 column"></div>
							</div>
						</div>
					</div>
					<div class="lyrow ui-draggable">
						<div class=widget-name><i class=icon-col-3b></i> Three Columns 2</div>
						<div class=view>
							<div class="row clearfix">
								<div class="col-md-3 column"></div>
								<div class="col-md-6 column"></div>
								<div class="col-md-3 column"></div>
							</div>
						</div>
					</div>
					<div class="lyrow ui-draggable">
						<div class=widget-name><i class=icon-col-4></i> Four Columns</div>
						<div class=view>
							<div class="row clearfix">
								<div class="col-md-3 column"></div>
								<div class="col-md-3 column"></div>
								<div class="col-md-3 column"></div>
								<div class="col-md-3 column"></div>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="tab-widgets">

					<div class="widget mce">
						<div class="widget-name">
							<i class="icon-heading"></i> Heading
						</div>

						<div class="configuration">
							<div class="btn-group btn-group-xs">
								<a class="configuration-btn dropdown-toggle" data-toggle="dropdown" href="#">
										Align <span class="caret"></span>
									</a>
								<ul class="dropdown-menu">
									<li class="active"><a href="#" rel="">Default</a></li>
									<li><a href="#" rel="text-left">Left</a></li>
									<li><a href="#" rel="text-center">Center</a></li>
									<li><a href="#" rel="text-justify">Justify</a></li>
									<li><a href="#" rel="text-right">Right</a></li>
								</ul>
							</div>
							<div class="btn-group btn-group-xs">
								<a class="configuration-btn dropdown-toggle" data-toggle="dropdown" href="#">
										Emphasis <span class="caret"></span>
									</a>
								<ul class="dropdown-menu">
									<li class="active"><a href="#" rel="">Default</a></li>
									<li><a href="#" rel="text-muted">Muted</a></li>
									<li><a href="#" rel="text-primary">Primary</a></li>
									<li><a href="#" rel="text-success">Success</a></li>
									<li><a href="#" rel="text-info">Info</a></li>
									<li><a href="#" rel="text-warning">Warning</a></li>
									<li><a href="#" rel="text-danger">Danger</a></li>
								</ul>
							</div>
						</div>

						<div class="view">
							<h3 contenteditable="true">Enter your text here...</h3>
						</div>
					</div>

					<div class="widget mce">
						<div class="configuration">
							<div class="btn-group btn-group-xs">
								<a class="configuration-btn dropdown-toggle" data-toggle="dropdown" href="#">Align <span
																															 class="caret"></span></a>
								<ul class="dropdown-menu">
									<li class="active"><a href="#" rel="">Left</a></li>
									<li><a href="#" rel="text-center">Center</a></li>
									<li><a href="#" rel="text-justify">Justify</a></li>
									<li><a href="#" rel="text-right">Right</a></li>
								</ul>
							</div>
						</div>
						<div class="widget-name">
							<i class="icon-text"></i> Text
						</div>
						<div class="view">
							<div>
								<p>Lorem ipsum dolor sit amet, <strong>consectetur adipiscing
										elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales.
										Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id
										bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus.
									<small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod
											ultrices massa, et feugiat ipsum consequat eu.
										</small>
								</p>
							</div>
						</div>
					</div>

					<div class="widget">
						<a class="gallery-modal-btn" href="#" data-toggle="modal" data-target="#galleryModal"><i
																													 class="fa fa-camera"></i></a>

						<div class="configuration">
							<a class="settings-modal-btn" data-toggle="modal" data-target="#configurationModal" href="#"><i
																																class="fa fa-cog"></i></a>

							<div class="btn-group btn-group-xs">
								<a class="configuration-btn dropdown-toggle" data-toggle="dropdown" href="#">Styles <span
																															  class="caret"></span></a>
								<ul class="dropdown-menu">
									<li class="active"><a href="#" rel="">Default</a></li>
									<li><a href="#" rel="img-rounded">Rounded</a></li>
									<li><a href="#" rel="img-circle">Circle</a></li>
									<li><a href="#" rel="img-thumbnail">Thumbnail</a></li>
								</ul>
							</div>
							<div class="configuration-options">
								<input type="text" data-selector="img" data-attr="src" data-label="Image URL" placeholder="http://">
								<input type="text" data-selector="a.img-url" data-attr="href" data-label="Target URL" placeholder="http://">
								<input type="text" data-selector="img" data-attr="title" data-label="Title">
								<input type="text" data-selector="img" data-attr="alt" data-label="Alt">
								<input type="text" data-selector="img" data-attr="style" data-label="Inline Styles">
								<input type="text" data-selector="img" data-attr="class" data-label="CSS Classes">
							</div>
						</div>
						<div class="widget-name">
							<i class="icon-img"></i> Image
						</div>
						<div class="view">
							<a class="img-url"><img class="img-responsive" src alt="Image"></a>
						</div>
					</div>

					<div class="widget mce">
						<a class="gallery-modal-btn" href="#" data-toggle="modal" data-target="#galleryModal"><i
																													 class="fa fa-camera"></i></a>

						<div class="configuration">
							<a class="settings-modal-btn" data-toggle="modal" data-target="#configurationModal" href="#"><i
																																class="fa fa-cog"></i></a>

							<div class="btn-group btn-group-xs">
								<a class="configuration-btn dropdown-toggle" data-toggle="dropdown" href="#">
										Align <span class="caret"></span>
									</a>
								<ul class="dropdown-menu">
									<li class="active"><a href="#" rel="">Default</a></li>
									<li><a href="#" rel="text-left">Left</a></li>
									<li><a href="#" rel="text-center">Center</a></li>
									<li><a href="#" rel="text-justify">Justify</a></li>
									<li><a href="#" rel="text-right">Right</a></li>
								</ul>
							</div>
							<div class="btn-group btn-group-xs">
								<a class="configuration-btn dropdown-toggle" data-toggle="dropdown" href="#">Styles <span
																															  class="caret"></span></a>
								<ul class="dropdown-menu">
									<li class="active"><a href="#" rel="">Default</a></li>
									<li><a href="#" rel="img-rounded">Rounded</a></li>
									<li><a href="#" rel="img-circle">Circle</a></li>
									<li><a href="#" rel="img-thumbnail">Thumbnail</a></li>
								</ul>
							</div>
							<div class="configuration-options">
								<input type="text" data-selector="img" data-attr="src" data-label="Image URL" placeholder="http://">
								<input type="text" data-selector="a.img-url" data-attr="href" data-label="Target URL" placeholder="http://">
								<input type="text" data-selector="img" data-attr="title" data-label="Title">
								<input type="text" data-selector="img" data-attr="alt" data-label="Alt">
								<input type="text" data-selector="img" data-attr="style" data-label="Inline Styles">
								<input type="text" data-selector="img" data-attr="class" data-label="CSS Classes">
							</div>
						</div>
						<div class="widget-name">
							<i class="icon-img-text"></i> Image + Text
						</div>
						<div class="view">
							<div class="row clearfix">
								<div class="col-md-6" style="padding-left:0">
									<a class="img-url"><img class="img-responsive" src alt="Image"></a>
								</div>
								<div class="col-md-6" style="padding-right:0">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure impedit praesentium dicta temporibus veniam dignissimos odit assumenda, non. Illo beatae, quidem aliquid! Doloribus similique unde mollitia ipsam quae. Minima, corporis.</p>
								</div>
							</div>
						</div>
					</div>

					<div class="widget mce">
						<a class="gallery-modal-btn" href="#" data-toggle="modal" data-target="#galleryModal"><i
																													 class="fa fa-camera"></i></a>

						<div class="configuration">
							<a class="settings-modal-btn" data-toggle="modal" data-target="#configurationModal" href="#"><i
																																class="fa fa-cog"></i></a>

							<div class="btn-group btn-group-xs">
								<a class="configuration-btn dropdown-toggle" data-toggle="dropdown" href="#">
										Align <span class="caret"></span>
									</a>
								<ul class="dropdown-menu">
									<li class="active"><a href="#" rel="">Default</a></li>
									<li><a href="#" rel="text-left">Left</a></li>
									<li><a href="#" rel="text-center">Center</a></li>
									<li><a href="#" rel="text-justify">Justify</a></li>
									<li><a href="#" rel="text-right">Right</a></li>
								</ul>
							</div>
							<div class="btn-group btn-group-xs">
								<a class="configuration-btn dropdown-toggle" data-toggle="dropdown" href="#">Styles <span
																															  class="caret"></span></a>
								<ul class="dropdown-menu">
									<li class="active"><a href="#" rel="">Default</a></li>
									<li><a href="#" rel="img-rounded">Rounded</a></li>
									<li><a href="#" rel="img-circle">Circle</a></li>
									<li><a href="#" rel="img-thumbnail">Thumbnail</a></li>
								</ul>
							</div>
							<div class="configuration-options">
								<input type="text" data-selector="img" data-attr="src" data-label="Image URL" placeholder="http://">
								<input type="text" data-selector="a.img-url" data-attr="href" data-label="Target URL" placeholder="http://">
								<input type="text" data-selector="img" data-attr="title" data-label="Title">
								<input type="text" data-selector="img" data-attr="alt" data-label="Alt">
								<input type="text" data-selector="img" data-attr="style" data-label="Inline Styles">
								<input type="text" data-selector="img" data-attr="class" data-label="CSS Classes">
							</div>
						</div>
						<div class="widget-name">
							<i class="icon-text-img"></i> Text + Image
						</div>
						<div class="view">
							<div class="row clearfix">
								<div class="col-md-6" style="padding-left:0">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure impedit praesentium dicta temporibus veniam dignissimos odit assumenda, non. Illo beatae, quidem aliquid! Doloribus similique unde mollitia ipsam quae. Minima, corporis.</p>
								</div>
								<div class="col-md-6" style="padding-right:0">
									<a class="img-url"><img class="img-responsive" src alt="Image"></a>
								</div>
							</div>
						</div>
					</div>

					<div class="widget">
						<a href="#" data-toggle="modal" data-target="#dividerSettings" class="editsource"><i
																												 class="fa fa-cog"></i></a>

						<div class="widget-name">
							<i class="icon-divider"></i> Divider
						</div>
						<div class="view">
							<hr style="border: 2px solid #464646" />
						</div>
					</div>

					<div class="widget">
						<a href="#" data-toggle="modal" data-target="#buttonSettings" class="editsource"><i
																												class="fa fa-cog"></i></a>

						<div class="configuration">
							<div class="btn-group btn-group-xs">
								<a class="configuration-btn dropdown-toggle" data-toggle="dropdown" href="#">
										Align <span class="caret"></span>
									</a>
								<ul class="dropdown-menu">
									<li class="active"><a href="#" rel="text-left">Left</a></li>
									<li><a href="#" rel="text-center">Center</a></li>
									<li><a href="#" rel="text-right">Right</a></li>
								</ul>
							</div>
						</div>
						<div class="widget-name">
							<i class="icon-button"></i> Button
						</div>
						<div class="view">
							<div>
								<a href="#" class="btn btn-default">Button</a>
							</div>
						</div>
					</div>

					<div class="widget forlp">
						<a href="#" data-toggle="modal" data-target="#formBuildModal" class="editsource"><i
																												class="fa fa-list"></i></a>

						<div class="widget-name">
							<i class="icon-form"></i> Form
						</div>
						<div class="view">
							<form action="/" class="ui-dform-form" id="000" method="post" name="000" data-template='[{  "type": "div", "class": "form-group", "html": [{"caption":"Name","id":"formfield_1","name":"formfield_1","placeholder":"Please enter your name","type":"text","required":"true"}]  }, {  "type": "div", "class": "form-group", "html": [{"caption":"Email","id":"formfield_2","name":"formfield_2","placeholder":"Please provide your email","type":"email","required":"true"}]  }, { "type": "submit", "class": "btn btn-default", "css": { "border-radius": "0px" },"value": "Submit" }]'>
								<div class="ui-dform-div form-group">
									<label class="ui-dform-label" for="formfield_1">Name</label>
									<input class="form-control ui-dform-text" id="formfield_1" name="formfield_1" placeholder="Please enter your name" required="required" type="text">
								</div>

								<div class="ui-dform-div form-group">
									<label class="ui-dform-label" for="formfield_2">Email</label>
									<input class="form-control ui-dform-email" id="formfield_2" name="formfield_2" placeholder="Please provide your email" required="required" type="email">
								</div>
								<input class="ui-dform-submit btn btn-default" type="submit" value="Submit">
							</form>
						</div>
					</div>

					<div class="widget foremail mce">
						<div class="configuration">
							<div class="btn-group btn-group-xs">
								<a class="configuration-btn dropdown-toggle" data-toggle="dropdown" href="#">Align <span
																															 class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#" rel="">Left</a></li>
									<li class="active"><a href="#" rel="text-center">Center</a></li>
									<li><a href="#" rel="text-justify">Justify</a></li>
									<li><a href="#" rel="text-right">Right</a></li>
								</ul>
							</div>
						</div>
						<div class="widget-name">
							<i class="icon-text"></i> Opt-out Text
						</div>
						<div class="view">
							<div class="text-center">
								<p>If you no longer want to receive emails from us, you may choose to click
									<a href="$opt-out$" title="Here">Here</a>.</p>
							</div>
						</div>
					</div>
				</div>

				<div role="tabpanel" class="tab-pane" id="tab-social">
					<div class="widget forlp">
						<div class="configuration">
							<a class="settings-modal-btn" data-toggle="modal" data-target="#configurationModal" href="#"><i
																																class="fa fa-cog"></i></a>

							<div class="configuration-options">
								<input type="text" data-selector="div.fb-like" data-attr="data-href" data-label="URL to like" placeholder="http://">
							</div>
						</div>
						<div class="widget-name">
							<i class="fa fa-facebook"></i> Facebook Like
						</div>
						<div class="view">
							<div>
								<div class="fb-like" data-href="https://www.facebook.com/automatyzacjamarketingu" data-layout="standard" data-action="like" data-show-faces="true" data-share="false"></div>
							</div>
						</div>
					</div>

					<div class="widget forlp">
						<div class="configuration">
							<a class="settings-modal-btn" data-toggle="modal" data-target="#configurationModal" href="#"><i
																																class="fa fa-cog"></i></a>

							<div class="configuration-options">
								<input type="text" data-selector="a.twitter-follow-button" data-attr="data-href" data-label="Follow link" placeholder="http://twitter.com/username">
							</div>
						</div>
						<div class="widget-name">
							<i class="fa fa-twitter"></i> Follow on Twitter
						</div>
						<div class="view">
							<a href="https://twitter.com/username" class="twitter-follow-button" data-show-count="false">Follow
									Us!</a>
							<script>
								! function(d, s, id) {
									var js, fjs = d.getElementsByTagName(s)[0],
										p = /^http:/.test(d.location) ? 'http' : 'https';
									if (!d.getElementById(id)) {
										js = d.createElement(s);
										js.id = id;
										js.src = p + '://platform.twitter.com/widgets.js';
										fjs.parentNode.insertBefore(js, fjs);
									}
								}(document, 'script', 'twitter-wjs');

							</script>
						</div>
					</div>


					<div class="widget forlp">
						<div class="configuration">
							<a class="settings-modal-btn" data-toggle="modal" data-target="#configurationModal" href="#"><i
																																class="fa fa-cog"></i></a>

							<div class="configuration-options">
								<input type="text" data-selector="a.g-plusone" data-attr="data-href" data-label="URL for +1" placeholder="http://">
							</div>
						</div>
						<div class="widget-name">
							<i class="fa fa-google-plus"></i> Google+
						</div>
						<div class="view">
							<div class="g-plusone" data-annotation="inline" data-width="300" data-href="http://benhauer.pl/"></div>
						</div>
					</div>

					<div class="widget foremail">
						<div class="configuration">
							<a class="settings-modal-btn" data-toggle="modal" data-target="#configurationModal" href="#"><i
																																class="fa fa-cog"></i></a>

							<div class="configuration-options">
								<input type="text" data-selector=".soc-btn.fb" data-attr="href" data-label="Facebook Page" placeholder="http://facebook.com/page">
							</div>
						</div>
						<div class="widget-name">
							<i class="fa fa-facebook"></i> Facebook Like
						</div>
						<div class="view">
							<div>
								<a href="http://facebook.com/" class="btn soc-btn fb">Facebook</a>
							</div>
						</div>
					</div>

					<div class="widget foremail">
						<div class="configuration">
							<a class="settings-modal-btn" data-toggle="modal" data-target="#configurationModal" href="#"><i
																																class="fa fa-cog"></i></a>

							<div class="configuration-options">
								<input type="text" data-selector=".soc-btn.tw" data-attr="href" data-label="Twitter Link" placeholder="http://twitter.com/user">
							</div>
						</div>
						<div class="widget-name">
							<i class="fa fa-twitter"></i> Follow on Twitter
						</div>
						<div class="view">
							<div>
								<a href="http://twitter.com/" class="btn soc-btn tw">Twitter</a>
							</div>
						</div>
					</div>

					<div class="widget foremail">
						<div class="configuration">
							<a class="settings-modal-btn" data-toggle="modal" data-target="#configurationModal" href="#"><i
																																class="fa fa-cog"></i></a>

							<div class="configuration-options">
								<input type="text" data-selector=".soc-btn.tw" data-attr="href" data-label="Google+ Page" placeholder="http://plus.google.com/">
							</div>
						</div>
						<div class="widget-name">
							<i class="fa fa-google-plus"></i> Google+ Page
						</div>
						<div class="view">
							<div>
								<a href="http://plus.google.com/" class="btn soc-btn gp">Google+</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	</div>
	</div>
	<div class=page-container>
		<div class=row>
			<div class="demo container"></div>
			<div id=download-layout>
				<div class=container></div>

			</div>
		</div>
		<!--/row-->
		<style>
			body {
				background: #fff;
			}
			
			.demo.container {
				background: #fff;
			}

		</style>
	</div>
	<!--/.-container-->

	<a href="#" id="bodyPropBtn" class="btn btn-primary" data-target="#bodyPropModal" data-toggle="modal" title="Page body properties">
		<i class="fa fa-cog"></i>
	</a>

	<div class="modal fade" id="bodyPropModal" tabindex="-1" role="dialog" aria-labelledby="bodyPropModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Page body properties</h4>
				</div>
				<div class="modal-body">
					<div class="form-horizontal" role="form">
						<div class="form-group">
							<label for="bgimg" class="col-sm-4 control-label">Background Image URL</label>

							<div class="col-sm-8">
								<input type="text" class="form-control" name="bgimg" id="bgimg" placeholder="http://" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="bgcolor" class="col-sm-4 control-label">Background Color</label>

							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">&nbsp;&nbsp;</div>
									<input type="text" class="form-control colorinput" name="bgcolor" id="bgcolor" value="#FFFFFF">
								</div>
								<p class="help-block">Leave empty for transparent</p>
							</div>
						</div>

						<div class="form-group" id="containerwidthGroup">
							<label for="containerwidth" class="col-sm-4 control-label">Page Width</label>

							<div class="col-sm-8">
								<input type="text" class="form-control" name="containerwidth" id="containerwidth" placeholder="1170px">
							</div>
						</div>

						<div class="form-group">
							<label for="containercolor" class="col-sm-4 control-label">Page Color</label>

							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">&nbsp;&nbsp;</div>
									<input type="text" class="form-control colorinput" name="containercolor" id="containercolor" value="#FFFFFF">
								</div>
								<p class="help-block">Leave empty for transparent</p>
							</div>
						</div>










						<div class="form-group">
							<label for="containerBorderSize" class="col-sm-4 control-label">Border Size</label>

							<div class="col-sm-8">
								<input type="number" class="form-control" min="0" max="10" name="containerBorderSize" id="containerBorderSize" value="0">
							</div>
						</div>

						<div class="form-group">
							<label for="containerBorderColor" class="col-sm-4 control-label">Border Color</label>

							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">&nbsp;&nbsp;</div>
									<input type="text" class="form-control colorinput" name="containerBorderColor" id="containerBorderColor" value="#FFFFFF">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" id="bodyProp-save" class="btn btn-primary">Save</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->


	<div class="modal fade" id=downloadModal tabindex=-1 role=dialog aria-labelledby=downloadModalLabel aria-hidden=true>
		<form action="#" method="post" id="addStandardEmailForm">
			<div class=modal-dialog>
				<div class=modal-content style="width: 400px; left: 11%">
					<div class=modal-header>
						<button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
						<h4 class=modal-title id=downloadLabel>Save Email</h4></div>

					<div class="ibox-content smform" style="padding-left: 35px; padding-top: 13px;">
						Please enter details of new standard email below
						<br>

						<label for="name" style="padding-top: 7px;">Name: (mandatory field)</label>
						<br>
						<input type="text" name="name" id="name" style="width: 320px;" value="">

						<label for="campaign" style="padding-top: 5px;">Campaign name (for Google Analytics monitoring):</label>
						<br>
						<input type="text" name="campaign" id="campaign" style="width: 320px;" value="">
						<br>

						<label for="subject" style="padding-top: 5px;">Subject: (mandatory field)</label>
						<br>
						<input type="text" name="subject" id="subject" style="width: 320px;" value="">
						<br>

						<label for="standardEmailGroupWrapper">Group</label>
						<br>


						<div id="standardEmailGroupWrapper">
							<select name="standardEmailGroup" id="standardEmailGroup" style="width: 320px;">
								<option value="">Default</option>

							</select>
						</div>

						<label for="standardEmailAccountsWrapper" style="padding-top: 7px;">Account:</label>
						<br>


						<div id="standardEmailAccountsWrapper">
							<select name="standardEmailAccount" id="standardEmailAccount" style="width: 320px;">


								<option value="910da5f5-c8d6-4408-9332-010cabf26af0">
									primoz
								</option>

							</select>
						</div>

						</br>
						<label for="shared"></label>
						<input type="checkbox" name="shared" id="shared">this email is shared</br>

						<label for="ignoreLimits"></label>
						<input type="checkbox" name="ignoreLimits" id="ignoreLimits">Ignore emails filter</br>

						<label for="sourceresult" style="display: none;"></label>




						<div class=modal-body>
							<textarea name="sourceresult" id=sourceresult style="display: none;"></textarea>
						</div>

					</div>
					<br>

					<div class=modal-footer>
						<button type=button class="btn btn-primary" data-dismiss=modal>Cancel</button>
						<button id="saveButton" type=button class="btn btn-default">Save</button>
						<button id="saveAndSendButton" type=button class="btn btn-default">Save And Send</button>
					</div>
				</div>

				<label for="standardEmailId" style="display: none;"></label>
				<input id="standardEmailId" name="standardEmailId" style="display: none;" value="">
				<!-- /.modal-content -->
			</div>
		</form>
		<!-- /.modal-dialog -->
	</div>


	<div class="modal fade" id="configurationModal" tabindex="-1" role="dialog" aria-labelledby="configurationModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="configurationLabel">Settings</h4>
				</div>
				<div class="modal-body">
					<div class="form-horizontal" role="form"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="configuration-save">Save</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade" id="dynamicConfigurationModal" tabindex="-1" role="dialog" aria-labelledby="configurationModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close dynamicConfiguration-cancel" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="dynamicConfigurationLabel">Dynamic Settings</h4>
				</div>
				<div class="modal-body-dynamic" style="padding-left: 30px;">
					<br/>

					<form id="clickViewType" style="padding-left: 20px;">
						<label style="margin-left: -20px;">Intelligent retargeting:</label>
						<br>
						<input type="radio" name="click" value="lastUserVisitProduct" checked> product last click by contact
						<br>
						<input type="radio" name="click" value="lastUserViewProduct"> product last view by contact
						<br>
						<input type="radio" name="click" value="mostUserVisitProduct"> product most clicked by contact
						<br>
						<input type="radio" name="click" value="mostUserViewProduct"> product most viewed by contact
						<br>
						<br>

						<div style="margin-left: -20px;">
							<label>Intelligent recomendations (Next Best Offer)</label>
							<br> to what the customer last clicked and seen:
						</div>
						<input style="padding-left: 30px;" type="radio" name="click" value="coLastVisitProduct"> similar product most clicked by other people
						<br>
						<input style="padding-left: 30px;" type="radio" name="click" value="coLastViewProduct"> similar product most viewed by other people
						<br>
						<input type="checkbox" name="usePromoPrice">Użyj ceny promocyjnej
					</form>
					<br/>
					<label>Number of product</label>
					<select name=numProd id="numberOfProduct">

						<option value="1">
							1

							<option value="2">
								2

								<option value="3">
									3

									<option value="4">
										4

										<option value="5">
											5

											<option value="6">
												6

												<option value="7">
													7

													<option value="8">
														8

														<option value="9">
															9

															<option value="10">
																10

																<option value="11">
																	11

																	<option value="12">
																		12

					</select>
					<br/> (Saving changes will overrite your product fields content and style)
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default dynamicConfiguration-cancel" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="dynamicConfiguration-save">Save</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<div class="modal fade" id="afterSaveModalDialog" tabindex="-1" role="dialog" aria-labelledby="afterSaveModalDialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Message Saved</h4>
				</div>
				<div class="modal-body">
					Your message was saved successfully.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Continue</button>
					<button type="button" class="btn btn-primary" id="exitToEmailList">Exit</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="editSourceModal" tabindex="-1" role="dialog" aria-labelledby="editSourceModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="editSourceLabel">Edit Source</h4>
				</div>
				<div class="modal-body">
					<textarea></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="editsource-save">Save</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->




	<div class="modal fade" id=galleryModal tabindex=-1 role=dialog aria-hidden=true>
		<div class="modal-dialog modal-lg">
			<div class=modal-content>
				<div class=modal-header>
					<button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
					<h4 class=modal-title>Choose Image</h4></div>

				<div class=modal-body>
					<!-- GALLERY CODE ... -->
					<div style="padding-bottom: 4px;">
						<form method="post" modelAttribute="fileUploadForm" id="fileUploadForm" enctype="multipart/form-data" action="/app/emails/addFileToGallery.php">
							<iframe id="upload_target" name="upload_target" src="" style="width:0;height:0;border:0px solid #fff;"></iframe>
							<label>Choose file:</label>
							<input type="file" name="fileData" id="fileData" />

							<div class="buttonsHolder">
								</br>
								<button id="submitFileUploadForm">
									Upload</button>
							</div>
						</form>

						<select name=days id="rangeDate">
							<option value=0>All the Time
								<option value=7>Last Week
									<option value=14>Last Two Weeks
										<option value=30>Last Month
						</select>
						<button id="findImagesByDays">Search</button>

					</div>

					<?php include('app/emails/reloadEmailEditorGalleryContent.php'); ?>

						<!--
					<div id="gallery_content">
						<div id=gallery class=scroll>








							<div class="galleryImage" id="galleryImage_zjo8u6d0qo8dtrd0" style="float: left; margin: 6px; background: #ffffff; border: #4d4d4d; padding: 2px;">
								<div style="text-align: center; font-size: 0.8em;">
									<input name="image" type="radio" value="https://s3-eu-west-1.amazonaws.com/salesmanagoimg/effkxq5hkdnavwdb/ws2f9fmbwbyuo5ik/zjo8u6d0qo8dtrd0.jpg" />
								</div>
								<div style="text-align: center; min-width: 132px; min-height: 132px; padding: 2px;"><img style="max-width: 128px; max-height: 128px;" src="https://s3-eu-west-1.amazonaws.com/salesmanagoimg/effkxq5hkdnavwdb/ws2f9fmbwbyuo5ik/zjo8u6d0qo8dtrd0.jpg" alt="Image" /></div>
								<div style="text-align: center; font-size: 0.8em;">IMG_20140309_121444-PANO.jpg</div>
								<div style="text-align: center;">
									<input style="font-size: 0.8em;" value="https://s3-eu-west-1.amazonaws.com/salesmanagoimg/effkxq5hkdnavwdb/ws2f9fmbwbyuo5ik/zjo8u6d0qo8dtrd0.jpg" />
								</div>
								<div style="text-align: center;">
									<a class="btnDelete" id="delete" href="#" onclick="deleteFile('effkxq5hkdnavwdb/ws2f9fmbwbyuo5ik/zjo8u6d0qo8dtrd0.jpg', 'zjo8u6d0qo8dtrd0');">
								DELETE
							</a></div>

							</div>

							<div style="clear: both"></div>
						</div>
						<div>
							<div class="menuOnLeft">
								Images Found: 12
							</div>
							<div class="menuOnRight">



								&larr; Previous


								<span>:: 1/1 ::</span> next &rarr;


							</div>
							<div class="clearBoth"></div>
						</div>
						<input id="numberOfPages" style="display: none;" value="1">

						<div class="clearBoth"></div>
					</div>
-->
						<!-- /GALLERY CODE -->
				</div>
				<div class=modal-footer>
					<button type=button class="btn btn-default" data-dismiss=modal>Cancel</button>
					<button type=button class="btn btn-primary" id=galleryModalPick>Load Image</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<div class="modal fade" id="columnSettings" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Column Settings</h4>
				</div>
				<div class="modal-body">
					<div class="form-horizontal" role="form">
						<div class="form-group">
							<label for="columnColor" class="col-sm-4 control-label">Color</label>

							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">&nbsp;&nbsp;</div>
									<input type="text" class="form-control colorinput" name="columnColor" id="columnColor" value="">
								</div>
								<p class="help-block">Leave empty for transparent</p>
							</div>
						</div>
						<div class="form-group">
							<label for="columnBorderSize" class="col-sm-4 control-label">Border Size</label>

							<div class="col-sm-8">
								<input type="number" class="form-control" min="0" max="10" name="columnBorderSize" id="columnBorderSize" value="0">
							</div>
						</div>

						<div class="form-group">
							<label for="columnBorderColor" class="col-sm-4 control-label">Border Color</label>

							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">&nbsp;&nbsp;</div>
									<input type="text" class="form-control colorinput" name="columnBorderColor" id="columnBorderColor" value="#FFFFFF">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="columnSettingsSave">Save</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<div class="modal fade" id="dividerSettings" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Divider Settings</h4>
				</div>
				<div class="modal-body">
					<div class="form-horizontal" role="form">
						<div class="form-group">
							<label for="dividerColor" class="col-sm-4 control-label">Color</label>

							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">&nbsp;&nbsp;</div>
									<input type="text" class="form-control colorinput" name="dividerColor" id="dividerColor" value="#464646">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="dividerStroke" class="col-sm-4 control-label">Stroke</label>

							<div class="col-sm-8">
								<select class="form-control" id="dividerStroke">
									<option value="solid" selected>Solid</option>
									<option value="dashed">Dashed</option>
									<option value="dotted">Dotted</option>
									<option value="double">Double</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="dividerSize" class="col-sm-4 control-label">Border Size</label>

							<div class="col-sm-8">
								<input type="number" class="form-control" min="1" max="10" name="dividerSize" id="dividerSize" value="2">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="dividerSettingsSave">Save</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->


	<div class="modal fade" id="buttonSettings" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Button Settings</h4>
				</div>
				<div class="modal-body">
					<div class="form-horizontal" role="form">
						<div class="form-group">
							<label for="buttonLabel" class="col-sm-4 control-label">Label</label>

							<div class="col-sm-8">
								<input type="text" class="form-control" name="buttonLabel" id="buttonLabel" value="Button">
							</div>
						</div>
						<div class="form-group">
							<label for="buttonUrl" class="col-sm-4 control-label">Target URL</label>

							<div class="col-sm-8">
								<input type="url" class="form-control" name="buttonUrl" id="buttonUrl" value="http://" placeholder="http://">
							</div>
						</div>
						<div class="form-group">
							<label for="buttonStyle" class="col-sm-4 control-label">Style</label>

							<div class="col-sm-8">
								<select class="form-control" id="buttonStyle">
									<option value="btn-default" selected>Default</option>
									<option value="btn-primary">Primary</option>
									<option value="btn-success">Success</option>
									<option value="btn-info">Info</option>
									<option value="btn-warning">Warning</option>
									<option value="btn-danger">Danger</option>
									<option value="btn-custom">Custom...</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="buttonColor" class="col-sm-4 control-label">Background Color</label>

							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">&nbsp;&nbsp;</div>
									<input type="text" class="form-control colorinput" name="buttonColor" id="buttonColor" value="#fafafa">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="buttonBorderColor" class="col-sm-4 control-label">Border Color</label>

							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">&nbsp;&nbsp;</div>
									<input type="text" class="form-control colorinput" name="buttonBorderColor" id="buttonBorderColor" value="#ededed">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="buttonTextColor" class="col-sm-4 control-label">Text Color</label>

							<div class="col-sm-8">
								<div class="input-group">
									<div class="input-group-addon">&nbsp;&nbsp;</div>
									<input type="text" class="form-control colorinput" name="buttonTextColor" id="buttonTextColor" value="#ffffff">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="buttonSize" class="col-sm-4 control-label">Size</label>

							<div class="col-sm-8">
								<select class="form-control" id="buttonSize">
									<option value="" selected>Normal</option>
									<option value="btn-lg">Large</option>
									<option value="btn-sm">Small</option>
									<option value="btn-xs">Mini</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="buttonMargin" class="col-sm-4 control-label">Top Margin</label>

							<div class="col-sm-8">
								<input type="number" class="form-control" min="0" max="50" name="buttonMargin" id="buttonMargin" value="0">
							</div>
						</div>
						<div class="form-group">
							<label for="buttonBorder" class="col-sm-4 control-label">Border Radius</label>

							<div class="col-sm-8">
								<input type="number" class="form-control" min="0" max="20" name="buttonBorder" id="buttonBorder" value="0">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="buttonSettingsSave">Save</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->


	<div class="modal fade" id="formBuildModal" tabindex="-1" role="dialog" aria-labelledby="formBuildModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<div class="btn-group pull-right template-btn" id="loadsample">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							Load Template <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
						</ul>
					</div>
					<h4 class="modal-title" id="formBuildLabel">Form Builder</h4>
				</div>
				<div class="modal-body">
					<div class="row clearfix">
						<div class="col-md-12 table-responsive">
							<table class="table table-bordered table-hover table-sortable" id="fields">
								<tbody>
									<tr id="field0" data-id="0" class="hidden">
										<td data-name="move">
											<span class="btn btn-default" type="button" title="Drag">
											<i class="fa fa-arrows"></i>
										</span>
										</td>
										<td data-name="caption">
											<input type="text" name="caption0" placeholder="Field Label" class="form-control" />
										</td>
										<td data-name="placeholder">
											<input type="text" name="placeholder0" placeholder="Field Placeholder" class="form-control" />
										</td>
										<td data-name="type">
											<select name="type0" class="form-control">
											</select>
										</td>
										<td data-name="required">
											<button class="btn btn-default req" name="required0" data-toggle="button">Required
											</button>
											<input type="hidden" value="false">
										</td>
										<td data-name="del">
											<button name="del0" class="btn btn-danger row-remove">
												<i class="fa fa-trash-o"></i>
											</button>
										</td>
									</tr>
								</tbody>
							</table>

							<a id="addField" class="btn btn-primary pull-right">
								<i class="fa fa-plus"></i> Add new field
							</a>

						</div>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3">
									<label for="formSubmitLabel">Button label:</label>

									<div class="input-group pull-left" style="margin-bottom:10px">
										<input type="text" id="formSubmitLabel" class="form-control" value="Submit">
									</div>
								</div>
								<div class="col-md-2">
									<label for="formSubmitBorder">Border radius:</label>

									<div class="input-group pull-left" style="margin-bottom:10px">
										<input type="number" id="formSubmitBorder" class="form-control" min="0" max="20" value="0">
									</div>
								</div>
								<div class="col-md-2">
									<label for="formSubmitStyle">Button style:</label>
									<select class="form-control" id="formSubmitStyle">
										<option value="btn-default" selected>Default</option>
										<option value="btn-primary">Primary</option>
										<option value="btn-success">Success</option>
										<option value="btn-info">Info</option>
										<option value="btn-warning">Warning</option>
										<option value="btn-danger">Danger</option>
										<option value="btn-custom">Custom...</option>
									</select>
								</div>
								<div class="col-md-2 formSubmitColorDiv">
									<label for="formSubmitColor">Button color:</label>

									<div class="input-group">
										<div class="input-group-addon">&nbsp;&nbsp;</div>
										<input type="text" class="form-control colorinput" name="formSubmitColor" id="formSubmitColor" value="#ededed">
									</div>
								</div>
								<div class="col-md-2 formSubmitColorDiv">
									<label for="formSubmitTextColor">Text color:</label>

									<div class="input-group">
										<div class="input-group-addon">&nbsp;&nbsp;</div>
										<input type="text" class="form-control colorinput" name="formSubmitTextColor" id="formSubmitTextColor" value="#ffffff">
									</div>
								</div>
							</div>

						</div>

					</div>

					<div class="row clearfix hide">
						<div class="well">
							<textarea class="form-control" rows="5" id="jsonresult">
							</textarea>
						</div>
					</div>

					<div class="row hide">
						<div class="form-container">
							<form id="myform"></form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" id="formbuild-save">Save</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<script src="/libs/bootstrap.min.js"></script>
	<script src="/libs/scripts/owl.carousel.min.js"></script>
	<script src="/libs/scripts/jquery.htmlClean.js"></script>
	<script src="/libs/scripts/email.js"></script>
	<script src="/libs/scripts/jquery.dform-1.1.0.min.js"></script>
	<script src="/libs/scripts/colorpicker.js"></script>
	<script src="/libs/scripts/scripts1.js"></script>
	<script src="/libs/scripts/widgets.js"></script>
	<script src="/libs/scripts/modals.js"></script>
	<script src="/libs/scripts/formbuild.js"></script>

	<script type=text/javascript>
		/*(function () {
												    var po = document.createElement('script');
												    po.type = 'text/javascript';
												    po.async = true;
												    po.src = 'https://apis.google.com/js/platform.js';
												    var s = document.getElementsByTagName('script')[0];
												    s.parentNode.insertBefore(po, s);
												})();
												*/

	</script>

	<script type="text/javascript">
		function performOnLoad() {
			$('.editor-mode a').click();
			$("#edit_preview").click(function() {
				return $("body").removeClass("sourcepreview"), $("body").addClass("edit"), $(".preview-btn").addClass("hide"), $(this).addClass("active"), !1
			});
			var emailTemplateId = $('#emailTemplateId').val();
			if (emailTemplateId) {
				$.getJSON('/app/emails/getRawContentAndStyle.json', {
					'emailTemplateId': emailTemplateId
				}, function(data) {
					loadLayout(data["contentRaw"], data["styleRaw"]);
				});
			}
		}

		$(document).ready(function() {

			$("#nextGenDynamic").change(function() {
				if ($(this).is(":checked")) {
					$("#dynamicEmailSettingsWrapper").show();
				} else {
					$("#dynamicEmailSettingsWrapper").hide();
				}

			});

			$('#button-download-modal').on('click', function() {
				downloadLayoutSrc("email");
			});

			function saveEmailTemplate() {
				var templateName = document.getElementById('name').value;
				var subject = document.getElementById('subject').value;
				var emailAccount = document.getElementById('standardEmailAccount').value;
				if (templateName && subject && emailAccount) {
					$.ajax({
						url: '/app/emails/addStandardEmailVisualEditor.php',
						type: 'POST',
						async: false,
						data: $('#addStandardEmailForm').serialize(),
						success: function(data) {
							saveLayout(data);
							$('#downloadModal').modal('hide');
							$("#afterSaveModalDialog").modal('show');
							$("#standardEmailId").val(data);
						},
						error: function() {
							alert("error, could not save email");
						}
					});
				} else {
					alert('Could not save an email. Please check if all necessary fields are filled in.');
				}
			}

			function saveEmailTemplateAndSend() {
				var templateName = document.getElementById('name').value;
				var subject = document.getElementById('subject').value;
				if (templateName && subject) {
					$.ajax({
						url: '/app/emails/addStandardEmailVisualEditor.php',
						type: 'POST',
						async: false,
						data: $('#addStandardEmailForm').serialize(),
						success: function(data) {
							saveLayout(data);
							window.parent.location = '/app/emails/sendStandardEmail.php?email=' + data;
						},
						error: function() {
							alert("error, could not save email");
						}
					});
				} else {
					alert('Could not save an email. Please check if all necessary fields are filled in.');
				}
			}

			function findImagesToGallery(page, days) {
				$.ajax({
					url: '/app/emails/reloadEmailEditorGalleryContent.php',
					type: 'POST',
					data: {
						days: days,
						page: page
					},
					success: function(data) {
						$('#gallery_content').html(data);
					},
					error: function() {
						alert("error, could not load images");
					}
				});
			}

			$('#saveButton').on('click', function() {
				saveEmailTemplate();
			});

			$('#saveAndSendButton').on('click', function() {
				saveEmailTemplateAndSend();
			});

			$('#exitToEmailList').on('click', function() {
				window.parent.location = '/app/emails/standardEmailsList.php';
			});

			$('#findImagesByDays').on('click', function() {
				var days = $('#rangeDate').val();
				findImagesToGallery(null, days);
			});

			$('#historyButton_previous').on('click', function(e) {
				e.preventDefault();
				var currentGalleryPage = parseInt($(this).attr('href')) - 1;
				var days = $('#rangeDate').val();
				findImagesToGallery(currentGalleryPage, days);
			});

			$('#historyButton_next').on('click', function(e) {
				e.preventDefault();
				var currentGalleryPage = parseInt($(this).attr('href')) + 1;
				var days = $('#rangeDate').val();
				findImagesToGallery(currentGalleryPage, days);
			});

			$("#submitFileUploadForm").click(function(e) {
				$('#fileUploadForm').submit();
			});

			document.getElementById('fileUploadForm').onsubmit = function() {
				document.getElementById('fileUploadForm').target = 'upload_target';
				setTimeout(function() {
					findImagesToGallery(null, null);
				}, 3000);
			};

			function deleteFile(name, shortId) {
				var dataObj = {};
				dataObj["fileName"] = name;
				dataObj["shortId"] = shortId;
				var deleteImage = confirm("Are you sure that you want to delete selected picture?");
				if (deleteImage) {
					$.ajax({
						type: 'POST',
						url: '/app/gallery/delete.php',
						data: dataObj,
						cache: false,
						async: false,
						timeout: 240000,
						success: function(data) {
							if ("ERROR" == data) {
								alert("error");
							} else {
								$("#galleryImage_" + shortId).remove();
							}
						},
						error: function(data) {}
					});
				}
				findImagesToGallery(null, null);
			}

			performOnLoad();

		});

	</script>

</body>

</html>

<div class="row hidden" id="testRow" style="margin-top: 50px;">
	<a class="wizard-next next-1 button btnNextArrow" style="border-radius: 3px; float: right; position: absolute; bottom: 48px; right: 32px;">Next</a>
	<button class="btn btn-white btn-sm deleteTemplate" href="#" id="testButton" data-test="dzialaj kurwa">
		<i class="fa fa-trash-o">&nbsp;</i>Delete
	</button>
</div>
