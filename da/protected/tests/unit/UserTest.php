<?php
class UserTest extends CDbTestCase {
// 	public $fixtures=array(
// 		'users'=>'User',
// 	);
	public function testCRUD() {
// 		$newUser = new User ();
// 		$newUserName = 'songdragon';
// 		$newUser->setAttributes(array(
// 				'id'=>'000001',
// 			'username'=>$newUserName,
// 			'password'=>'19880313',
// 			'district'=>'1'	,
// 			'role'=>'1',
// 			'register_date'=>'2013-03-09 23:42:00',
// 		))
// 		;
		
// 		$this->assertTrue($newUser->save(false));
		
// 		//read
// 		$user=User::model()->findByPk($newUser->id);
// 		$this->assertTrue($user instanceof User);
// 		$this->assertEquals($newUserName, $user->username);
		$roleId=new Role();
			$roleId=$roleId->find('name=:name',array(':name'=>'医生'));
			echo 12345;
			echo $roleId->id;
	}
}
?>