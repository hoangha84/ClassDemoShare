//Nhap 6 so nguyen. Dem bao nhieu so duong, so am, so = 0
#include <iostream>
using namespace std;

int main(){
	int am, duong, khong, a;
	am = duong = khong = 0;
	cout<<"Nhap so:";
	for (int i = 0; i<6; i++){
		cin>>a;
		if(a>0) duong++;
		if(a==0) khong++;
		if(a<0) am++;
	}
	cout<<"\nSo am: "<<am<<", so duong: "<<duong<<", so 0: "<<khong;
	return 0;
}
