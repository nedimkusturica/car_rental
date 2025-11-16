<?php
require_once __DIR__ . '/../config.php';

class BaseDao {

    protected $table;
    protected $connection;

    public function __construct($table) {
        $this->table = $table;
        $this->connection = Database::connect();
    }

    public function getAll() {
        $stmt = $this->connection->prepare("SELECT * FROM " . $this->table);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id, $idField = null) {
        // Default id field based on table
        if ($idField === null) {
            $idField = match($this->table) {
                'users' => 'user_id',
                'categories' => 'category_id',
                'listings' => 'listing_id',
                'contacts' => 'contact_id',
                'testimonials' => 'testimonial_id',
                default => 'id'
            };
        }
        $stmt = $this->connection->prepare("SELECT * FROM " . $this->table . " WHERE $idField = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function insert($data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO " . $this->table . " ($columns) VALUES ($placeholders)";
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data, $idField = null) {
        // Default id field based on table
        if ($idField === null) {
            $idField = match($this->table) {
                'users' => 'user_id',
                'categories' => 'category_id',
                'listings' => 'listing_id',
                'contacts' => 'contact_id',
                'testimonials' => 'testimonial_id',
                default => 'id'
            };
        }
        $fields = "";
        foreach ($data as $key => $value) {
            $fields .= "$key = :$key, ";
        }
        $fields = rtrim($fields, ", ");
        $sql = "UPDATE " . $this->table . " SET $fields WHERE $idField = :id";
        $stmt = $this->connection->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id, $idField = null) {
        // Default id field based on table
        if ($idField === null) {
            $idField = match($this->table) {
                'users' => 'user_id',
                'categories' => 'category_id',
                'listings' => 'listing_id',
                'contacts' => 'contact_id',
                'testimonials' => 'testimonial_id',
                default => 'id'
            };
        }
        $stmt = $this->connection->prepare("DELETE FROM " . $this->table . " WHERE $idField = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
