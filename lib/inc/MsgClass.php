<?php
class MsgClass {
	static function SendFeedMsg($receiver,$title,$content,$type='1'){
		$receiverInfo=kekezu::get_user_info(intval($receiver));
		if(!$receiverInfo){return false;}
		$objMsgM = new Keke_witkey_msg_class ();
		$objMsgM->setType($type);
		$objMsgM->setTo_uid ( $receiverInfo['uid'] );
		$objMsgM->setTo_username ( $receiverInfo ['username'] );
		$objMsgM->setTitle (kekezu::escape($title));
		$objMsgM->setContent (kekezu::escape($content));
		$objMsgM->setOn_time ( time () );
		return $objMsgM->create_keke_witkey_msg ();
	}
	static function getMsgReadStatus(){
		return  array('0'=>'未读','1'=>'已读');
	}
	static function getMsgSearchStatus(){
		return  array('0'=>'全部','1'=>'已读','2'=>'未读');
	}
}
?>