<?php

HTML::macro('macro_test', function($text){
	$menu = [
		[	'link'=>'#',
			'label'=>'mon lien',
			'icon'=>'link',
			'active'=>true,
		],
		[	'link'=>'#',
			'label'=>'autre lien',
			'icon'=>'file-text-o',
		],
		[	'link'=>'#',
			'label'=>'autre lien',
			'icon'=>'file-text-o',
		],
		/*[
			[	'link'=>'#',
				'label'=>'lien niveau 2',
			],
			[	'link'=>'#',
				'label'=>'autre lien niveau 2',
			],
		]*/
	];
	/*echo "<pre>";
	print_r($menu);
	echo "</pre>";*/
	ob_start();
	foreach($menu as $m){
		{	
			$link = $m['link'];
			$label = "*".$m['label'];
			$icon = $m['icon'];
			$active = isset($m['active']) ? $m['active'] : '';
			echo HTML::side_link($link, $label, $icon, $active) ;
		}
	}	
?>



	<!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"><?= $text ?></li>
        <!-- Optionally, you can add icons to the links -->
		
		
		<?= HTML::side_link('#', 'mon lien', 'link', true) ?>
		<?= HTML::side_link('#', 'autre lien')?>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i><span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?= HTML::side_link('#', 'lien niveau 2', false)?>
			<?= HTML::side_link('#', 'autre lien niveau 2', false)?>
            
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->	
	  
	  
	  
<?php
	
	
	$ret = ob_get_clean();
	
	return $ret;
	
	
});


HTML::macro('side_link', function($link, $label, $icon='link', $active = false){
	// prise en compte du parametre $class
	$class = "";
	if($active)
		$class='class="active"';
	// prise en compte du parametre $icon
	$icon_markup = "";
	if($icon)
		$icon_markup="<i class='fa fa-$icon'></i>";
	//ob_start();
?>	
	<li <?= $class ?>>
		<a href="<?= $link ?>"><?=$icon_markup?><span><?= $label ?></span></a>
	</li>
<?php	
	//$ret = ob_get_clean();
	//return $ret;
});



































