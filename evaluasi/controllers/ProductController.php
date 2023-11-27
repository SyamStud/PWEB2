<?php

require_once "Controller.php";
require_once __DIR__ . "/../models/Product.php";

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::getProducts();

        $this->view("products/index", [
            "products" => $products
        ]);

        // var_dump($products);
    }

    public function create()
    {
        $this->view("products/create");
    }

    public function store()
    {
        $nama = $_POST["nama"];
        $harga = $_POST["harga"];
        $kode_produk = $_POST["kode_produk"];

        Product::createProduct($nama, $harga, $kode_produk);

        session_start();
        $_SESSION["message"] = "addSuccess";

        // var_dump($_SESSION["message"]);
        header("Location: /products");
    }

    public function edit()
    {
        $id = $_GET["id"];

        $product = Product::getProductById($id);

        $this->view("products/edit", [
            "product" => $product
        ]);
    }

    public function update()
    {
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $harga = $_POST["harga"];
        $kode_produk = $_POST["kode_produk"];

        Product::updateProduct($id, $nama, $harga, $kode_produk);

        session_start();
        $_SESSION["message"] = "editSuccess";

        header("Location: /products");
    }

    public function delete()
    {
        $id = $_GET["id"];

        Product::deleteProduct($id);

        header("Location: /products");
    }
}
