<?php
require_once __DIR__ . "/../config/config.php";

function deleteClient($id)
{
    $pdo = getPDO();

    $sql = "DELETE FROM client WHERE id_client = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        'id' => $id
    ]);

    return $stmt->rowCount();
}

$result = deleteClient(1);

if ($result > 0) {
    echo "Client supprimé";
} else {
    echo "Client introuvable";
}

function listerClient()
{
    $pdo = getPDO();
    $sql = "SELECT * FROM `client`";
    $stm = $pdo->query($pdo);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
