//Phuong trinh bac 2 ax2+bx+c = 0
#include <iostream>
#include <cmath>
using namespace std;

int main(){
	float a, b, c, delta;
	cout<<"Nhap a, b, c:";
	cin>>a>>b>>c;
//	cout<<"Gia tri:"<<a<<b<<c;
	delta = b*b - 4*a*c;
	cout<<"Delta: "<<delta;
	if (delta < 0) 
		cout<<"\nPhuong trinh vo nghiem!";
	if (delta == 0) 
		cout<<"\nPhuong trinh co nghiem kep x1=x2="<<-b/(2*a);
	if (delta > 0) 
		cout<<"\nPhuong trinh co 2 nghiem x1="<<(-b+sqrt(delta))/(2*a)<<", x2="<<(-b-sqrt(delta))/(2*a);
	return 0;
}
