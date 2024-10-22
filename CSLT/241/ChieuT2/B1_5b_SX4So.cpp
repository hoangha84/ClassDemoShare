//Sap xep 4 so tang dan
#include <iostream>
using namespace std;

int main(){
	int a,b,c,d;
	cin>>a>>b>>c>>d;
	
	if(a>b) swap(a,b);
	if(a>c) swap(a,c);
	if(a>d) swap(a,d);
	//Den day, a la so nho nhat
	
	if(b>c) swap(b,c);
	if(b>d) swap(b,d);
	//den day, b la so nho tiep theo
	
	if(c>d) swap(c,d);
	//done!
	
	cout<<"Sap xep tang dan:"<<a<<" "<<b<<" "<<c<<" "<<d;
	int r = b-a;
	if(r>(c-b)) r = c-b;
	if(r>(d-c)) r = d-c;
	
	cout<<"\nKhoang cach gan nhat:"<<r;
	return 0;
}
