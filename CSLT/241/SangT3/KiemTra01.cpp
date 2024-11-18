//Giua ki: chuyen so thap phan sang nhi phan
#include <iostream>
using namespace std;

int daoso(int n){
	int a=0;
	while(n>0){
		a=a*10 + n%10;
		n/=10;
	}
	return a;
}

int dec2bin(int n){
	int a=0;
	while(n>0){
		a=a*10 + n%2;
		n/=2;
	}
	return daoso(a);
}

int dec2bin01(int n){
	int a=0, i=1;//neu dung pow, i=0;
	while(n>0){
		a = a + (n%2)*i;//pow(10,i)
		n/=2;
		i*=10;//i++;
	}
	return a;
}

void dec2binRec(int n){
//	cout<<"\nde qui voi n ="<<n;
	if(n==0) return;		
	dec2binRec(n/2);
	cout<<n%2;
	return;
}

int main(){
	int n; cin>>n;
	cout<<"\ndec2bin(daoso): "<<dec2bin(n);
	cout<<"\ndec2bin(khongdao): "<<dec2bin01(n);
	cout<<"\ndec2binRec: "; dec2binRec(n);
	return 0;
}



