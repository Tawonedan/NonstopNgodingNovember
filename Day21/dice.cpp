#include <iostream>
#include <cstdlib>
#include <ctime>
using namespace std;

int rollDice(int sides) {
    return rand() % sides + 1;
}

int main() {
    srand(time(NULL));

    int d4 = rollDice(4);   
    int d6 = rollDice(6);   
    int d8 = rollDice(8);   
    int d10 = rollDice(10); 

    cout << "Hasil lemparan d4: " << d4 << endl;
    cout << "Hasil lemparan d6: " << d6 << endl;
    cout << "Hasil lemparan d8: " << d8 << endl;
    cout << "Hasil lemparan d10: " << d10 << endl;

    return 0;
}
