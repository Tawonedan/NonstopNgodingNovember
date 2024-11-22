#include <iostream>
#include <vector>
using namespace std;


vector<int> findFactors(int num) {
    vector<int> factors;
    for (int i = 1; i <= num; i++) {
        if (num % i == 0) {
            factors.push_back(i);
        }
    }
    return factors;
}

bool isPrime(int num) {
    if (num <= 1) return false;
    for (int i = 2; i * i <= num; i++) {
        if (num % i == 0) {
            return false;
        }
    }
    return true;
}

int main() {
    int number;

    cout << "Masukkan sebuah bilangan: ";
    cin >> number;

    vector<int> factors = findFactors(number);
    cout << "Faktor dari " << number << ": ";
    for (int factor : factors) {
        cout << factor << " ";
    }
    cout << endl;

    if (isPrime(number)) {
        cout << number << " adalah bilangan prima." << endl;
    } else {
        cout << number << " bukan bilangan prima." << endl;
    }

    return 0;
}
