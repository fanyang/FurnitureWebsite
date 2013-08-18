<div id="gallery_title"><img src="/img/gallery/gallery.png" /></div>

<div id="big_img_background" onclick="hide_big_img()"></div>
<div id="big_img">
		<h1 id="big_img_title"></h1>
		<div id="big_img_close">
			<a href="javascript: hide_big_img()" title="Close"></a>
		</div>
		<div id="big_img_origin"><a href="#" target="_blank" title="Original"></a></div>
		<div id="big_img_pic"><img src="/img/common/loading.gif"/></div>
</div>

<script type="text/javascript">
		function show_big_img(img_url, img_title)
		{
			var big_img_background_obj = document.getElementById("big_img_background");
			var big_img_obj = document.getElementById("big_img");
			document.getElementById("big_img_title").innerHTML = img_title;
			document.getElementById("big_img_pic").firstChild.src = img_url;
			document.getElementById("big_img_origin").firstChild.href = img_url;
			
			big_img_background_obj.style.zIndex = 9999;
			big_img_background_obj.style.opacity = 0.5;
			big_img_obj.style.zIndex = 99999;
			big_img_obj.style.opacity = 1;
		}

		function hide_big_img()
		{
			
			var big_img_background_obj = document.getElementById("big_img_background");
			var big_img_obj = document.getElementById("big_img");
			
			big_img_obj.style.opacity = 0;
			big_img_obj.style.zIndex = -99999;
			big_img_background_obj.style.opacity = 0;
			big_img_background_obj.style.zIndex = -9999;
			document.getElementById("big_img_pic").firstChild.src = '/img/common/loading.gif';
		}
</script>

<?php foreach ($gallery_imgs as $gallery_img):?>
<div id="gallery_img_frame" onclick="show_big_img('<?php echo $gallery_img->img_url;?>', '<?php echo $gallery_img->id.": ".$gallery_img->title;?>');">
	<div id="gallery_img_pic">
		<img src="<?php echo $gallery_img->thumb_url;?>" />
	</div>
	<div id="gallery_img_title">
		<?php echo $gallery_img->title;?>
	</div>
</div>
<?php endforeach;?>

<div style="clear: both;"></div>

	<div id="pager">
		<ul>
			<li><a href="/gallery/1">« first</a></li>
		
			<li><a href="/gallery/<?php
			echo ($current_page == 1) ? 1 : ($current_page - 1);
		?>">‹ previous</a></li>
		
			<li><a href="/gallery/<?php
			echo ($current_page == $total_page) ? $total_page : ($current_page + 1);
		?>">next ›</a></li>
			<li><a href="/gallery/<?php echo $total_page;?>">last »</a></li>
			<li><span style="display: inline-block; width: 220px;"></span></li>
			<li>Page: <?php echo ($current_page);?> / <?php echo $total_page;?></li>
		</ul>
		
	</div>