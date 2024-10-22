#include <iostream>
using namespace std;

int main() {
	int a, b;
	cout<<"Nhap a, b:";
	cin>>a>>b;
	cout<<((++a)++)+(--(--b));
	cout<<"\nSau cau lenh, a="<<a<<", b="<<b;
	return 0;
}
