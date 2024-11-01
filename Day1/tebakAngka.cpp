# include <iostream>
#include<cmath>
#include<ctime>

using namespace std;

int main() {

    int angka;
    int tebakan;
    int coba;

    srand(time(NULL));
    angka = (rand() % 100) + 1;

    cout << "/////// TEBAK ANGKA! KLO BENER DIAJAK KE SONGGORITI!!!1!!1!1!! //////// \n";
    
    do
    {
        cout << "Tebak angka 1-100! \n";
        cin >> tebakan;
        coba++;

        if (tebakan < angka)
        {
        cout << "Terlalu rendah! \n";
        } else if (tebakan > angka) {
            cout << "Terlalu tinggi! \n";
        } else {
            cout << "Yeaay tebakan kamu bener! Angka yang kamu tebak:" << tebakan << "\n Sesuai dengan angka yang dihasilkan:" << angka << "\n Kamu mencoba sebanyak " << coba << " kali \n";
        } 
        
    } while (tebakan != angka);
    
    cout << "/////////////////////////////////////////////";

}