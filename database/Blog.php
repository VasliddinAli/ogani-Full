<?php

// PHP Blog class
class Blog{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    // get Blog items
    public function getBlogs(){
        $result = $this->db->con->query("SELECT * FROM blog");
        if($result->num_rows > 0){
            return $result;
        }
    }

    // insert blog
    public function setBlog($content, $title, $image, $category_id, $tags){
        $result = "INSERT INTO `blog` (`content`, `title`, `image`, `category_id`, `tags`) VALUES ('$content', '$title', '$image', '$category_id', '$tags');";
        if ($this->db->con->query($result)) {
            header("Location:" . $_SERVER['PHP_SELF']);
            return $result;
        }
    }

    // delete blog
    public function deleteBlog($item_id){
        $sql = "SELECT * FROM blog WHERE id=$item_id";
        $result = $this->db->con->query($sql);
        $row = $result->fetch_assoc();
        $unlink = unlink("./img/".$row['image']);
        if($unlink){
            $res = $this->db->con->query("DELETE FROM blog WHERE id={$item_id}");
            if($res){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
        }
    }


    // get one blog
    public function getBlog(){
        $item_id = $_GET['id'];
        $sql = "SELECT * FROM blog WHERE id=$item_id";
        $result = $this->db->con->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    
    // update blog
    public function updateBlog($content, $title, $image, $category_id, $tags){
        $item_id = $_GET['id'];
        $sql_update = "UPDATE `blog` SET `content` = '$content', `title` = '$title', `image` = '$image', `category_id` = '$category_id', `tags` = '$tags' WHERE `blog`.`id` = $item_id;";
        if ($this->db->con->query($sql_update) == TRUE) {
            header("Location: admin_blog.php");
        } else {
            echo "Error updating record: " . $this->db->con->error;
        }
    }
}