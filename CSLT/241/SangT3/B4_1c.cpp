//4.1.c
#include <iostream>
using namespace std;
#define max 100000

void nhap(int arr[], int &num){
	cout<<"Nhap so phan tu cua mang:"; cin>>num;
	cout<<"Nhap "<<num<<" gia tri cua mang: ";
	for(int i=0; i<num; i++){
		cin>>arr[i];
	}
}

int laNT(int n){
	if(n<2)
		return 0;
	for(int i=2; i<n; i++)
		if(n%i==0)
			return 0;
	return 1;
}
int laCP(int n){
	//Viet ham kiem tra so chinh phuong
	return 1;
}

int main(){
	int a[max], n;
	nhap(a, n);
	
	int demnt = 0, demcp = 0;
	for(int i=0; i<n; i++){
		if(laNT(a[i]))
			demnt++;
		if(laCP(a[i]))
			demcp++;
	}
	cout<<"Co "<<demnt<<" so nguyen to trong mang.";
	
	return 0;
}
