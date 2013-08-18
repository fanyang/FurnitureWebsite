<div id="menu">
	<div id="menu_title"><a href="/category"><img src="/img/category/category.png" /></a></div>
		<ul>
			<li><a href="/category/1">Table</a>
				<ul class="sub_nav">
					<?php foreach ($sub_categories[1] as $sub_category):?>
						<li><a href="/category/<?php echo $sub_category->id;?>"><?php echo $sub_category->cname;?></a></li>
					<?php endforeach;?>
				</ul>
			</li>
			<li><a href="/category/2">Chair</a>
				<ul class="sub_nav">
					<?php foreach ($sub_categories[2] as $sub_category):?>
						<li><a href="/category/<?php echo $sub_category->id;?>"><?php echo $sub_category->cname;?></a></li>
					<?php endforeach;?>
				</ul>
			</li>
			<li><a href="/category/3">Sofa</a>
				<ul class="sub_nav">
					<?php foreach ($sub_categories[3] as $sub_category):?>
						<li><a href="/category/<?php echo $sub_category->id;?>"><?php echo $sub_category->cname;?></a></li>
					<?php endforeach;?>
				</ul>
			</li>
		</ul>
</div><!-- end of menu -->

<div id="products">
	<div id="category_title"><h1><?php echo $category->cname;?></h1></div>
	
	<div id="products_list">
	<?php foreach ($products as $product):?>
		<div>
			<a href="/product/<?php echo $product->id;?>" target="blank">
			<img src="<?php echo $product->pic;?>" />
			</a>
			<p><?php echo $product->pname;?></p>
		</div>
	<?php endforeach;?>
	</div>
	
	<div id="products_pager">
		<ul>
			<li><a href="/category/<?php echo $category->id;?>/1">« first</a></li>
		
			<li><a href="/category/<?php echo $category->id;?>/<?php
			echo ($current_page == 1) ? 1 : ($current_page - 1);
		?>">‹ previous</a></li>
		
			<li><a href="/category/<?php echo $category->id;?>/<?php
			echo ($current_page == $total_page) ? $total_page : ($current_page + 1);
		?>">next ›</a></li>
			<li><a href="/category/<?php echo $category->id;?>/<?php echo $total_page;?>">last »</a></li>
			<li><span style="display: inline-block; width: 60px;"></span></li>
			<li>Page: <?php echo ($current_page);?> / <?php echo $total_page;?></li>
		</ul>
		
	</div>

</div><!-- end of products -->

<div style="clear:both"></div>