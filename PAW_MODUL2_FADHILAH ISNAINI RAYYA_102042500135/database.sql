CREATE DATABASE wad_handson;
USE wad_handson;

CREATE TABLE buku_123 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL DEFAULT 0
);

INSERT INTO buku_123 (judul, penulis, kategori, harga, stok) VALUES
('Laskar Pelangi', 'Andrea Hirata', 'Novel', 85000, 10),
('Bumi Manusia', 'Pramoedya Ananta Toer', 'Novel', 120000, 5),
('Belajar PHP & MySQL', 'Budi Raharjo', 'Pemrograman', 95000, 8);