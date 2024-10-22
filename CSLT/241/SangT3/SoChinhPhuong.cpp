//So chinh phuong
#include <iostream>
#include <cmath>
using namespace std;

int laCP(int n);
int laCP1(int n);
int laCP2(int n);

int main(){
	int n;
	cin>>n;
//	cout<<"\nLa chinh phuong:"<<laCP(n);
	for(int i = 1; i<=n; i++)
		if(laCP2(i))
			cout<<i<<" ,";
	return 0;
}

int laCP(int n){
	for(int i = 1; i<=sqrt(n); i++){
		if(i*i==n) return 1;
	}
	return 0;
//	SAI: do kieu du lieu trong C
//	double t = sqrt(n);
//	cout<<"\nsqrt: "<<t;
//	cout<<"\nt*t: "<<t*t;	
//	if(t*t==n)
//		return 1;
//	return 0;
}
int laCP1(int n){
	int i;
	for(i = 1; i*i<n; i++);
	
	if(i*i==n) return 1;
	return 0;
}

int laCP2(int n){
	int i = 1;
	while(i*i<n){
		i++;
	}
	if(i*i==n) return 1;
	return 0;
}
