<?php

class Product
{

    public function getProduct()
    {
        global $db;
        $query  = $db->query("SELECT* FROM products");
        $raw = $query->fetchAll(PDO::FETCH_ASSOC);

		return $raw;
    }

    public function getEditProduct($id)
	{
		global $db;
		$query = $db->query("SELECT * FROM products WHERE Id = '$id'")->fetch(PDO::FETCH_ASSOC);
		return $query;
	}

}

?>