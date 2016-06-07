<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (138);
$views = array ('buy','list','edit','insert','apply');
(! empty ( $view ) && in_array ( $view, $views ))  or  $view = 'list';
require ADMIN_ROOT . 'admin_payitem_' . $view . '.php';
