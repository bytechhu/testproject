<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

	<?php if (\Yii::$app->user->can('ManageGroups')) { ?>

    <div class="col-sm-10" id="group_box" style="border: solid 2px gray;">
	
	
	
	<?php foreach($groups as $item) { ?>
		
		<h2 class="groups" style="font-size: 30px;"><?php echo $item['name']; ?></h2><br />
		<?php
		if(isset($item['children'])) {
			foreach($item['children'] as $chitem) { ?>
			<h2 class="groups" style="font-size: 30px; margin-left: 40px;"><?php echo $chitem['name']; ?></h2><br />
		<?php		
		} }	}	
		?>
		

	
	</div>
	
	<?php } ?>
	
</div>
