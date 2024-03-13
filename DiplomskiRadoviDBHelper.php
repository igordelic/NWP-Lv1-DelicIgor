<?php

class DiplomskiRadoviDBHelper {

    protected $db;
    private static $instance = null;

    private function __construct(MyPDO $db) {
        $this->db = $db;
    }

    public function findAll() {
        return $this->db->query("SELECT * FROM diplomski_radovi")->fetchAll();
    }

    public function insert($naziv_rada, $tekst_rada, $link_rada, $oib_tvrtke) {
        $stmt = $this->db->prepare("INSERT INTO diplomski_radovi (naziv_rada, tekst_rada, link_rada, oib_tvrtke) VALUES (?, ?, ?, ?)");
        $valid = $stmt->execute([$naziv_rada, $tekst_rada, $link_rada, $oib_tvrtke]);
        return $valid;
    }

    public static function getInstance(MyPDO $db) {
        if (self::$instance == null) {
            self::$instance = new DiplomskiRadoviDBHelper($db);
        }
        return self::$instance;
    }

    public function destroy() {
        $this->db->destroy();
    }
}
