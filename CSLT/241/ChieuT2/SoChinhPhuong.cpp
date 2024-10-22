//Kiem tra So chinh phuong: so tu nhien co can bac 2 la 1 so tu nhien
#include <iostream>
#include <cmath>
using namespace std;

bool laCP(int n){
// Sai:
//	cout<<"\nsqrt:"<<sqrt(n);
//	cout<<"\nsqrt*sqrt:"<<sqrt(n)*sqrt(n);
//	
//	if(sqrt(n)*sqrt(n)==n)
//		return 1;
//	else
//		return 0;
	for(int i=1; i*i<=n; i++)
		if(i*i==n) return 1;
	return 0;
}

int main(){
	int n;
	cin>>n;
	for(int i = 1; i<=n; i++){
//		cout<<i<<endl;
		if(laCP(i))
			cout<<i<<",";
	}
	return 0;
}
