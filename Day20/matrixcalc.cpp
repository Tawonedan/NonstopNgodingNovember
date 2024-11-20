#include <iostream>
#include <vector>
using namespace std;

void printMatrix(const vector<vector<int>>& matrix) {
    for (const auto& row : matrix) {
        for (const auto& elem : row) {
            cout << elem << " ";
        }
        cout << endl;
    }
    cout << endl;
}

vector<vector<int>> addMatrices(const vector<vector<int>>& mat1, const vector<vector<int>>& mat2) {
    int rows = mat1.size();
    int cols = mat1[0].size();
    vector<vector<int>> result(rows, vector<int>(cols));

    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < cols; j++) {
            result[i][j] = mat1[i][j] + mat2[i][j];
        }
    }
    return result;
}

vector<vector<int>> subtractMatrices(const vector<vector<int>>& mat1, const vector<vector<int>>& mat2) {
    int rows = mat1.size();
    int cols = mat1[0].size();
    vector<vector<int>> result(rows, vector<int>(cols));

    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < cols; j++) {
            result[i][j] = mat1[i][j] - mat2[i][j];
        }
    }
    return result;
}

vector<vector<int>> multiplyMatrices(const vector<vector<int>>& mat1, const vector<vector<int>>& mat2) {
    int rows1 = mat1.size();
    int cols1 = mat1[0].size();
    int cols2 = mat2[0].size();
    vector<vector<int>> result(rows1, vector<int>(cols2, 0));

    for (int i = 0; i < rows1; i++) {
        for (int j = 0; j < cols2; j++) {
            for (int k = 0; k < cols1; k++) {
                result[i][j] += mat1[i][k] * mat2[k][j];
            }
        }
    }
    return result;
}

int main() {
    int rows1, cols1, rows2, cols2;

    cout << "Masukkan jumlah baris dan kolom matriks pertama (pisahkan dengan spasi): ";
    cin >> rows1 >> cols1;

    vector<vector<int>> mat1(rows1, vector<int>(cols1));
    cout << "Masukkan elemen matriks pertama:" << endl;
    for (int i = 0; i < rows1; i++) {
        for (int j = 0; j < cols1; j++) {
            cin >> mat1[i][j];
        }
    }


    cout << "Masukkan jumlah baris dan kolom matriks kedua (pisahkan dengan spasi): ";
    cin >> rows2 >> cols2;

    vector<vector<int>> mat2(rows2, vector<int>(cols2));
    cout << "Masukkan elemen matriks kedua:" << endl;
    for (int i = 0; i < rows2; i++) {
        for (int j = 0; j < cols2; j++) {
            cin >> mat2[i][j];
        }
    }

    cout << "Matrix 1:" << endl;
    printMatrix(mat1);
    cout << "Matrix 2:" << endl;
    printMatrix(mat2);

    if (rows1 == rows2 && cols1 == cols2) {
        cout << "Hasil tambah:" << endl;
        printMatrix(addMatrices(mat1, mat2));
    } else {
        cout << "Tidak dapat dilakukan (dimensi berbeda)." << endl;
    }

    if (rows1 == rows2 && cols1 == cols2) {
        cout << "Hasil kurang:" << endl;
        printMatrix(subtractMatrices(mat1, mat2));
    } else {
        cout << "Tidak dapat dilakukan (dimensi berbeda)." << endl;
    }

    if (cols1 == rows2) {
        cout << "Hasil kali:" << endl;
        printMatrix(multiplyMatrices(mat1, mat2));
    } else {
        cout << "Tidak dapat dilakukan (dimensi tidak cocok)." << endl;
    }

    return 0;
}
