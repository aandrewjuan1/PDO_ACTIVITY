<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
</head>
<body>
    <h1>Product Display</h1>
    <!-- Section to show a single product -->
    <div class="single-product">
        <h2>View a Product by ID</h2>

        <!-- Form to enter a product ID and view the product details via GET request -->
        <form method="GET">
            <input type="number" name="product_id" placeholder="Enter Product ID" required>
            <button type="submit">Get Product</button>
        </form>

        <?php
        require_once('./Model/Product.php');
        $productModel = new Product();
        // Handle GET request for product details by ID
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['product_id'])) {
            $productId = intval($_GET['product_id']);
            $product = $productModel->getProductById($productId);

            // Print the result using print_r within pre tags
            echo "<pre>";
            if ($product) {
                print_r($product);
            } else {
                echo "Product not found.";
            }
            echo "</pre>";
        }
        ?>
    </div>

    <!-- Section to create a new product -->
    <div class="create-product">
        <h2>Create a New Product</h2>
        <form method="POST">
            <input type="text" name="product_name" placeholder="Product Name" required>
            <input type="number" name="category_id" placeholder="Category ID" required>
            <button type="submit" name="create_product">Create Product</button>
        </form>

        <?php
        // Handle create product request
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_product'])) {
            $name = $_POST['product_name'];
            $categoryId = intval($_POST['category_id']);
            if ($productModel->createProduct($name, $categoryId)) {
                echo "<p>Product created successfully.</p>";
            } else {
                echo "<p>Failed to create product.</p>";
            }
        }
        ?>
    </div>

    <!-- Section to update a product -->
    <div class="update-product">
        <h2>Update a Product</h2>
        <form method="POST">
            <input type="number" name="update_product_id" placeholder="Product ID" required>
            <input type="text" name="new_product_name" placeholder="New Product Name" required>
            <input type="number" name="new_category_id" placeholder="New Category ID" required>
            <button type="submit" name="update_product">Update Product</button>
        </form>

        <?php
        // Handle update product request
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_product'])) {
            $id = intval($_POST['update_product_id']);
            $newName = $_POST['new_product_name'];
            $newCategoryId = intval($_POST['new_category_id']);
            if ($productModel->updateProduct($id, $newName, $newCategoryId)) {
                echo "<p>Product updated successfully.</p>";
            } else {
                echo "<p>Failed to update product.</p>";
            }
        }
        ?>
    </div>

    <!-- Section to show all products -->
    <div class="product-list">
        <h2>All Products</h2>
        <?php
        // Fetching all products when the button is clicked
        $products = $productModel->getAllProducts();

        // Display all products in a formatted way
        if (!empty($products)) {
            echo "<pre>";
            foreach ($products as $product) {
                print_r($product); // Display each product
                // Delete form for each product
                echo '<form method="POST" style="display:inline;">
                        <input type="hidden" name="delete_product_id" value="' . $product['id'] . '">
                        <button type="submit" name="delete_product">Delete</button>
                        </form>';
                echo "<hr>"; // Horizontal line for separation
            }
            echo "</pre>";
        } else {
            echo "<p>No products found.</p>";
        }

        // Handle delete product request
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_product'])) {
            $productIdToDelete = intval($_POST['delete_product_id']);
            if ($productModel->deleteProductById($productIdToDelete)) {
                echo "<p>Product deleted successfully.</p>";
            } else {
                echo "<p>Failed to delete product.</p>";
            }
        }
        ?>
    </div>

</body>
</html>
