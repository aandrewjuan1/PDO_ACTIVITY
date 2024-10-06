<?php

require_once("./core/Database.php");

class Product extends Database {

    // Method to get all products from the database
    public function getAllProducts() {
        try {
            // Establish database connection
            $dbh = $this->connect();
            
            // SQL query to fetch all products
            $sql = "SELECT * FROM products";
            
            // Prepare and execute the query
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            
            // Fetch all products as an associative array
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Return the list of products
            return $products;
        } catch (PDOException $e) {
            // Log the error message for debugging purposes
            error_log("Error fetching products: " . $e->getMessage());
            return []; // Return an empty array or handle as needed
        }
    }

    // Method to get a single product based on its ID
    public function getProductById($id) {
        try {
            // Establish database connection
            $dbh = $this->connect();

            // SQL query to fetch the product by ID
            $sql = "SELECT * FROM products WHERE id = :id";

            // Prepare the query
            $stmt = $dbh->prepare($sql);

            // Bind the ID parameter to the query
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the query
            $stmt->execute();

            // Fetch the single product as an associative array
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
   
            // Return the product
            return $product;
        } catch (PDOException $e) {
            // Log the error message for debugging purposes
            error_log("Error fetching product by ID: " . $e->getMessage());
            return null; // Return null or handle as needed
        }
    }

    // Method to delete a product by ID
    public function deleteProductById($id) {
        try {
            // Establish database connection
            $dbh = $this->connect();

            // SQL query to delete the product by ID
            $sql = "DELETE FROM products WHERE id = :id";

            // Prepare the query
            $stmt = $dbh->prepare($sql);

            // Bind the ID parameter to the query
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the query
            $result = $stmt->execute();

            // Return true if the product was successfully deleted, false otherwise
            return $result;
        } catch (PDOException $e) {
            // Log the error message for debugging purposes
            error_log("Error deleting product: " . $e->getMessage());
            return false; // Return false to indicate failure
        }
    }

    // Method to create a new product with only name and category ID
    public function createProduct($name, $categoryId) {
        try {
            // Establish database connection
            $dbh = $this->connect();

            // SQL query to insert a new product
            $sql = "INSERT INTO products (product_name, category_id) VALUES (:product_name, :category_id)";

            // Prepare the query
            $stmt = $dbh->prepare($sql);

            // Bind the parameters
            $stmt->bindParam(':product_name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);

            // Execute the query
            $result = $stmt->execute();

            // Return true if the product was successfully created, false otherwise
            return $result;
        } catch (PDOException $e) {
            // Log the error message for debugging purposes
            error_log("Error creating product: " . $e->getMessage());
            return false; // Return false to indicate failure
        }
    }

    // Method to update a product's name and category ID
    public function updateProduct($id, $name, $categoryId) {
        try {
            // Establish database connection
            $dbh = $this->connect();

            // SQL query to update the product
            $sql = "UPDATE products SET product_name = :product_name, category_id = :category_id WHERE id = :id";

            // Prepare the query
            $stmt = $dbh->prepare($sql);

            // Bind the parameters
            $stmt->bindParam(':product_name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the query
            $result = $stmt->execute();

            // Return true if the product was successfully updated, false otherwise
            return $result;
        } catch (PDOException $e) {
            // Log the error message for debugging purposes
            error_log("Error updating product: " . $e->getMessage());
            return false; // Return false to indicate failure
        }
    }
}
?>
