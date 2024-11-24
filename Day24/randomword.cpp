#include <iostream>
#include <vector>
#include <random>
using namespace std;

int RandIndex(int maxIndex) {
    random_device rd;              
    mt19937 gen(rd());             
    uniform_int_distribution<> dis(0, maxIndex);
    return dis(gen);
}

void generateRand(const vector<string>& words1, const vector<string>& words2) {
    int index1 = RandIndex(words1.size() - 1);
    int index2 = RandIndex(words2.size() - 1);

    cout << words1[index1] << " " << words2[index2] << endl;
}

int main() {
    vector<string> subjek = {
        "Mulyono", "Batman", "Dj Alok", "Member", "Admin", "Kodok", "Raja iblis", "Naruto", "Angela", "Ayam kate"
    };

    vector<string> konteks = {
        "Ngutang", "Ejakulasi", "Hamil", "Kumat", "Datang", "Salto", "Lewat", "Salto", "Retri", "Naik vario"
    };

    cout << "Dua kata acak dari dua array berbeda:" << endl;
    generateRand(subjek, konteks);

    return 0;
}
