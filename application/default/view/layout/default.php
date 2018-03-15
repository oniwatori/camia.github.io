<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Comment #1: OG Tags -->
  	<meta property="og:url"           content="<?=FwBase::$baseUrl?>" />
  	<meta property="og:type"          content="<?=$this->type?>" />
  	<meta property="og:title"         content="<?=$this->title?>" />
  	<meta property="og:description"   content="<?=$this->description?>" />
  	<meta property="og:image"         content="<?=FwBase::$baseUrl?>/public/images/sites/<?=$this->image?>" />
	<title><?=$this->title?></title>

	<link rel="icon" href="<?=FwBase::$baseUrl?>/public/images/sites/favicon.ico">
	<link rel="stylesheet" href="<?=FwBase::$baseUrl?>/public/css/bootstrap.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?=FwBase::$baseUrl?>/public/css/bootstrap-theme.min.css" type="text/css" media="screen" />
  	<link rel="stylesheet" href="<?=FwBase::$baseUrl?>/public/css/base.css" type="text/css" media="screen" />  	
  	<link rel="stylesheet" type="text/css" media="screen" href="<?=FwBase::$baseUrl?>/public/css/font-awesome.css">

	<link rel="stylesheet" href="<?=FwBase::$baseUrl?>/public/css/style.css" type="text/css" media="screen" />

	<script>
		var baseUrl = '<?=FwBase::$baseUrl?>/';
	</script>
	<script src="<?=FwBase::$baseUrl?>/public/js/jquery-3.2.1.min.js"></script>
	
</head>
<body>
<header id="header" class="">
	<section class="section-01 ex">
		<div class="header-wrapper2">
	      <div class="container">
	        <div class="header-top-text2">
	          <div class="navbar-left"></div>
	          <div class="navbar-right">
	            <div class="menu-shoping">
	              <div class="item-shoping">
	                <a href="javascript:void(0)" id="btn-search-show-destop">
	                  <span>
	                    <span class="des">Tìm kiếm</span>
	                  </span>
	                </a>
	                <div class="serch-destop input-group">
	                  <form action="/tim-kiem" method="get">
	                    <input name="kw" data-url="/ajax/goi-y-tim-kiem" id="input-search-index" class="form-control input-search-index" aria-label="Text input with segmented button dropdown" placeholder="Tìm kiếm " type="text">
	                    <div class="input-group-btn">
	                      <button type="submit" class="btn btn-default button-search-index"><i class="fa fa-search"></i></button>
	                    </div>
	                  </form>
	                </div>
	              </div>              
	              <div class="item-shoping">
	                <a href="#"><span class="des">Giỏ hàng</span></a>
	              </div>
	              <div class="item-shoping border">
	                <a href="javascript:void(0)" id="btnLogin" data-url="/ajax/get-login-template"><span class="user">Đăng nhập</span></a>
	              </div>
	            </div>
	          </div>
	          <div style="clear: both;"></div>
	        </div>
	      </div>
	    </div>
	</section>

	<nav class="navbar navbar-toggleable-md navbar-light container">
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <a class="navbar-brand" href="#"><img src="<?=FwBase::$baseUrl?>/public/images/sites/<?=FwBase::$config['logo']?>" /></a>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
			<?php foreach ($this->horzFunc as $func) : ?>
				<?php Fw_Helper::doDrawMenu($this->horzFunc, $func, true) ?>				
			<?php endforeach; ?>
		</ul>
	  </div>
	</nav>

</header><!-- /header -->
<div class="content">
	<?=$this->placeholder()?>
</div><!-- /article -->
<footer id="footer" class="footer solid-bg">


    <div class="wf-wrap">
        <div class="container">
            <div class="wf-container">

                <section id="text-5" class="widget widget_text wf-cell wf-1-3">         <div class="textwidget"><p></p>
                    <p><strong>Nam Nghi Phu Quoc Island</strong><br>
                        Ấp 4, Xã Cửa Cạn, Huyện Phú Quốc<br>
                        Tỉnh Kiên Giang, Việt Nam<br>
                        <strong>t: </strong>(84-297) 378 8889 - <strong>f: </strong> (84-297) 368 8889<br>
                        <strong>e: </strong> booking@namnghiresort.com</p>
                        <p><strong>Phòng Sales và Marketing</strong><br>
                            Lầu 15, Tòa nhà A&amp;B Tower, 76A Lê Lai<br>
                            Quận 1, Thành phố Hồ Chí Minh, Việt Nam<br>
                            <strong>t: </strong>(84-28) 3521 9999 - <strong>f: </strong>(84-28) 3827 3675<br>
                            <strong>e: </strong> visitus@namnghiresort.com</p>
                        </div>
                    </section>
                    <section id="text-6" class="widget widget_text wf-cell wf-1-3">           <div class="textwidget"><p></p>
                        <ul class="bottom-menu">
                            <li><a href="/contact/?lang=vi">Liên hệ</a></li>
                            <li><a href="/protect-the-island/?lang=vi">Bảo vệ Phú Quốc</a></li>
                            <li><a href="/career/?lang=vi">Cơ hội nghề nghiệp</a></li>
                        </ul>
                    </div>
                </section>
                <section id="text-7" class="widget widget_text wf-cell wf-1-3">         <div class="textwidget"><p></p>
				    <p>ĐĂNG KÝ NHẬN THÔNG TIN<br>
				        <style type="text/css">
				        #mc_embed_signup{ clear:left; font:14px Helvetica,Arial,sans-serif; }
				    </style>
				</p><div id="mc_embed_signup">
					    <form action="/subscribe/post?u=6a17a6becea7269bf11ac6c57&amp;id=e88ae89167" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="novalidate" style="padding-left:0 !important;">
					        <div id="mc_embed_signup_scroll">
					            <div class="mc-field-group">
					                <input type="email" value="" name="EMAIL" class="required email mce_inline_error" id="mce-EMAIL" placeholder="Email Address " aria-required="true" aria-invalid="true" />
					                <div for="mce-EMAIL" class="mce_inline_error">This field is required.</div>
					            </div>
					            <div id="mce-responses" class="clear">
					                <div class="response" id="mce-error-response" style="display:none"></div>
					                <div class="response" id="mce-success-response" style="display:none"></div>
					                <p></p>
				                </div>
				                <p></p>
				                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6a17a6becea7269bf11ac6c57_e88ae89167" tabindex="-1" value=""></div>
				                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				                <p></p>
				            </div>
					    </form>
						</div>
					</div>
				</section>
            </div><!-- .wf-container -->
        </div><!-- .wf-container-footer -->
    </div><!-- .wf-wrap -->


    <div class="logo-footer container">
    </div>
    <!-- !Bottom-bar -->
    <div id="bottom-bar" class="solid-bg" role="contentinfo">
	    <div class="wf-wrap">
	        <div class="wf-container-bottom">
	            <div class="wf-table wf-mobile-collapsed">
	                <div class="wf-td">
	                </div>                
	                <div class="wf-td bottom-text-block">
	                    <p> All Right Reserved. Nam Nghi Phu Quoc Island Copyright 2017</p>
	                </div>                
	            </div>
	        </div><!-- .wf-container-bottom -->
	    </div><!-- .wf-wrap -->
	</div><!-- !End bottom-bar -->
</footer><!-- /footer -->
</body>
</html>
<script src="<?=FwBase::$baseUrl?>/public/js/tether.min.js"></script>
<script src="<?=FwBase::$baseUrl?>/public/js/bootstrap.min.js"></script>
<script src="<?=FwBase::$baseUrl?>/public/js/script.js"></script>
<script src="<?=FwBase::$baseUrl?>/public/js/jquery.smoove.js"></script>
<script>
	$(function(){
		$('.block').smoove();
	})
</script>
