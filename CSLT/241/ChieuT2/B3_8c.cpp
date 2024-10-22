//3.8.c Khong dung de qui
#include <iostream>
using namespace std;

int main(){
	int n; cin>>n;
	int a=1, b=1;
	long xi;
	for(int i=3; i<=n; i++){
		xi = b + (i-1)*a;
		a=b;
		b=xi;
	}
	
	cout<<"x_"<<n<<"="<<xi;
	
	return 0;
}
