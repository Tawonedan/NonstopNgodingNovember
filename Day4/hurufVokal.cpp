#include <iostream>
using namespace std;

int main() {
    string kalimat;
    string hasil = "";

    cout << "Hapus huruf vokal dalam kalimat \n";
    cout << "/////////////////////////////// \n";
    cout << "Input kalimat \n";

    getline(cin, kalimat);

    char vokal[] = {'a', 'i', 'u', 'e', 'o', 'A', 'I', 'U', 'E', 'O'};
    int jumlahVokal = sizeof(vokal) / sizeof(vokal[0]);

    for (char c : kalimat) {
        bool isVokal = false;
        for (int i = 0; i < jumlahVokal; i++) {
            if (c == vokal[i]) {
                isVokal = true;
                break;
            }
        }
        if (!isVokal) {
            hasil += c;
        }
    }

    cout << hasil;

    return 0;
    

}