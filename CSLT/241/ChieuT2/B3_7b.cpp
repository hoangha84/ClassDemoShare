//b.	S(n)=1^2+ 2^2 + 3^2 +...+ n^2
#include <iostream>
using namespace std;

//Dung de qui

long S(int n){
	if(n==1)
		return 1;
	return S(n-1)+n*n;
}

long S1(int n){
	long s = 0;
	for(int i=1; i<=n; i++){
		//s= s + (i*i);
		s+=(i*i);
	}
	return s;
}

int main(){
	int n;
	cin>>n;
	if(n<1){
		cout<<"Nhap n >=1";
		return 0;
	}
	cout<<"\nDe qui: S("<<n<<")="<<S(n);
	cout<<"\nKhong de qui: S("<<n<<")="<<S1(n);
	return 0;
}
