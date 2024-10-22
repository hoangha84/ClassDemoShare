//Tim khoang cach nho nhat
#include <iostream>
#include <cmath>
using namespace std;

int main(){
	int a,b,c,d;
	cin>>a>>b>>c>>d;
	
	int dmin = abs(a-b);
	if(dmin>abs(a-c)) dmin = abs(a-c);
	if(dmin>abs(a-d)) dmin = abs(a-d);
	if(dmin>abs(b-c)) dmin = abs(b-c);
	if(dmin>abs(b-d)) dmin = abs(b-d);
	if(dmin>abs(c-d)) dmin = abs(c-d);
	
	cout<<"Khoang cach gan nhat:"<<dmin;
	return 0;
}
