//Nhap 4 so, in ra so gia tri khac nhau
#include <iostream>
using namespace std;

int main(){
	int a,b,c,d;
	int dem = 1;
	cin>>a>>b>>c>>d;
	
	if(b!=a) dem++;
	if(c!=a && c!=b) dem++;
	if(d!=a && d!=b && d!=c) dem++;
	
	cout<<"Co "<<dem<<" gia tri khac nhau";
	return 0;
}
