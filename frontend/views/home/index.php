<div id="banner">
	<img id="banner1" src="/img/home/banner1.jpg" />
	<img id="banner2" src="/img/home/banner2.jpg" />
	<img id="banner3" src="/img/home/banner3.jpg" />
	<script type="text/javascript">
		var i = 3;
		var banner_fade = function ()
		{
			$("#banner"+i).fadeOut(2000);
			i = (i==3) ? 1 : (i+1);
			$("#banner"+i).fadeIn(2000, function(){
				setTimeout(banner_fade, 3000);
				});
			
		}
		$(document).ready(function(){
			setTimeout(banner_fade,3000);
		});
	</script>
</div>

<div id="latest">
	<h1><img src="/img/home/latest.png" /></h1>
	<h2><a href="/category"><img src="/img/home/more.gif" /></a></h2>
	<div class="splitter"></div>
	<?php foreach ($products as $product):?>
		<div class="latest_product">
			<a href="/product/<?php echo $product->id;?>" target="blank">
			<img src="<?php echo $product->pic;?>" />
			</a>
			<p><?php echo $product->pname;?></p>
		</div>
	<?php endforeach;?>
	
</div>