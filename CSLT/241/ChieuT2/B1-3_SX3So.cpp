//Cho 3 so nguyen, sap xep theo thu tu tang dan
#include <iostream>
using namespace std;

int main(){
	int a, b, c, tam;
	cout<<"Nhap a, b, c:";
	cin>>a>>b>>c;
//	if (b<a){
//		//Doi gia tri a voi b
//		tam = a;
//		a = b;
//		b = tam;
//	}
	if(b<a) swap(b,a);
	cout<<"\nB1:"<<a<<" "<<b<<" "<<c;
//	if (c<a){
//		tam = c;
//		c = a;
//		a = tam;
//	}
	if (c<a) swap(c,a);
	cout<<"\nB2:"<<a<<" "<<b<<" "<<c;
//	if(c<b){
//		tam = c;
//		c = b;
//		b = tam;
//	}
	if (c<b) swap(c,b);
	cout<<"\nB3:"<<a<<" "<<b<<" "<<c;
	
	return 0;
}
