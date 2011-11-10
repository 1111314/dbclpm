<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh
 * Date: 10/21/11
 * Time: 8:47 AM
 * To change this template use File | Settings | File Templates.
 */
       
        // dữ liệu username được gởi bởi user


        // checking username

        // dùng json_encode function để encode từ array sang JSON
        // echo json_encode($valid);
        // function check validate username
        function check_username($username) {
	    $username = trim($username); // strip any white space
	    $response = array(); // our response
          $db = new database();
	    // nếu chưa nhập username
	    if (!$username) {
		$response = array(
		'ok' => false,
		'msg' => "Bạn chưa nhập tên đăng nhập.");

	    } else if (strlen($username) < 4) {
		$response = array(
		'ok' => false,
		'msg' => "Tên đăng nhập phải có ít nhất 4 ký tự.");

	    // nếu username không có các giá trị a-z or '.', '-', '_' thì nó not valid
	    } else if (!preg_match('/^[a-z0-9.-_]+$/', $username)) {
		$response = array(
		'ok' => false,
		'msg' => "Tên đăng nhập chỉ chứa các ký tự alpha, dấu chấm và dấu gạch dưới. ");

	// nếu username đã có người sử dụng, ở đây giả sử là hàm username_taken()
	} else if ($db->isExist("thanh_vien","tv_ten_dang_nhap='".$username."'")) {
		$response = array(
		'ok' => false,
		'msg' => "Tên đăng nhập này đã tồn tại, vui lòng chọn tên khác.");

	// everything okay
	} else {
		$response = array(
		'ok' => true,
		'msg' => "bạn có thể dùng tên đăng nhập này.");
	}

	return $response;
}

?>