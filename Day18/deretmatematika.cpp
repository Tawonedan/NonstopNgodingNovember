#include <iostream>
using namespace std;

int hitungkelipatan2 = 0;

int F(int n) {
    if (n % 2 == 0) {
        hitungkelipatan2++;
    }
    if (n == 0) {
        return 2;
    }
    if (n == 1) {
        return 3;
    }
    if (n % 4 == 0) {
        return n * 3;
    }


    return F(n - 1) + n + F(n - 2) + (n - 1);
}

int main() {
    int T;

    cout << "Hitung deret matematika" << endl;
    cout << "//////////////////////////////" << endl;
    cout << "Masukkan nilai T" << endl;
    cin >> T;

    int* testCases = new int[T];

    for (int i = 0; i < T; i++) {
        cin >> testCases[i];
    }

    for (int i = 0; i < T; i++) {
        int n = testCases[i];
        hitungkelipatan2 = 0;
        int hasil = F(n); 
        cout << "Case #" << i + 1 << ": " << hasil << " " << hitungkelipatan2 << endl;
    }

    delete[] testCases;
    return 0;
}
