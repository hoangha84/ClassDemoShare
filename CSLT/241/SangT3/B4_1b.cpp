//4.1.b
#include <iostream>
using namespace std;
#define max 100000

void nhap(int arr[], int &num){
	cout<<"Nhap so phan tu cua mang:"; cin>>num;
	cout<<"Nhap "<<num<<" gia tri cua mang: ";
	for(int i=0; i<num; i++){
		cin>>arr[i];
	}
}

int main(){
	int a[max], n;
	nhap(a, n);
	
	int tong = 0;
	for(int i=0; i<n; i++){
		tong+=a[i];
	}
	
//	cout<<"Trung binh cong: "<<(float)tong/n;
	cout<<"Trung binh cong: "<<tong*1.0/n;
	
	return 0;
}
