//4.1.d Tim phan tu lon thu k cua mang
#include <iostream>
using namespace std;

void nhap(int a[], int &n){
	cin>>n;
	for(int i=0; i<n; i++)
		cin>>a[i];
	return;
}

void xuat(int a[], int n){
	for(int i=0; i<n; i++)
		cout<<a[i]<<",";
	return;
}

void sortDESC(int a[], int n){
	for(int i=0; i<n-1; i++)
		for(int j=i+1; j<n; j++)
			if(a[j]>a[i])
				swap(a[i],a[j]);
	return;
}

void swap(int &a, int &b){
	int tam = a;
	a=b;
	b=tam;
	cout<<"Swap:"<<a<<","<<b;
	return;
}

int main(){
	int a[1000], n;
	nhap(a,n);
	sortDESC(a,n);
	xuat(a,n);
	cout<<"Nhap k:";
	int k;
	cin>>k;
	cout<<"So lon thu "<<k<<" la:"<<a[k-1];
//	int a, b;
//	cin>>a>>b;
//	swap(a,b);
//	cout<<"\n"<<a<<","<<b;
	return 0;
}
