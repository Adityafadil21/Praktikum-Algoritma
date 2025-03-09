#include <iostream>
using namespace std;

struct Film
{
    string judul;
    string kode;
    float rating;
};

void DataFilm(Film film[], int jumlah)
{
    cout << "\n===== DATA FILM =====" << endl;
    for (int i = 0; i < jumlah; i++)
    {
        cout << "\n-------------------------------------" << endl;
        cout << "Kode " << ":" << film[i].kode << endl;
        cout << "Judul " << ":" << film[i].judul << endl;
        cout << "Rating " << ":" << film[i].rating << endl;
        cout << "-------------------------------------";
    }
}

int CariFilm(Film film[], int jumlah, string kode)
{
    for (int i = 0; i < jumlah; i++)
    {
        if (film[i].kode == kode)
        {
            return i;
        }
    }
    return -1;
}

// MAAF KAK BINGUNG JADI AKU BUBBLE SHORT DULU BIAR URUT BARU MASUK BINARY HEHE (EKSPERIMEN SMG BENER)
void BubbleSortByTitle(Film *film, int jumlah_film)
{
    for (int i = 0; i < jumlah_film - 1; i++)
    {
        for (int j = 0; j < jumlah_film - 1 - i; j++)
        {
            if (film[j].judul > film[j + 1].judul)
            {
                swap(film[j], film[j + 1]);
            }
        }
    }
}
int BinarySearch(Film *film, int jumlah, string judul)
{
    int awal = 0;
    int akhir = jumlah - 1;

    while (awal <= akhir)
    {
        int tengah = awal + (akhir - awal) / 2;

        if (film[tengah].judul == judul)
        {
            return tengah;
        }

        if (film[tengah].judul < judul)
        {
            awal = tengah + 1;
        }
        else
        {
            akhir = tengah - 1;
        }
    }

    return -1;
}

int partisi(Film *film, int awal, int akhir)
{
    float pivot = film[akhir].rating;
    int index = awal;
    for (int j = awal; j < akhir; j++)
    {
        if (film[j].rating <= pivot)
        {
            swap(film[j], film[index]);
            index++;
        }
    }
    swap(film[akhir], film[index]);
    return index;
}

void Quicksort(Film *film, int awal, int akhir)
{
    if (awal < akhir)
    {
        int index_pivot = partisi(film, awal, akhir);
        Quicksort(film, awal, index_pivot - 1);
        Quicksort(film, index_pivot + 1, akhir);
    }
}

void Bubblesort(Film *film, int jumlah_film)
{
    for (int i = 0; i < jumlah_film - 1; i++)
    {
        for (int j = 0; j < jumlah_film - i - 1; j++)
        {
            if (film[j].rating < film[j + 1].rating)
            {
                swap(film[j], film[j + 1]);
            }
        }
    }
}

int main()
{
    Film Afilm[] = {
        {"Dilan 1991", "A001", 9.0},
        {"The Great Wall", "B002", 8.0},
        {"Interstellar", "C003", 8.5},
        {"Fight For my Way", "D004", 9.5}};
    int jumlah = sizeof(Afilm) / sizeof(Afilm[0]);

    int pilihan;
    string kode, judul;
    Film *PtrFilm = Afilm;

    do
    {
        cout << "\n====== SISTEM MANAJEMEN DATA BIOSKOP ======" << endl;
        cout << "1. Menampilkan semua film" << endl;
        cout << "2. Cari film berdasarkan kode" << endl;
        cout << "3. Cari film berdasarkan judul" << endl;
        cout << "4. Urutkan film berdasarkan rating" << endl;
        cout << "5. Urutkan film berdasarkan rating" << endl;
        cout << "0. Keluar" << endl;
        cout << "Pilihan Anda: ";
        cin >> pilihan;

        switch (pilihan)
        {
        case 1:
            DataFilm(Afilm, jumlah);
            cout << endl;
            break;

        case 2:
            cout << "Kode film: ";
            cin >> kode;
            int IndeksKodefilm;
            IndeksKodefilm = CariFilm(PtrFilm, jumlah, kode);

            if (IndeksKodefilm != -1)
            {
                cout << "\n------ FILM ------" << endl;
                cout << "Judul  : " << PtrFilm[IndeksKodefilm].judul << endl;
                cout << "Kode   : " << PtrFilm[IndeksKodefilm].kode << endl;
                cout << "Rating : " << PtrFilm[IndeksKodefilm].rating << endl;
                cout << "---------------------------------------------";
            }
            else
            {
                cout << "Film dengan kode " << kode << " tidak tayang" << endl;
            }
            break;

        case 3:
            cout << "Judul film: ";
            cin.ignore();
            getline(cin, judul);
            int indeksJudul;
            indeksJudul = BinarySearch(PtrFilm, jumlah, judul);

            if (indeksJudul != -1)
            {
                cout << "\n------ FILM ------" << endl;
                cout << "Judul  : " << PtrFilm[indeksJudul].judul << endl;
                cout << "Kode   : " << PtrFilm[indeksJudul].kode << endl;
                cout << "Rating : " << PtrFilm[indeksJudul].rating << endl;
                cout << "------------------------------------------------";
            }
            else
            {
                cout << "Film dengan judul" << judul << " tidak tayang" << endl;
            }
            break;

        case 4:
            Quicksort(PtrFilm, 0, jumlah - 1);
            cout << "Film diurutkan berdasarkan rating (Ascending-Quick Sort)" << endl;
            DataFilm(PtrFilm, jumlah);
            break;

        case 5:
            Bubblesort(PtrFilm, jumlah);
            cout << "Film diurutkan berdasarkan rating (Descending-Bubble Sort)" << endl;
            DataFilm(PtrFilm, jumlah);
            break;

        case 0:
            cout << "TERIMAKASIH, SAMPAI JUMPA KEMBALII ^^" << endl;
            break;

        default:
            cout << "PILIHAN SALAH, COBA LAGI!!!" << endl;
        }

    } while (pilihan != 0);

    return 0;
}

// BISMILLAH BENER, PUSING...PUSINGG..//
// BOLAK BALIK LIAT MODUL EKSPERIMEN, BELAJAR DARI YOUTUBE, DAN RESEARCH YALLAHHHHHH....//