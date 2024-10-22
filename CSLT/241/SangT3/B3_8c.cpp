//3.8.c x(1)=1; x(2)=1; 
//x(n)=x(n-1) + (n-1) * x(n-2) voi n >= 3 
//Tinh x(n) khong dung de qui
#include <iostream>
using namespace std;

int main(){
	int n; cin>>n;
	int a = 1, b = 1;
	long X;
	for(int i=3; i<=n; i++){
		X = b + (i-1)*a;
		a = b;
		b = X;
	}
	
	cout<<"X("<<n<<")="<<X;
	return 0;
}
