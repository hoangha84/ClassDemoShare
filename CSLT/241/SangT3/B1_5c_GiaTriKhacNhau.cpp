//Tim gia tri khac nhau cua 4 so
#include <iostream>
using namespace std;

int main(){
	int a,b,c,d;
	cin>>a>>b>>c>>d;
	
	int dem = 1;
	if(b!=a) dem++;
	if(c!=a && c!=b) dem++;
	if(d!=a && d!=b && d!=c) dem++;
	
	cout<<"So gia tri khac nhau la:"<<dem;
	return 0;
	
//	int a,b,c,d,count;
//	cout<<"Please enter 4 integers: ";cin>>a>>b>>c>>d;
//	if (a==b && a==c && a==d) count=1; else
//	if (a!=b &&a!=c &&a!=d &&b!=c &&b!=d &&c!=d) count=4; else
//	if ((a==b && c==d) ||(a==d && b==c)||(a==c && b==d)) count=2;
//	else count=3;
//	cout<<"The result is: "<<count;
}
