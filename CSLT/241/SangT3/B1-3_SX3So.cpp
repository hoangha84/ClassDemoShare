//Sap xep 3 so nguyen theo thu tu tang dan
#include <iostream>
using namespace std;

int main(){
	int a,b,c, tam;
	cout<<"Nhap a,b,c:";
	cin>>a>>b>>c;
	
	if(a>b) {
		tam = a;
		a = b;
		b = tam;
	}
	if (a>c) swap(a,c);
	if (b>c) swap(b,c);
	
	cout<<"Sap xep 3 so tang dan: "<<a<<" "<<b<<" "<<c;
	return 0;
}
