<?php

require_once __DIR__ . "/../database.php";

class Product
{
    public $id;
    public $kode_produk;
    public $nama;
    public $harga;

    function __construct($id, $nama, $harga, $kode_produk)
    {
        $this->id = $id;
        $this->kode_produk = $kode_produk;
        $this->nama = $nama;
        $this->harga = $harga;
    }

    public static function getProducts(): array
    {
        $conn = Database::getConnection();

        $result = $conn->query("SELECT * FROM products");

        $products = [];
        foreach ($result as $row) {
            $products[] = new Product($row["id"], $row["nama"], $row["harga"], $row["kode_produk"]);
        }

        return $products;
    }

    public static function getProductById($id): ?Product
    {
        $conn = Database::getConnection();

        $result = $conn->query("SELECT * FROM products WHERE id = $id");

        if ($result->num_rows === 0) {
            return null;
        }

        $row = $result->fetch_assoc();

        return new Product($row["id"], $row["nama"], $row["harga"], $row["kode_produk"]);
    }

    public static function createProduct($nama, $harga, $kode_produk)
    {
        $conn = Database::getConnection();

        $sql = "INSERT INTO products VALUES (0, '$nama', $harga, $kode_produk)";

        return $conn->query($sql);
    }

    public static function updateProduct($id, $nama, $harga, $kode_produk)
    {
        $conn = Database::getConnection();

        // Menggunakan prepared statement untuk melakukan UPDATE
        $sql = "UPDATE products SET nama = ?, harga = ?, kode_produk = ? WHERE id = ?";

        $stmt = $conn->prepare($sql);

        // Bind parameter ke dalam statement
        $stmt->bind_param("sdis", $nama, $harga, $kode_produk, $id);

        // Eksekusi statement
        $result = $stmt->execute();

        return $result;
    }


    public static function deleteProduct($id)
    {
        $conn = Database::getConnection();

        $sql = "DELETE FROM products WHERE id = $id";

        return $conn->query($sql);
    }
}
