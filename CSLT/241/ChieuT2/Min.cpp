#include <iostream>
using namespace std;

int main(){
	int a, b, c, min;
	cout<<"Nhap a, b, c:";
	cin>>a>>b>>c;
	min = (a<b) ? (a<c ? a : c ) : (b<c ? b : c);
	cout<<"Min="<<min;
//	system("pause");
	return 0;
}
