<?php
$this->widget('zii.widgets.CMenu',array(
   'items'=>array(
      array('label'=>'User Login', 'url'=>'#','linkOptions'=>array( 'onclick'=>'$("#userloginwidget").dialog("open"); return false;'), 'visible'=>Yii::app()->user->isGuest),  
   ),
)); 
 
$this->widget('UserLoginWidget',array('visible'=>Yii::app()->user->isGuest)); 
 
?>