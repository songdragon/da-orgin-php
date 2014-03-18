<?php
return CMap::mergeArray ( require (dirname ( __FILE__ ) . '/main.php'), array (
		'components' => array (
				'fixture' => array (
						'class' => 'system.test.CDbFixtureManager' 
				),
			/* uncomment the following to provide test database connection*/
			'db' => array (
						'connectionString' => 'mysql:host=localhost;port=3306;dbname=da_db;',
						'emulatePrepare' => true,
						'username' => 'root',
						'password' => 'Song@19880313',
						'charset' => 'utf8' 
				) 
		)
		 
) );
