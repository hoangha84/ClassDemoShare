//4.1.d Tim gt lon thu k
#include <iostream>
#include <cstdlib> // Needed for rand() and srand()
#include <ctime> 
using namespace std;

void nhap (int a[], int &n){
	cout<<"Nhap so phan tu n:";
	cin>>n;
	for(int i=0; i<n; i++)
		cin>>a[i];
	return;
}

void nhapNN (int a[], int &n){
	cout<<"Nhap so phan tu n:";
	cin>>n;
	for(int i=0; i<n; i++)
		a[i] = rand() % 100;
	return;
}

void xuat(int a[], int n){
	cout<<endl;
	for(int i=0; i<n; i++)
		cout<<a[i]<<",";
	return;
}

void sortDESC(int a[], int n){
	for(int i=0; i<n-1; i++)
		for(int j=i+1; j<n; j++)
			if(a[j]>a[i])
				swap(a[j], a[i]);
	return;
}

void swap(int &a, int &b){
	int tam = a;
	a=b;
	b=tam;
	return;
}

int main(){
	//Phat sinh tham so ngau nhien cho ham rand()
	srand(time(NULL));	
	//--------------------------------------------
	int a[1000], n;
	nhapNN(a,n);
	xuat(a,n);
	
	sortDESC(a,n);
	cout<<"\nMang sau khi sort:";
	xuat(a,n);
	
	int k;
	cout<<"\nNhap k:";
	cin>>k;
	
	cout<<"Gia tri lon thu "<<k<<" la:"<<a[k-1];
	
	
	return 0;
}
