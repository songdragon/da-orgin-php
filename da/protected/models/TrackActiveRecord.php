<?php
abstract class TrackActiveRecord extends CActiveRecord {
	/*
	 * (non-PHPdoc) @see CModel::beforeValidate()
	 */
	protected function beforeValidate() {
		if($this->isNewRecord){
			$this->register_date=$this->last_update=new CDbExpression('NOW()');
		}
		else{
			$this->last_update=new CDbExpression('NOW()');
		}
		return parent::beforeValidate();
	}
}

?>