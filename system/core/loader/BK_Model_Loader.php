<?php
 
class BK_Model_Loader
{
     
    /**
     * Load model
     *
     * @param   string
     * @desc    hàm load model, tham số truyền vào là tên của model
     */
    public function load($model)
    {
        ob_start();
        require_once PATH_APPLICATION . '/model/' . $model . '.php';
        $content = ob_get_contents();
        ob_end_clean();
		
		// Open SQL session
		$link = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		if (!$link) {
			die('Could not connect: ' . mysql_error());
		}
		mysql_set_charset('utf8',$link);
		@mysql_select_db(DB_NAME) or die( "Unable to select database");
    }
	
	/**
     * Search
     *
     * @desc    Hàm cho phép get nội dung table được filter content
	 *			Hàm trả về array 2 chiều. Sử dụng như trong example file Controller.
     */
    public function search($model, $input, $field = 'content')
    {
        $query = "SELECT * FROM $model WHERE $field LIKE '%".$input."%'";
		$result_q = mysql_query($query);
		
		$result = array();
		while ($row = mysql_fetch_array($result_q, MYSQL_ASSOC)) {
			$result[] = $row;
		}
		
		return $result;
    }
     
    /**
     * Insert
     *
     * @desc    Hàm cho phép insert nội dung table
     */
    public function insert($model, $data = array())
    {
        $this->load($model);
		
		// Write content to Database
		$keys = array_keys($data);
		$values = array_values($data);
		$mat_keys=implode(",",$keys);
		$mat_values=implode("','",$values);
		
		$query = "INSERT INTO $model ($mat_keys) VALUES ('$mat_values')";
		
		mysql_query($query);
    }
	
	/**
     * Get
     *
     * @desc    Hàm cho phép get nội dung table
	 *			Hàm trả về array 2 chiều. Sử dụng như trong example file Controller.
     */
    public function get($model, $id = null )
	{
		$query = "SELECT * FROM $model ";
		if( !is_null($id) ) $query .= "WHERE id = '$id'";

		$result_q = mysql_query($query);

		$result = array();
		while ($row = mysql_fetch_array($result_q, MYSQL_ASSOC)) {
			$result[] = $row;
		}

		return $result;
	}
	/*
 	 * Get_count
	 * @desc    Hàm cho phép get so luong record table
	 *			Hàm trả về so luong laf mang 2 chieu. Sử dụng như trong example file Controller.
	 */
	public function get_count($model, $cond)
	{
		if (!isset($cond))
			$query = "SELECT COUNT(*) as soluong FROM $model";
		else
			$query = "SELECT COUNT(*) as soluong FROM $model WHERE $cond";
		$result_q = mysql_query($query);
		//echo $query;
		$result = array();

		while ($row = mysql_fetch_array($result_q, MYSQL_ASSOC)) {
			$result[] = $row;
		}

		return $result;
	}
	/*
	 * Get_có điều kiện
	 * @desc    Hàm cho phép get record table
	 *			Hàm trả về so luong laf mang 2 chieu. Sử dụng như trong example file Controller.
	 */
	public function get_condition($model, $cond)
	{
		$query = "SELECT * FROM $model WHERE $cond";
		$result_q = mysql_query($query);

		$result = array();
		while ($row = mysql_fetch_array($result_q, MYSQL_ASSOC)) {
			$result[] = $row;
		}

		return $result;
	}
	
	/**
     * Update
     *
     * @desc    Hàm cho phép edit nội dung table
     */
    public function update($model, $data = array())
    {
        $this->load($model);
		
		// Update content to Database
		$keys = array_keys($data);
		$values = array_values($data);
		$query = "UPDATE $model SET ";
		
		$max = sizeof($data);
		for ($x = 0; $x < $max-1; $x++) {
			$query = $query . "$keys[$x] = '$values[$x]', ";
		} 
		$max_1 = $max-1;
		$query = $query . "$keys[$max_1] = '$values[$max_1]' ";
		$query = $query . "WHERE id = '$values[0]'";

		mysql_query($query);
    }
	
	/**
     * Delete
     *
     * @desc    Hàm cho phép delete nội dung table
     */
    public function delete($model, $data = array())
    {
        $this->load($model);
		
		// Update content to Database
		$keys = array_keys($data);
		$values = array_values($data);
		$query = "DELETE FROM $model WHERE ";
		
		$max = sizeof($data);
		for ($x = 0; $x < $max-1; $x++) {
			$query = $query . "$keys[$x] = '$values[$x]' AND ";
		} 
		$max_1 = $max-1;
		$query = $query . "$keys[$max_1] = '$values[$max_1]' ";

		mysql_query($query);
    }
}