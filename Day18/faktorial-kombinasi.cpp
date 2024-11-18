#include <iostream>
using namespace std;

int main() {
        int n;
        int r;

        int faktorial(int n);
        int kombinasi(int n, int r);

        cout << "Hitung faktorial dan kombinasi" << endl;
        cout << "//////////////////////////////" << endl;
        cout << "Masukkan nilai n" << endl;
        cin >> n;
        cout << "Masukkan nilai r" << endl;
        cin >> r;

        cout << faktorial(n) << endl;
        cout << kombinasi(n,r) << endl;


}

int faktorial(int n) {
    if (n > 1) {
        return n * faktorial(n - 1);
    } else {
        return 1;
    }
    
}

int kombinasi(int n, int r) {
    if(r == 0 || r == n) {
        return 1;
    } 
    return kombinasi(n - 1, r - 1) + kombinasi(n - 1, r);
}