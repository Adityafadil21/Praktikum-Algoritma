#include <iostream>
#include <fstream>
#include <string>
using namespace std;

struct Pegawai
{
    string id;
    string nama;
    double gaji;
};

void TambahPegawai()
{
    FILE *file = fopen("pegawai.dat", "ab");
    if (file == NULL)
    {
        cout << "Error: Tidak dapat membuka file!" << endl;
        return;
    }

    int jumlah;
    cout << "Masukkan jumlah pegawai yang akan ditambahkan: ";
    cin >> jumlah;
    cin.ignore();

    Pegawai p;
    for (int i = 0; i < jumlah; i++)
    {
        cout << "\nData Pegawai ke-" << (i + 1) << endl;
        cout << "Masukkan ID Pegawai: ";
        getline(cin, p.id);

        cout << "Masukkan Nama Pegawai: ";
        getline(cin, p.nama);

        cout << "Masukkan Gaji Pegawai: ";
        cin >> p.gaji;
        cin.ignore();

        fwrite(&p, sizeof(Pegawai), 1, file);
    }

    fclose(file);
    cout << "\nData berhasil disimpan!" << endl;
}

void LihatPegawai()
{
    FILE *file = fopen("pegawai.dat", "rb");
    if (file == NULL)
    {
        cout << "Error: File tidak ditemukan atau tidak dapat dibuka!" << endl;
        return;
    }

    Pegawai p;
    bool adaData = false;

    cout << "\n===== DAFTAR PEGAWAI =====\n";
    cout << "ID\tNama\t\tGaji\n";
    cout << "------------------------------\n";

    while (fread(&p, sizeof(Pegawai), 1, file))
    {
        cout << p.id << "\t" << p.nama << "\t\t" << p.gaji << endl;
        adaData = true;
    }

    fclose(file);

    if (!adaData)
    {
        cout << "Tidak ada data pegawai yang tersedia." << endl;
    }
}

void CariPegawai()
{
    string idCari;
    cout << "Masukkan ID Pegawai yang dicari: ";
    cin.ignore();
    getline(cin, idCari);

    FILE *file = fopen("pegawai.dat", "rb");
    if (file == NULL)
    {
        cout << "Error: File tidak ditemukan atau tidak dapat dibuka!" << endl;
        return;
    }

    Pegawai p;
    bool ditemukan = false;

    while (fread(&p, sizeof(Pegawai), 1, file))
    {
        if (p.id == idCari)
        {
            cout << "\n===== DATA PEGAWAI =====\n";
            cout << "ID: " << p.id << endl;
            cout << "Nama: " << p.nama << endl;
            cout << "Gaji: " << p.gaji << endl;
            ditemukan = true;
            break;
        }
    }

    fclose(file);

    if (!ditemukan)
    {
        cout << "Error: Pegawai dengan ID " << idCari << " tidak ditemukan!" << endl;
    }
}

void PerbaruiGaji()
{
    string idCari;
    cout << "Masukkan ID Pegawai yang akan diperbarui gajinya: ";
    cin.ignore();
    getline(cin, idCari);

    FILE *file = fopen("pegawai.dat", "rb");
    if (file == NULL)
    {
        cout << "Error: File tidak ditemukan atau tidak dapat dibuka!" << endl;
        return;
    }
    int jumlahPegawai = 0;
    Pegawai temp;
    while (fread(&temp, sizeof(Pegawai), 1, file))
    {
        jumlahPegawai++;
    }

    if (jumlahPegawai == 0)
    {
        cout << "Tidak ada data pegawai dalam file!" << endl;
        fclose(file);
        return;
    }

    Pegawai *daftarPegawai = new Pegawai[jumlahPegawai];

    rewind(file);
    for (int i = 0; i < jumlahPegawai; i++)
    {
        fread(&daftarPegawai[i], sizeof(Pegawai), 1, file);
    }
    fclose(file);
    bool ditemukan = false;
    for (int i = 0; i < jumlahPegawai; i++)
    {
        if (daftarPegawai[i].id == idCari)
        {
            ditemukan = true;
            cout << "Data Pegawai Ditemukan:\n";
            cout << "ID: " << daftarPegawai[i].id << endl;
            cout << "Nama: " << daftarPegawai[i].nama << endl;
            cout << "Gaji Lama: " << daftarPegawai[i].gaji << endl;

            cout << "Masukkan Gaji Baru: ";
            cin >> daftarPegawai[i].gaji;
            cin.ignore();
            break;
        }
    }

    if (!ditemukan)
    {
        cout << "Error: Pegawai dengan ID " << idCari << " tidak ditemukan!" << endl;
        delete[] daftarPegawai;
        return;
    }

    file = fopen("pegawai.dat", "wb");
    if (file == NULL)
    {
        cout << "Error: Tidak dapat membuka file untuk pembaruan!" << endl;
        delete[] daftarPegawai;
        return;
    }

    for (int i = 0; i < jumlahPegawai; i++)
    {
        fwrite(&daftarPegawai[i], sizeof(Pegawai), 1, file);
    }

    fclose(file);
    delete[] daftarPegawai;
    cout << "Data gaji berhasil diperbarui!" << endl;
}

int main()
{
    int pilihan;

    do
    {
        cout << "\n===== SISTEM INFORMASI KEPEGAWAIAN =====\n";
        cout << "1. Tambah Data Pegawai\n";
        cout << "2. Lihat Daftar Pegawai\n";
        cout << "3. Cari Pegawai Berdasarkan ID\n";
        cout << "4. Perbarui Gaji Pegawai\n";
        cout << "5. Keluar\n";
        cout << "Pilihan: ";
        cin >> pilihan;

        switch (pilihan)
        {
        case 1:
            TambahPegawai();
            break;
        case 2:
            LihatPegawai();
            break;
        case 3:
            CariPegawai();
            break;
        case 4:
            PerbaruiGaji();
            break;
        case 5:
            cout << "Terima kasih telah menggunakan program ini!" << endl;
            break;
        default:
            cout << "Pilihan tidak valid. Silakan coba lagi." << endl;
        }
    } while (pilihan != 5);

    return 0;
}
