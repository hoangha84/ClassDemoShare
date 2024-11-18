//Doi 1 so thap phan sang nhi phan
#include <iostream>
using namespace std;

int dec2bin (int n){
	int a = 0;
	while(n>0){
		a = a*10 + n%2;
		n/=2;
	}
	return a;
}

int daoso(int n){
	int a = 0;
	while(n>0){
		a=a*10 + n%10;
		n/=10;
	}
	return a;
}

void dec2binRec(int n){
//	cout<<"\nDe qui n="<<n;
	if(n==0) return;		
	dec2binRec(n/2);
	cout<<n%2;
	return;
}

int dec2binKoDao(int n){
	int kq = 0, heso = 1;
	while(n>0){
		kq = kq + (n%2)*heso;
		heso*=10;
		n/=2;
	}
	return kq;
}

int main(){
	int n;
	cin>>n;
//	cout<<daoso(dec2bin(n));
//	dec2binRec(n);
	cout<<dec2binKoDao(n);
	return 0;
}
