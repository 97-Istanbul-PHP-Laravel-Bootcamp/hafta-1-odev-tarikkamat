<?php 

require_once('settings.config.php');

class Category
{
    
    public function getCategry()
    {
        global $db;
        $query  = $db->query("SELECT * FROM categories");
        $raw = $query->fetchAll(PDO::FETCH_ASSOC);

		return $raw;
    }

    public function deleteCategory($id)
	{
		global $db;
		$query = $db->query("DELETE FROM categories WHERE Id = '$id'");
		if ($query->rowCount() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function getEditCategory($id)
	{
		global $db;
		$query = $db->query("SELECT Id,Name,ParentId FROM categories WHERE Id = '$id'")->fetch(PDO::FETCH_ASSOC);
		return $query;
	}

	public function editCategory($Id,$Name,$ParentId)
	{
		global $db;
		$query = $db->query("UPDATE categories SET Name = '$Name' , ParentId = '$ParentId'  WHERE Id = '$Id'");
		if ($query->rowCount() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function addCategory($Name,$ParentId)
	{
		global $db;
		$query = $db->prepare('INSERT INTO categories (Name,ParentId) VALUES(?,?)');
		$query->bindParam(1, $Name);
		$query->bindParam(2, $ParentId);
		
		$result = $query->execute();

		return $result;
	}



}



?>
