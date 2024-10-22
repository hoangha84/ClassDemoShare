//6 so, in ra so luong so am, duong, bang khong
#include <iostream>
using namespace std;

int main(){
	int a, am, duong, khong;
	am = duong = khong = 0;
	
	cout<<"Nhap 6 so:";
//	cin>>a;
//	if(a>0) duong++;
//	if(a==0) khong++;
//	if(a<0) am++;
//	cin>>a;
//	if(a>0) duong++;
//	if(a==0) khong++;
//	if(a<0) am++;
//	cin>>a;
//	if(a>0) duong++;
//	if(a==0) khong++;
//	if(a<0) am++;
//	cin>>a;
//	if(a>0) duong++;
//	if(a==0) khong++;
//	if(a<0) am++;
//	cin>>a;
//	if(a>0) duong++;
//	if(a==0) khong++;
//	if(a<0) am++;
//	cin>>a;
//	if(a>0) duong++;
//	if(a==0) khong++;
//	if(a<0) am++;
	for (int i=0 ; i<6 ; i++){
		cin>>a;
		if(a>0) duong++;
		if(a==0) khong++;
		if(a<0) am++;		
	}
	
	cout<<am<<" "<<duong<<" "<<khong;
	return 0;
}
