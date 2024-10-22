//Min max cua 4 so
#include <iostream>
using namespace std;

int main(){
	int a, b, c, d;
	int min, max;
	cout<<"Nhap 4 so a,b,c,d:";
	cin>>a>>b>>c>>d;
	
	min=max=a;
	if(min>b) min = b;
	if(max<b) max = b;
	
	if(min>c) min = c;
	if(max<c) max = c;
	
	if(min>d) min = d;
	if(max<d) max = d;
	
	cout<<"\nMax="<<max;
	cout<<"\nMin="<<min;
	
	return 0;
}
