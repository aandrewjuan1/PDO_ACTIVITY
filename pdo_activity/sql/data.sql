-- Insert into users
INSERT INTO users (username, email, password_hash, is_admin) VALUES
('crocheter1', 'crocheter1@example.com', 'password_hash1', 0),
('crocheter2', 'crocheter2@example.com', 'password_hash2', 0),
('crocheter3', 'crocheter3@example.com', 'password_hash3', 0),
('crocheter4', 'crocheter4@example.com', 'password_hash4', 0),
('crocheter5', 'crocheter5@example.com', 'password_hash5', 0),
('crocheter6', 'crocheter6@example.com', 'password_hash6', 0),
('crocheter7', 'crocheter7@example.com', 'password_hash7', 0),
('crocheter8', 'crocheter8@example.com', 'password_hash8', 0),
('crocheter9', 'crocheter9@example.com', 'password_hash9', 0),
('crocheter10', 'crocheter10@example.com', 'password_hash10', 0),
('crocheter11', 'crocheter11@example.com', 'password_hash11', 0),
('crocheter12', 'crocheter12@example.com', 'password_hash12', 0),
('crocheter13', 'crocheter13@example.com', 'password_hash13', 0),
('crocheter14', 'crocheter14@example.com', 'password_hash14', 0),
('crocheter15', 'crocheter15@example.com', 'password_hash15', 0),
('crocheter16', 'crocheter16@example.com', 'password_hash16', 0),
('crocheter17', 'crocheter17@example.com', 'password_hash17', 0),
('crocheter18', 'crocheter18@example.com', 'password_hash18', 0),
('crocheter19', 'crocheter19@example.com', 'password_hash19', 0),
('crocheter20', 'crocheter20@example.com', 'password_hash20', 0);

-- Insert into categories
INSERT INTO categories (category_name) VALUES
('Crochet Clothing'),
('Crochet Accessories'),
('Crochet Home Decor'),
('Crochet Toys'),
('Crochet Bags'),
('Crochet Blankets'),
('Crochet Hats'),
('Crochet Scarves'),
('Crochet Patterns'),
('Crochet Supplies'),
('Crochet Kits'),
('Crochet Jewelry'),
('Crochet Wall Art'),
('Crochet Pillow Covers'),
('Crochet Baby Items'),
('Crochet Pet Items'),
('Crochet Rugs'),
('Crochet Table Runners'),
('Crochet Plant Holders'),
('Crochet Keychains');

-- Insert into products
INSERT INTO products (category_id, product_name) VALUES
(1, 'Crochet Sweater'),
(1, 'Crochet Cardigan'),
(2, 'Crochet Headband'),
(2, 'Crochet Earrings'),
(3, 'Crochet Blanket Throw'),
(3, 'Crochet Cushion Cover'),
(4, 'Crochet Teddy Bear'),
(4, 'Crochet Doll'),
(5, 'Crochet Tote Bag'),
(5, 'Crochet Crossbody Bag'),
(6, 'Crochet Baby Blanket'),
(6, 'Crochet Lap Blanket'),
(7, 'Crochet Beanie'),
(7, 'Crochet Slouchy Hat'),
(8, 'Crochet Infinity Scarf'),
(8, 'Crochet Shawl'),
(9, 'Beginner Crochet Pattern'),
(9, 'Advanced Crochet Pattern'),
(10, 'Crochet Hook Set');

-- Insert into tags
INSERT INTO tags (tag_name) VALUES
('Handmade'),
('Eco-Friendly'),
('Unique Design'),
('Limited Edition'),
('Best Seller'),
('New Arrival'),
('Gift Item'),
('Winter Collection'),
('Summer Collection'),
('Kids Friendly'),
('Customizable'),
('Vegan'),
('Luxury Item'),
('Hand-Dyed Yarn'),
('Soft Cotton'),
('Wool Blend'),
('Fast Shipping'),
('On Sale'),
('One of a Kind'),
('Artisan Craft');

-- Insert into product_tags (Linking products to tags)
INSERT INTO product_tags (product_id, tag_id) VALUES
(1, 1), (1, 5), (2, 3), (2, 6),
(3, 7), (3, 10), (4, 9), (4, 14),
(5, 12), (5, 15), (6, 4), (6, 13),
(7, 17), (7, 18), (8, 16), (8, 11),
(9, 2), (9, 19), (10, 8), (10, 20);

-- Insert into user_favorites (Linking users to products)
INSERT INTO user_favorites (user_id, product_id) VALUES
(1, 1), (1, 2), (2, 3), (2, 4),
(3, 5), (3, 6), (4, 7), (4, 8),
(5, 9), (5, 10), (6, 1), (6, 3),
(7, 5), (7, 7), (8, 9), (8, 10),
(9, 2), (9, 4), (10, 6), (10, 8);