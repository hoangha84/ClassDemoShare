//Giai phuong trinh bac 2 ax2+bx+c=0
#include <iostream>
#include <cmath>
using namespace std;

int main (){
	float a, b, c, d;
	cout<<"Nhap a, b, c:";
	cin>>a>>b>>c;
	d = b*b - 4*a*c;
	if(d>0) cout<<"PT co 2 nghiem x1="<<(-b-sqrt(d))/(2*a)<<", x2="<<(-b+sqrt(d))/(2*a);
	if(d==0) cout<<"PT co nghiem kep x1=x2="<<-b/(2*a);
	if(d<0) cout<<"PT vo nghiem!";
	
	return 0;
}
