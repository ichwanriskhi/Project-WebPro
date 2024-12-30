<?php
include '../db_connect.php';

// Validasi parameter id_lelang
if (isset($_GET['id_lelang']) && is_numeric($_GET['id_lelang'])) {
    $id_lelang = intval($_GET['id_lelang']);
} else {
    die("ID Lelang tidak valid.");
}

// Mulai transaksi
mysqli_begin_transaction($conn);

try {
    // 1. Update status lelang menjadi "ditutup"
    $updateLelangQuery = "UPDATE lelang SET status = 'ditutup' WHERE id_lelang = ?";
    $stmtLelang = $conn->prepare($updateLelangQuery);
    $stmtLelang->bind_param("i", $id_lelang);
    $stmtLelang->execute();

    // 2. Cari penawaran tertinggi untuk id_lelang tersebut
    $getHighestBidQuery = "SELECT id_penawaran, id_pembeli FROM penawaran 
                           WHERE id_lelang = ? 
                           AND (status_tawar IS NULL OR status_tawar != 'banned') 
                           ORDER BY penawaran_harga DESC LIMIT 1";
    $stmtHighestBid = $conn->prepare($getHighestBidQuery);
    $stmtHighestBid->bind_param("i", $id_lelang);
    $stmtHighestBid->execute();
    $resultHighestBid = $stmtHighestBid->get_result();

    if ($resultHighestBid->num_rows > 0) {
        $highestBid = $resultHighestBid->fetch_assoc();
        $idPenawaran = $highestBid['id_penawaran'];

        // 3. Update status_tawar menjadi "win" untuk penawaran tertinggi
        $updateBidQuery = "UPDATE penawaran SET status_tawar = 'win' 
                           WHERE id_penawaran = ? AND (status_tawar IS NULL OR status_tawar = '')";
        $stmtUpdateBid = $conn->prepare($updateBidQuery);
        $stmtUpdateBid->bind_param("i", $idPenawaran);
        $stmtUpdateBid->execute();
    }

    // Commit transaksi
    mysqli_commit($conn);
    echo "<script>alert('Status lelang berhasil diperbarui menjadi 'ditutup' dan penawaran tertinggi diberi status 'win'.'); window.location.href='detail_lelang.php';</script>";
} catch (Exception $e) {
    // Rollback transaksi jika ada kesalahan
    mysqli_rollback($conn);
    die("Terjadi kesalahan: " . $e->getMessage());
}
