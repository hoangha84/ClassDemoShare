//3.8.b x(1)=1; x(2)=1; 
//x(n)=x(n-1) + (n-1) * x(n-2) voi n >= 3 
//Tinh x(n) bang de qui
#include <iostream>
using namespace std;

int X(int n){
	if(n<3)
		return 1;
	return X(n-1) + (n-1)*X(n-2);
}

int main(){
	int n; cin>>n;
	cout<<"X("<<n<<")="<<X(n);
	return 0;
}

