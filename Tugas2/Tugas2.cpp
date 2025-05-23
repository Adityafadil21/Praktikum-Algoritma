#include <iostream>
using namespace std;

struct Pesanan {
    string nama;
    string jenisRoti;
    double totalHarga;
    Pesanan *next;
};

// Queue buat antrian pesanan
Pesanan *depan = nullptr, *belakang = nullptr;

// Stack buat riwayat pesanan
Pesanan *top = nullptr;

void ambilAntrian(string nama, string jenisRoti, double totalHarga) {
    Pesanan* baru = new Pesanan;
    baru->nama = nama;
    baru->jenisRoti = jenisRoti;
    baru->totalHarga = totalHarga;
    baru->next = nullptr;
    if (depan == nullptr) {
        depan = belakang = baru;
        cout << "Node dibuat di alamat: " << baru << endl;

    } else {
        belakang->next = baru;
        belakang = baru;
    }
    cout << "Pesanan atas nama " << nama << " berhasil ditambahkan ke antrian" << endl;
}

void layaniPembeli() {
    if (depan == nullptr) {
        cout << "Antrean kosong." << endl;
        return;
    }
    Pesanan *proses = depan;
    cout << "Melayani pesanan: " << proses->nama << proses->jenisRoti << " Rp. " << proses->totalHarga << endl;
     
    // Hapus dari antriiann
    depan = depan->next;
    if (depan == nullptr){
        belakang = nullptr;
    } 

    // Pindahkan ke riwayat (stack)
    proses->next = top;
    top = proses;
}

void tampilkanPesanan() {
    if (depan == nullptr) {
        cout << "Antrean kosong." << endl;
        return;
    }
    Pesanan *bantu = depan;
    cout << "Daftar Pesanan Dalam Antrean:" << endl;
    while (bantu != nullptr) {
        cout << "==================================================================" << endl;
        cout << bantu->nama << " | " << bantu->jenisRoti << " | Rp. " << bantu->totalHarga << endl;
        bantu = bantu->next;
        cout << "==================================================================" << endl;
    }
}

void batalkanPesanan() {
    if (depan == nullptr) {
        cout << "Antrean kosong, tidak ada pesanan yang bisa dibatalkan." << endl;
        return;
    }
    
    if (depan == belakang) {
        delete depan;
        depan = belakang = nullptr;
    } else {
        Pesanan *bantu = depan;
        while (bantu->next != belakang) {
            bantu = bantu->next;
        }
        delete belakang;
        belakang = bantu;
        belakang->next = nullptr;
    }
    cout << "Pesanan terakhir berhasil dibatalkan." << endl;
}

void tampilkanHistoryPesanan() {
    if (top == nullptr) {
        cout << "Belum ada pesanan yang dilayani." << endl;
        return;
    }
    Pesanan *bantu = top;
    cout << "Riwayat Pesanan yang Sudah Dilayani:" << endl;
    while (bantu != nullptr) {
        cout << bantu->nama << " | " << bantu->jenisRoti << " | Rp. " << bantu->totalHarga << endl;
        bantu = bantu->next;
    }
}

int main() {
    int pilihan;
    string nama, jenisRoti;
    double totalHarga;

    do {
        cout << endl;
        cout << "=== Sistem Antrean Toko Roti Manis Lezat ===" << endl;
        cout << "1. Ambil Antrean" << endl;
        cout << "2. Layani Pembeli" << endl;
        cout << "3. Tampilkan Pesanan" << endl;
        cout << "4. Batalkan Pesanan" << endl;
        cout << "5. Tampilkan History Pesanan" << endl;
        cout << "0. Keluar" << endl;
        cout << "Pilih menu: ";
        cin >> pilihan;

        switch (pilihan) {
            case 1:
                cout << "Masukkan Nama: ";
                cin >> nama;
                cout << "Masukkan Jenis Roti: ";
                cin >> jenisRoti;
                cout << "Masukkan Total Harga: ";
                cin >> totalHarga;
                ambilAntrian(nama, jenisRoti, totalHarga);
                break;
            case 2:
                layaniPembeli();
                break;
            case 3:
                tampilkanPesanan();
                break;
            case 4:
                batalkanPesanan();
                break;
            case 5:
                tampilkanHistoryPesanan();
                break;
            case 0:
                cout << "Terimakasih sudah memakai program ini :)" << endl;
                break;
            default:
                cout << "Pilihan tidak valid" << endl;
        }
    } while (pilihan != 0);

    return 0;
}
