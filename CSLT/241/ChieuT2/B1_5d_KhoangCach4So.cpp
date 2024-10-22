//Tim khoang cach gan nhat giua 4 so
#include <iostream>
#include <cmath>
using namespace std;

int main(){
	int a,b,c,d;
	cin>>a>>b>>c>>d;
	int r= abs(b-a);
	if(r>abs(c-a)) r = abs(c-a);
	if(r>abs(d-a)) r = abs(d-a);
	if(r>abs(c-b)) r = abs(c-b);
	if(r>abs(d-b)) r = abs(d-b);
	if(r>abs(d-c)) r = abs(d-c);
	
	cout<<"Khoang cach gan nhat:"<<r;
	
	return 0;
}
