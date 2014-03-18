<h1>用户注册</h1>

<?php $this->renderPartial('register_form', array(
		'user'=>$user,
		'district'=>$district,
		'doctor'=>$doctor,
		'department'=>$department,
		'title'=>$title,
)); ?>