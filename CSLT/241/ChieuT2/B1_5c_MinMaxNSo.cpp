//Max cua n so (n do nguoi dung nhap)
#include <iostream>
using namespace std;

int main(){
	int n;
	int max;
	cout<<"Nhap n:";
	cin>>n;
	
//	for (int i = 0; i<n; i++){
//		int a;
//		cin>>a;
//		if(i==0) max = a;
//		else if(max<a) max = a;
//	}
	int a;
	cin>>a;
	max = a;
	for(int i = 0; i<n-1; i++){
		cin>>a;
		if(max<a) max = a;
	}

	cout<<"\nMax="<<max;
	
	return 0;
}
