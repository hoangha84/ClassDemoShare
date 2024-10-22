//Tim max cua n so nguyen (n do nguoi dung nhap)
#include <iostream>
using namespace std;

int main(){
	int n, max, min;
	cout<<"Nhap n:";
	cin>>n;
//	cout<<"\nMax="<<max<<endl;
	for(int i = 0; i<n; i++){
		int a;
		cin>>a;
		if(i==0) {
			max = a;
			min = a;	
		}
		if(max<a) max = a;
		if(min>a) min = a;
	}
	
	cout<<"\nMin cua "<<n<<" so la:"<<min;
	cout<<"\nMax cua "<<n<<" so la:"<<max;

	return 0;
}
